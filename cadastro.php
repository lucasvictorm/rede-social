<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/login.css">
    <title>Cadastro</title>
</head>
<body>
    
    <main class="principal">
        <div class="div_left">
        
        </div>
        <div class="div_right">
            <h1>Cadastro</h1>
            <form name="singnup" method="post" action="cadastrando.php">
                <div>
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome"/>

                </div>

                <div>
                    <label for="nome">Username</label>
                    <input type="text" name="username" id="username"/>

                </div>

                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email"/>

                </div>

                <div>
                    <label for="nome">Senha</label>
                    <input type="password" name="senha" id="senha"/>

                </div>
            
                <input type="submit" value="Cadastrar" />
            </form>
            <p>Já tem uma conta ? <a href="login.php">Login</a></p>
            <?php 
        $status = $_GET["status"];
        if(isset($status)){
            echo("<p class='inform'>O usuário informado já existe.</p>");
        }

    ?>
        </div>
        
    </main>
    

</body>
</html>