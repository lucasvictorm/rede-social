<?php 
    include "./connection.php";

    $user_id = $_SESSION["user_id"];
    $titulo = $_POST["titulo"];
    $conteudo = $_POST["conteudo"];
    

    $sql = mysqli_query($conexao,"INSERT into posts(titulo, conteudo, usuario_id) VALUES ('$titulo', '$conteudo', $user_id)");
    echo("<script>window.location='index.php'</script>");
?>