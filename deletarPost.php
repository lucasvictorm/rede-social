<?php 
    $host = "localhost";
    $user = "root";
    $pass = "123";
    $banco = "socialdb";
    $conexao = mysql_connect($host, $user, $pass) or die(mysql_error());
    mysql_select_db($banco) or die (mysql_error());

    $id = $_GET["id"];
    $titulo = $_POST["titulo"];
    $conteudo = $_POST["conteudo"];
    

    $sql = mysql_query("DELETE FROM posts where id = $id");
    echo("<script>window.location='index.php'</script>");
?>