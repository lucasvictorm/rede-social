<?php 
    include "./connection.php";

    $user_id = $_SESSION["user_id"];
    $titulo = $_POST["titulo"];
    $conteudo = $_POST["conteudo"];
    

    $post_id = $_GET["id"];
    $sql=mysqli_query($conexao, "select * from posts where id = '$post_id'") or die(mysqli_error($conexao));
    $dados = mysqli_fetch_assoc($sql);
?>

<?php 



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
    
    
    <div class='paginaInicial'>
	<a href='./index.php'>
	<span class='material-symbols-outlined'>
	home
	
	</span><p>Página inicial</p>
	</a>
	</div>
    
    </div>");
    ?>
    <main>
        <h1>Editar publicação</h1>
        <form action="editandoPost.php" method="POST">
            
            <div class='post'>
            <div class='postInterno'>
            <input type="hidden" name="id" value="<?=$post_id?>">
            <div class="titulo">
            <label for="titulo">Título</label>
                <input type="text" name="titulo" value="<?= $dados["titulo"]?>" id="titulo">
            </div>
            <div class='conteudo'>
            <label for="conteudo">Conteúdo</label>
            <textarea name="conteudo" id="conteudo" cols="65" rows="10"><?= $dados["conteudo"]?></textarea>
        </div>
            <div class="rodape">
                <button type="submit">Confirmar Edição</button>
            </div>
            
        </form>
    </main>
</body>
</html>