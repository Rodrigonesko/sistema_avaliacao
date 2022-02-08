<?php

    include '../config.php';

    if(isset($_POST['submit'])){

        $nomeJogo = $_POST['nome_jogo'];
        $desc = $_POST['jogo_descricao'];
        $nota = $_POST['nota'];
        $img = $nomeJogo . ".jpg";

        if($nomeJogo == "" || $desc=="" || $nota == "" || $img == ""){
            echo "<script> alert('Algum campo não está preenchido corretamente') </script>";

        } else {

            if($_FILES && $_FILES['imagem']){
                $pastaJogos = "../imgs/jogos/";
                $nomeImagem = $img;
                $imagem = $pastaJogos . $nomeImagem;
                $tmp = $_FILES['imagem']['tmp_name'];

                if(move_uploaded_file($tmp, $imagem)){
                    echo "<script> alert('imagem enviada com sucesso') </script>";
                } else {
                    echo"<script> alert('Erro ao enviar arquivo')</script>";
                }
            }

            $sql = "INSERT INTO jogos(nome, descricao, nota, imagem) VALUES('$nomeJogo', '$desc', '$nota', '$img')";
            $result = mysqli_query($conn, $sql);
    
            if($result){
                echo "<script>alert('jogo cadastrado com sucesso')</script>";
            } else {
                echo "<scrip>alert('algo deu errado') </script>";
            }
        }


    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\css\css\bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin</title>
</head>
<header>
    <?php
        include 'header.php';
    ?>
</header>

<body>
    <form action="#" method="POST" enctype="multipart/form-data">
        <div class="mb-3 margem">
            <label for="exampleFormControlInput1" class="form-label">Nome do jogo</label>
            <input type="text" class="form-control" placeholder="ex: Dark Souls 3" name="nome_jogo" required>
        </div>
        <div class="mb-3 margem">
            <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
            <textarea class="form-control" name="jogo_descricao" rows="3"></textarea required>
        </div>
        <div class="input-group mb-3 margem">
            <label class="input-group-text" for="inputGroupSelect01">Nota</label >
            <select name="nota" class="form-select" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="mb-3 margem">
            <label for="formFile" class="form-label">Foto do jogo</label>
            <input name="imagem" class="form-control" type="file" required>
        </div>
        <div class="margem">
            <button class="btn btn-dark" type="submit" name="submit" id="submit">Enviar</button>
        </div>

    </form>
    <script src="..\js\js\bootstrap.min.js"></script>
</body>

</html>