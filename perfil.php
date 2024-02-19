<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>
<body>
    <?php 
     
    $host ="localhost";
    $user="root";
    $pass="123";
    $banco="socialdb";
    $conexao=mysql_connect($host, $user, $pass) or die (mysql_error());
    mysql_select_db($banco) or die(mysql_error());
    
    $id = $_GET["id"];
    
    $sql=mysql_query("select * from usuarios where id = $id") or die(mysql_error());
    $dados = mysql_fetch_assoc($sql);
    
     
    
    ?>
    <img src="./fotosPerfil/<?=!isset($dados["foto"]) ? "default.png": $dados["foto"]?>" alt="Foto de perfil">
    <h1><?=$dados["nome"]?>
    </h1>
    <h2>Publicações</h2>
    <div>
        <?php 
        
            $posts = mysql_query("select * from posts where usuario_id = $id") or die(mysql_error());
            while($post = mysql_fetch_assoc($posts)){
                echo("<div>
                <h2>".$post["titulo"]."</h2>
                <p>".$post["nome"]."</p>
                <p>".$post["conteudo"]."</p></div>");

            }
            
        ?>
    </div>
</body>
</html>