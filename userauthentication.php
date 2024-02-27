
<?php
include "./connection.php"
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Autenticação</title>
</head>
<body>
	<script>
		function deuErro(){
			window.location='login.php?status="erro"';
		}
	
	
	
	</script>
<?php
$username=$_POST['username'];
$senha=$_POST['senha'];

$sql=mysqli_query($conexao, "select * from usuarios where username='$username' and senha ='$senha' ") or die(mysqli_error($conexao));
$row=mysqli_num_rows($sql);

$dados = mysqli_fetch_assoc($sql);

if ($row > 0){
	
 session_start();
 $_SESSION['username']=$_POST['username'];
 $_SESSION['senha']=$_POST['senha'];
 $_SESSION['user_id']=$dados['id'];
 echo"<script>window.location='index.php'</script>";
   }
	else
	{
		echo'<script>deuErro()</script>';
 //echo'<script>window.location="login.php?status="err"</script>';
}
?>
</body>

</html>
