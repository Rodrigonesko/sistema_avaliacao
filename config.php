<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "Pessoal";

    $conn = mysqli_connect($server, $username, $password, $db);

    if(!$conn){
        die ("<script> alert('Falha na conexão com o banco de dados.') </script>");
    } 