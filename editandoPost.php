<?php 
    include "./connection.php";

    $id = $_POST["id"];
    $titulo = $_POST["titulo"];
    $conteudo = $_POST["conteudo"];
    

    $sql = mysqli_query($conexao,"UPDATE posts set titulo = '$titulo', conteudo = '$conteudo' where id = $id");
    echo("<script>window.location='index.php'</script>");
?>