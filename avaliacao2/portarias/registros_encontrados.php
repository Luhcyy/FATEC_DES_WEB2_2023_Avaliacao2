<?php

 if ($_SERVER ['REQUEST_METHOD'] == 'GET') {
    header('Location: registros.php');
    exit;
}
    require_once('header.php');
    require_once('dados_banco.php');

    
    $placa_id = $_POST['placa_id'];
    

    try {
        $dsn = "mysql:host=$servername;dbname=$dbname";
        $conn = new PDO($dsn, $username);
    
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM registro";
        $stmt = $conn->query($sql);
        $conn = NULL;
    }catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }

?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>Portaria Fatec</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
        .atribute{ text-align:center;}
      
    </style>
</head>
<body>
    <div class="page-header">
        <h2>
            <?php echo $_SESSION["username"]; ?>
            <br>
        </h2>
    </div>
    <p>

    <div class="form-group">
        <label>Data e Hora em que existe registro de entrada/saída</label>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class = "atribute">id</th>
                    <th class = "atribute">data e hora</th>
                    <th class = "atribute">id do  veiculo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($row = $stmt->fetch()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['data_hora'] . "</td>";
                        echo "<td>" . $row['veiculos_id'] . "</td>"; 
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>


    <a href="principal.php" class="btn btn-primary">Voltar</a>
    <br><br>

    </p>
</body>
</html>
