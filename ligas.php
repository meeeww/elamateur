<?php

include_once("db.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ligas</title>
    <link rel="icon" href="src/logopequeño.png">
    <link rel="stylesheet" href="estilo.css">
    <script src="https://kit.fontawesome.com/38818051b5.js" crossorigin="anonymous"></script>
    <script src="index.js"></script>
</head>

<body>
    <header>
        <a href="https://www.elamateur.es" class="logo">
            <img src="src/logo.png" alt="Logo">
        </a>
        <div class="linksheader">
            <nav>
                <a href="https://www.elamateur.es" class="nav-link">Inicio</a>
                <a href="/ladder" class="nav-link">Ladder</a>
                <a href="/ligas" class="nav-link">Ligas</a>
                <a href="/directos" class="nav-link">Directos</a>
                <a href="/mercadolft" class="nav-link">Mercado LFT</a>
            </nav>
        </div>
    </header>
    <header class="headeroculto">
        <a href="https://www.elamateur.es" class="logo">
            <img src="src/logo.png" alt="Logo">
        </a>
        <div class="linksheader">
            <nav>
                <a href="https://www.elamateur.es" class="nav-link">Inicio</a>
                <a href="/ladder" class="nav-link">Ladder</a>
                <a href="/ligas" class="nav-link">Ligas</a>
                <a href="/directos" class="nav-link">Directos</a>
                <a href="/mercadolft" class="nav-link">Mercado LFT</a>
            </nav>
        </div>
    </header>

    <div class="cuerpo">
        <div class="listaLigas">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM `listaLigas`");

            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="tarjetaLiga">';
                    echo '<div class="parteIzquierda">';
                    echo '<h3>' . $row['puntuacion'] . '/10</h3>';
                    echo '<img src="' . $row['logo'] . '" alt="Avatar">';
                    echo '<h3>Desde ' . $row['fechaYYYY'] . '</h3>';
                    echo '</div>';
                    echo '<div class="parteDerecha">';
                    echo '<div class="nombreLiga">';
                    echo '<a href="' . $row['web'] . '">';
                    echo '<h2>' . $row['nombreLiga'] . '</h2>';
                    echo '</a>';
                    echo '</div>';
                    echo '<div class="descripcionLiga">';
                    echo '<p>' . $row['descripcion'] . '</p>';
                    echo '</div>';
                    echo '<div class="infoLiga">';
                    echo '<div class="divisionesLiga">';
                    echo '<h4>Divisiones</h4>';
                    echo '<i class="fa-solid fa-flag"></i>';
                    echo '<h4>' . $row['divisiones'] . '</h4>';
                    echo '</div>';
                    echo '<div class="jornadasLiga">';
                    echo '<h4>Jornadas</h4>';
                    echo '<i class="fa-solid fa-calendar"></i>';
                    echo '<h4>' . $row['jornadas'] . '</h4>';
                    echo '</div>';
                    echo '<div class="jugadoresLiga">';
                    echo '<h4>Jugadores</h4>';
                    echo '<i class="fa-solid fa-user"></i>';
                    echo '<h4>' . $row['jugadores'] . '+</h4>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '';
                    echo '';
                }
            }
            ?>
        </div>
    </div>

    <!--<div class="banner">
        <img class="imagenbanner" src="https://via.placeholder.com/1000x200" alt="Anuncio">
    </div>

    <div class="banner">
        <img class="imagenbanner" src="https://via.placeholder.com/1000x200" alt="Anuncio">
    </div>-->

    <footer class="pie">
        <div class="grupo-2">
            <!--<a href="#"><i class="fa-brands fa-discord"></i></a>-->
            <a href="https://twitter.com/miralpe"><i class="fa-brands fa-twitter"></i></a>
            <a href="https://twitter.com/rjzass"><i class="fa-brands fa-twitter"></i></a>

        </div>
    </footer>
</body>

</html>