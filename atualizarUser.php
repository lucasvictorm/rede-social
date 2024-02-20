<?php 
    include "./connection.php";

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["password"];
    $foto = $_FILES["foto"]["name"];
    $bio = $_POST["bio"];
    echo($nome);
    $formato = pathinfo($foto, PATHINFO_EXTENSION);
    $novo_nome = "fotoId$id";
    $diretorio = "./fotosPerfil/";

    $sql = mysqli_query($conexao, "UPDATE usuarios set nome = '$nome', email = '$email', bio = '$bio', senha = '$senha', foto = '$novo_nome.$formato' where id = $id");

    copy($_FILES["foto"]["tmp_name"], "$diretorio$novo_nome.$formato");
    
    //chmod("./fotosPerfil/", 0777);
    echo("<script>window.location='index.php'</script>");
?>
