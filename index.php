<?php

include 'config.php'

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\css\bootstrap.min.css">
    <title>Lista de Afazeres</title>
</head>

<body>
    <header>
        <?php
        include 'header.php'
        ?>
    </header>
    <main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">avaliação de jogos</h1>
                    <p class="lead text-muted">Fiz esse site para treinar e colocar os jogos que eu ja joguei e realizar a avaliação sobre o mesmo.</p>
                    <p>
                        <a href="https://github.com/Rodrigonesko" class="btn btn-primary my-2">Meu Github</a>
                        <a href="https://github.com/Rodrigonesko/sistema_avaliacao" class="btn btn-secondary my-2">Link Projeto</a>
                    </p>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="imgs/jogos/darksouls3.jpg" class="bd-placeholder-img card-img-top" width="100%" height="225"
                                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Dark Souls 3</title>
                            <rect width="100%" height="100%" fill="#55595c" />
                            </img>

                            <div class="card-body">
                                <h5>Dark Souls 3</h5>
                                <p class="card-text">Melhor jogo que ja joguei em minha vida.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                    </div>
                                    <small class="text-muted">10/10</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php 
                    
                        $sql = "SELECT * FROM jogos";
                        $resultado = mysqli_query($conn, $sql);

                        if($resultado->num_rows > 0){
                            while($row = $resultado->fetch_assoc()){
                                $nome = $row['nome'];
                                $descricao = $row['descricao'];
                                $nota = $row['nota'];
                                $img = $row['imagem'];
                                echo "<div class='col'>
                                <div class='card shadow-sm'>
                                    <img src='imgs/jogos/$img' class='bd-placeholder-img card-img-top' width='100%' height='225'
                                        xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Placeholder: Thumbnail'
                                        preserveAspectRatio='xMidYMid slice' focusable='false'>
                                    <title>Dark Souls 3</title>
                                    <rect width='100%' height='100%' fill='#55595c' />
                                    </img>
                            
                                    <div class='card-body'>
                                        <h5>$nome</h5>
                                        <p class='card-text'>$descricao</p>
                                        <div class='d-flex justify-content-between align-items-center'>
                                            <div class='btn-group'>
                                            </div>
                                            <small class='text-muted'>$nota</small>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                            }
                        }
                    
                    ?>

                </div>
            </div>
        </div>

    </main>
    <footer>

    </footer>

    <script src="js\js\bootstrap.min.js"></script>
</body>

</html>