<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sistema de cadastro</title>
<script type="text/javascript">

function temnobanco(){
    window.location='cadastro.php?status="erro"';
}
function cadok(){
  window.location='login.php';
}
</script>
</head>
<body>
<?php
include "./connection.php";
?>
<?php
$nome=$_POST['nome'];
$username=$_POST['username'];
$email=$_POST['email'];
$senha=$_POST['senha'];

$sql=mysqli_query($conexao, "select * from usuarios where username='$username'") or die(mysqli_error($conexao));
$row=mysqli_num_rows($sql);

if ($row > 0){
	
 
 echo"<script>temnobanco()</script>";
   }
else{
$sql = mysqli_query($conexao, "INSERT into usuarios(nome, username, email, senha)
values('$nome','$username','$email','$senha')");
echo "<center>Cadastro efetuado com sucesso :D</center>"; 
echo"<script>cadok()</script>";
}
?>
</body>
</html>
