
<?php 
     
    include "./connection.php";
    
    $id = $_GET["id"];
    
    $sql=mysqli_query($conexao,"select * from usuarios where id = $id") or die(mysqli_error($conexao));
    $dados = mysqli_fetch_assoc($sql);
    
    $sqlUser = mysqli_query($conexao, "select foto, username, bio from usuarios where id = ".$_SESSION['user_id']) or die(mysqli_error($conexao));
	
    $menuData = mysqli_fetch_assoc($sqlUser);
    
    
    ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/perfil.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Perfil</title>
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
    <section class="perfilHeader">
    
    <form action="atualizarUser.php" method="POST" enctype="multipart/form-data">
        <div class="infos">
        <img src="./fotosPerfil/<?=!isset($dados["foto"]) ? "default.png": $dados["foto"]?>" alt="Foto de perfil">
        <div>
        <h1><?=$dados["nome"]?></h1>
        
        <h2>Bio</h2>
        <p><?=$dados["bio"]?></p>
        </div>
        
        </div>


    </form>
    </section>
    
    
    <h1><?=$dados["nome"]?>
    </h1>
    <h2>Publicações</h2>
    <div>
        <?php 
        
            $posts = mysqli_query($conexao,"select * from posts where usuario_id = $id") or die(mysqli_error());
            while($post = mysqli_fetch_assoc($posts)){
                echo("<div>
                <h2>".$post["titulo"]."</h2>
                <p>".$post["nome"]."</p>
                <p>".$post["conteudo"]."</p></div>");

            }
            
        ?>
    </div>
</body>
</html>