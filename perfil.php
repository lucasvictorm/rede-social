
<?php 
     
    include "./connection.php";
    
    
    $id = $_GET["id"];
    if($id == $_SESSION["user_id"]){
        echo("<script>window.location='meuPerfil.php'</script>");
    }
    
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
            <div class="fotoPerfil">
            <img src="./fotosPerfil/<?=!isset($dados["foto"]) ? "default.png": $dados["foto"]?>" alt="Foto de perfil">
            </div>
        
        <div class="infos">
        <h1><?=$dados["nome"]?></h1>
        
        <h2>Bio</h2>
        <p><?=$dados["bio"]?></p>
        </div>
        
        </div>
    </section>
    
    
<main>
    <h2>Publicações</h2>
    <?php 
        $sqlPosts = mysqli_query($conexao, "select p.usuario_id, p.id, p.titulo, p.conteudo, u.username, u.foto from posts as p
        join usuarios u on u.id = p.usuario_id and u.id = $id order by id desc") or die(mysqli_error($conexao));
        while($dados = mysqli_fetch_assoc($sqlPosts)){
            $row = mysqli_query($conexao, "select posts.id from posts where posts.id = ".$dados["id"]." and posts.usuario_id = ".$_SESSION["user_id"]) or die(mysqli_error($conexao));
            $numRows = mysqli_num_rows($row);
            
            $imagem = isset($dados["foto"]) ? $dados["foto"] : "default.png";
            
            echo("<div class='post'>
                <div class='cabecalho'>
                <img src='./fotosPerfil/".$imagem."' alt='Foto perfil' width='100px'>
                <a href='perfil.php?id=".$dados['usuario_id']."'>".$dados["username"]."</a>
                </div>
                <div class='postInterno'>
                <div class='titulo'>
                <h2>".$dados["titulo"]."</h2>
                </div>
                <div class='conteudo'>
                <p>".$dados["conteudo"]."</p>
                </div>
                
                ");
                
                if($numRows){
        
                    echo("<div class='botoes'><a href='editarPost.php?id=".$dados["id"]."'><span class='material-symbols-outlined'>
                    edit
                    </span></a>
                    <button onClick=confirmDelete(".$dados["id"].")><span class='material-symbols-outlined'>
                    delete
                    </span></div>");
                }
                echo("</div></div>");
        
            
        }
            
        ?>

    
        <?php 
        /*
            $posts = mysqli_query($conexao,"select * from posts where usuario_id = $id") or die(mysqli_error($conexao));
            while($post = mysqli_fetch_assoc($posts)){
                echo("<div>
                <h2>".$post["titulo"]."</h2>
                <p>".$post["nome"]."</p>
                <p>".$post["conteudo"]."</p></div>");

            }
            */
        ?>
    </main>
</body>
</html>