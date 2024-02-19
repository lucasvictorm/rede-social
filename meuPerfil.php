<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>Perfil</title>
    <link rel="stylesheet" href="./styles/meuPerfil.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <?php 
    include "./connection.php";
    $userId = $_SESSION["user_id"];
    $sql=mysqli_query($conexao, "select * from usuarios where id = $user_id") or die(mysqli_error($conexao));
    $dados = mysqli_fetch_assoc($sql);
    
    ?>

    <div class='menu'>
	<h1>Meu perfil</h1>
	<div class="fotoPerfil">
        <img src="./fotosPerfil/<?=!isset($dados["foto"]) ? "default.png": $dados["foto"]?>" alt="foto padrão">
    </div>
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
	</div>

    <div id="divOculta">

    </div>

<section class="headerMain">


    <section class="perfilHeader">
    
    <form action="atualizarUser.php" method="POST" enctype="multipart/form-data">
        <div class="divLeft">

        
        <input type="hidden" name="id" value=<?=$user_id?>>
        <label for="foto">Foto de perfil</label>
        <input type="file" name="foto" id="foto" >
        <div>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value=<?= $dados["nome"]?>>
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value=<?= $dados["email"]?>>
        </div>
        
        <div>
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" value=<?=$dados["senha"]?>>
        </div>
        </div>
        <div class="divRight">

        <div>
            <label for="bio">Bio</label>
            <textarea name="bio" id="bio" cols="30" rows="5"><?=utf8_encode($dados["bio"])?></textarea>
        </div>

        <div class="perfilBotoes">
            <button type="submit" id="salvar">Salvar</button>
            <button id="descartar">Descartar alterações</button>
        </div>
        </div>

    </form>
    </section>
    <main>
        <?php 
        $sqlPosts = mysqli_query($conexao, "select p.usuario_id, p.id, p.titulo, p.conteudo, u.username, u.foto from posts as p
        join usuarios u on u.id = p.usuario_id and u.id = $userId") or die(mysqli_error($conexao));
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
    </main>
    </section>
    
</body>
<script>
    let descartar = document.getElementById("descartar");
    descartar.addEventListener("click", (e) =>{
        e.preventDefault();
        location.reload();
    })
     
</script>
</html>