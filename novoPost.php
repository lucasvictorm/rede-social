<?php 
include "./connection.php";



$sqlUser = mysqli_query($conexao, "select foto, username from usuarios where id = ".$_SESSION['user_id']) or die(mysqli_error($conexao));
	
$menuData = mysqli_fetch_assoc($sqlUser);


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Post</title>
    <link rel="stylesheet" href="./styles/novoPost.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <?php 
    echo("<div class='menu'>
    <img src='./fotosPerfil/".$menuData["foto"]."' alt='Foto de perfil'>
    <p id='user'>".$menuData['username']."</p>
    
    <div class='adicionarBotao'>
    <a href='./novoPost.php'>
        <span class='material-symbols-outlined'>add_circle
        </span>
        <p>Adicionar Publicação</p>
        </a>
    </div>
    
    
    <div class='perfilBotao'>
    <a href='./meuPerfil.php'>
    <span class='material-symbols-outlined'>
    settings
    
    </span><p>Configurações</p>
    </a>
    </div>
    
    </div>");
    ?>
    <form action="criarPost.php" method="POST">
        <div>
        <label for="titulo">Título</label>
        <input type="text" name="titulo" id="titulo">
        </div>
        
        <div>
            <label for="conteudo">Conteúdo</label>
            <textarea name="conteudo" id="conteudo" cols="30" rows="10"></textarea>
        </div>
        <div class='post'>
		<div class='postInterno'>
		<div class='titulo'>
		<input type="text">
		</div>
		<div class='conteudo'>
		<textarea name="conteudo" id="conteudo" cols="65" rows="10"></textarea>
		</div>
        <button type="submit">Criar Publicação</button>
    </form>
</body>
</html>