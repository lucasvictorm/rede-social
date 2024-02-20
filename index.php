
<?php
include "./connection.php"
?>
<?php
session_start();
if(!isset($_SESSION["username"]) || !isset($_SESSION["senha"])){
header("location: login.php");
exit;

}

$sql = mysqli_query($conexao, "select p.usuario_id, p.id, p.titulo, p.conteudo, u.username, u.foto from posts as p
join usuarios u on u.id = p.usuario_id") or die(mysqli_error($conexao));
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./styles/style.css">
	<title>Cipó</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
	<?php 
	$sqlUser = mysqli_query($conexao, "select foto, username from usuarios where id = ".$_SESSION['user_id']) or die(mysqli_error($conexao));
	
	$menuData = mysqli_fetch_assoc($sqlUser);
	
	echo("
	
	<div class='menu'>
	<div>
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
	</div>

	<div class='logout'>
	<a href='logout.php'>
	<span class='material-symbols-outlined'>
	logout
	</span>Logout</div>
	</a>
	</div>
	</div>
	");
	echo("<main>");
while($dados = mysqli_fetch_assoc($sql)){
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
	

	
</body>
<script>

	function confirmDelete(id){
		if(window.confirm("Deseja deletar a tarefa?")){
			window.location="deletarPost.php?id="+id;
		}
	}
</script>
</html>