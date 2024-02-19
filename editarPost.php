<?php 
    include "./connection.php";

    $user_id = $_SESSION["user_id"];
    $titulo = $_POST["titulo"];
    $conteudo = $_POST["conteudo"];
    

    $post_id = $_GET["id"];
    $sql=mysqli_query($conexao, "select * from posts where id = '$post_id'") or die(mysqli_error($conexao));
    $dados = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Post</title>
</head>
<body>
    <form action="editandoPost.php" method="POST">
        <input type="hidden" name="id" value="<?=$post_id?>">
        <div>
        <label for="titulo">Título</label>
        <input type="text" name="titulo" value="<?= $dados["titulo"]?>" id="titulo">
        </div>
        
        <div>
            <label for="conteudo">Conteúdo</label>
            <textarea name="conteudo" id="conteudo" cols="30" rows="10"><?= $dados["conteudo"]?></textarea>
        </div>
        
        <button type="submit">Confirmar Edição</button>
    </form>
</body>
</html>