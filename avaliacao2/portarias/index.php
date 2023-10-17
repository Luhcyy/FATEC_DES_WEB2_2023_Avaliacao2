<?php
 
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
   session_start();
    // Checa se o nome e a senha são iguais aos esperados
    if($_POST["nome"] == "Fatec" && $_POST["senha"] == "portaria"){

        $_SESSION['online'] = true;
        $_SESSION ['username'] = "Portaria Fatec";
        // Redireciona o usuário para a página principal
        header("Location: principal.php");

        // Sai do script
        exit();
    }
    else{

        // Mostra uma mensagem de erro
        echo "Nome ou senha incorretos.";
    }
}
    /*
    SEU CÓDIGO AQUI
    */
    

?>
 
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>Acessar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Acessar</h2>
        <p>Favor inserir login e senha.</p>
        <form action="index.php" method="POST">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control" value="Fatec">
                <span class="help-block"></span>
            </div>    
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="senha" class="form-control" value="portaria">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Acessar">
            </div>
        </form>
    </div>    
</body>
</html>