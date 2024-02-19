<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/login.css">
</head>
<body>
<title>Login</title>
</head>
<body>
    <main class="principal">
        <div class="div_left">

        </div>
        <div class="div_right">
            <h1>Login</h1>
            <form name="loginform" method="post" action="userauthentication.php">
                <div >
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username"/> 
                </div>

                <div>
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha"/> 
                </div>
                
                <input type="submit" value="Entrar" />  
            </form>
            <p>Não tem uma conta ? <a href="cadastro.php">Inscreva-se</a></p>
            <?php 
        $status = $_GET["status"];
        if(isset($status)){
            echo("<p class='inform'>Usuário ou senha incorretos.</p>");
        }

    ?>
        </div>
    </main>


</body>
</html>