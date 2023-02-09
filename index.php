<?php

include_once("db.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="icon" href="src/logopequeño.png">
    <link rel="stylesheet" href="estilo.css">
    <script src="https://kit.fontawesome.com/38818051b5.js" crossorigin="anonymous"></script>
    <script src="index.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script>
        /*
        var r = document.querySelector(':root');
        console.log("hola")
        $(document).ready(function() {
            console.log("hola")
            r.style.setProperty('--color-secundario', 'white');
        })*/
    </script>
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
        <div class="opciones">
            <a class="card" href="/ladder">
                <div>
                    <i class="fa-solid fa-bolt"></i>
                    <h2>Top Amateur</h2>
                </div>
            </a>
            <a class="card" href="/ligas">
                <div>
                    <i class="fa-solid fa-trophy"></i>
                    <h2>Ligas</h2>
                </div>
            </a>
            <a class="card" href="/directos">
                <div>
                    <i class="fa-brands fa-twitch"></i>
                    <h2>Directos</h2>
                </div>
            </a>
            <a class="card" href="/mercadolft">
                <div>
                    <i class="fa-solid fa-shop"></i>
                    <h2>Mercado LFT</h2>
                </div>
            </a>
        </div>
    </div>

    <!--<div class="banner">
        <img class="imagenbanner" src="https://via.placeholder.com/1000x200" alt="Anuncio">
    </div>-->

    <div class="tablas">
        <div class="top10">
            <div class="headertop">
                <h3>Top 10 Jugadores</h3>
                <a class="laddercompleta" href="/ladder">Ladder Completa</a>
            </div>
            <div class="tablita" id="tablitajugadores">
                <?php
                $fechaayer = date('Y-m-d',strtotime("-1 days"));
                $result = mysqli_query($conn, "SELECT * FROM historialRangos WHERE fecha = '".$fechaayer."'
                ORDER BY fecha DESC, FIELD(division,'CHALLENGER','GRANDMASTER','MASTER','DIAMOND', 'PLATINUM', 'GOLD', 'SILVER', 'BRONZE', 'IRON') ASC, FIELD(rango,'I', 'II', 'III', 'IV') ASC, lps DESC
                ;");

                $resultCheck = mysqli_num_rows($result);

                $hoy = getdate();
                $fechadehoy = $hoy['year'] . '-' . sprintf("%02d", $hoy['mon']) . '-' . sprintf("%02d", $hoy['mday']);

                $jugadoresCheck = array();
                $limite = 0;

                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        $conseguirrangos = mysqli_query($conn, "SELECT * FROM `elamateur`.`jugadores` WHERE `idJugador` = " . $row["idJugador"]);
                        $rangosCheck = mysqli_num_rows($conseguirrangos);
                        if ($rangosCheck > 0) {
                            while ($columna = mysqli_fetch_assoc($conseguirrangos)) {
                                //echo $columna['fecha'] . ' + ' . $fechadehoy;
                                if ($row['fecha'] >= (sprintf("%02d", $fechadehoy))) {
                                    if ($limite <= 9) {
                                        if (in_array($columna["idJugador"], $jugadoresCheck)) {
                                        } else {

                                            array_push($jugadoresCheck, $columna["idJugador"]);
                                            $limite = $limite + 1;
                                            echo '<div class="jugador">';
                                            echo '<div class="info">';
                                            echo '<a href="/jugador?id=' . $row['idJugador'] . '"><h2>' . $columna['nombreJugador'] . '</h2></a>';
                                            echo '<div class="rango">';
                                            echo '<img src="src/' . strtolower($columna["posicion"]) . '.png" style="height: 2rem">';
                                            echo '<img src="src/' . strtolower($row["division"]) . '.png" style="height: 2rem; padding-right: 10px">';
                                            if ($row['division'] != "CHALLENGER" && $row['division'] != "GRANDMASTER" && $row['division'] != "MASTER") {
                                                echo '<span>' . $row['rango'] . '</span>';
                                            }
                                            echo '<br>';
                                            echo '<span>&nbsp&nbsp' . $row['lps'] . ' LPS</span>';
                                            $conseguiLogoEquipo = mysqli_query($conn, "SELECT * FROM `elamateur`.`equipos` WHERE `idEquipo` = " . $columna['idEquipo']);
                                            $logosCheck = mysqli_num_rows($conseguiLogoEquipo);
                                            if ($logosCheck > 0) {
                                                while ($columnaLogos = mysqli_fetch_assoc($conseguiLogoEquipo)) {
                                                    echo '<a href="/equipo?id=' . $columna['idEquipo'] . '"><img src="' . $columnaLogos["logoGrande"] . '" style="height: 2rem; width: 72px"></a>';
                                                }
                                            }
                                            echo '</div>';
                                            echo '</div>';
                                            echo '<div class="bordes">';
                                            echo '</div>';
                                            echo '</div>';
                                            break;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                ?>
            </div>
        </div>
        <div class="ultimoscambios">
            <div class="headertop">
                <h4>Últimos Cambios de Equipos</h4>
            </div>
            <div class="tablitacambios">
                <?php
                $result = mysqli_query($conn, "SELECT * FROM ultimosCambios
                ORDER BY fecha DESC
                LIMIT 8;");

                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="equipo">';
                        echo '<div class="infoequipos">';
                        echo '<a class="nombrePlayer" href="/jugador?id=' . $row['idJugador'] . '">' . $row['nombreJugador'] . '</a>';
                        echo '<div class="infoCambio">';
                        echo '<a href="/equipo?id=' . $row['idEquipo'] . '">' . $row['nombreEquipoAnterior'] . '</a>';
                        echo '<h4>&nbsp&nbsp→&nbsp&nbsp</h4>';
                        echo '<a href="/equipo?id=' . $row['idEquipoAnterior'] . '">' . $row['nombreEquipoNuevo'] . '</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="bordes">';
                        echo '</div>';
                        echo '</div>';
                    }
                }

                ?>
            </div>
            <div class="footercambios">
                <a class="laddercompleta" href="/cambios">Ver Todos Los Cambios</a>
            </div>

        </div>
    </div>

    <!--<div class="banner">
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
