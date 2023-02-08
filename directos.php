<?php

include_once("db.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Directos</title>
    <link rel="icon" href="src/logopequeño.png">
    <link rel="stylesheet" href="estilo.css">
    <script src="https://kit.fontawesome.com/38818051b5.js" crossorigin="anonymous"></script>
    <script src="index.js"></script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
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

    <div class="tablasLadder">
        <div class="topLadder">
            <div class="botonesLadder">
                <?php
                $opcion = "";
                if (isset($_POST['todos'])) {
                    $opcion = "";
                } else if (isset($_POST['top'])) {
                    $opcion = "top";
                } else if (isset($_POST['jungla'])) {
                    $opcion = "jng";
                } else if (isset($_POST['mid'])) {
                    $opcion = "mid";
                } else if (isset($_POST['adc'])) {
                    $opcion = "adc";
                } else if (isset($_POST['support'])) {
                    $opcion = "sup";
                }
                ?>
                <form method="post">
                    <button type="submit" name="todos" value="Todos"><img src="https://lolpros.gg/_nuxt/img/jungle.720b9bb.svg" alt="Todos" height="32px" width="32px"></button>
                    <button type="submit" name="top" value="Top"><img src="https://lolpros.gg/_nuxt/img/jungle.720b9bb.svg" alt="Top" height="32px" width="32px"></button>
                    <button type="submit" name="jungla" value="Jungla"><img src="https://lolpros.gg/_nuxt/img/jungle.720b9bb.svg" alt="Jungla" height="32px" width="32px"></button>
                    <button type="submit" name="mid" value="Mid"><img src="https://lolpros.gg/_nuxt/img/jungle.720b9bb.svg" alt="Jungla" height="32px" width="32px"></button>
                    <button type="submit" name="adc" value="ADC"><img src="https://lolpros.gg/_nuxt/img/jungle.720b9bb.svg" alt="ADC" height="32px" width="32px"></button>
                    <button type="submit" name="support" value="Support"><img src="https://lolpros.gg/_nuxt/img/jungle.720b9bb.svg" alt="Support" height="32px" width="32px"></button>
                </form>
            </div>
        </div>
        <div class="topLadder">

            <div class="headertopLadder">
                <h3 class="jugadorHeaderLadder">Jugador</h3>
                <h3 class="rolHeaderLadder">Rol</h3>
                <h3 class="rangoHeaderLadder">Rango</h3>
                <h3 class="equipoHeaderLadder">LFT Desde</h3>
                <h3 class="rangoHeaderLadder">op.gg</h3>
            </div>
            <div class="tablaLadder">

                <?php
                $result = mysqli_query($conn, "SELECT * FROM historialRangos
            ORDER BY fecha DESC, FIELD(division,'CHALLENGER','GRANDMASTER','MASTER','DIAMOND') ASC, FIELD(rango,'I', 'II', 'III', 'IV') ASC, lps DESC;");

                $resultCheck = mysqli_num_rows($result);

                $hoy = getdate();
                $fechadehoy = $hoy['year'] . '-' . sprintf("%02d", $hoy['mon']) . '-' . sprintf("%02d", $hoy['mday']);
                $contador = 1;
                $jugadoresCheck = array();
                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($opcion == "") {
                            $conseguirrangos = mysqli_query($conn, "SELECT * FROM `elamateur`.`jugadores` WHERE `idJugador` = '" . $row["idJugador"] . "'");
                            $rangosCheck = mysqli_num_rows($conseguirrangos);


                            if ($rangosCheck > 0) {
                                while ($columna = mysqli_fetch_assoc($conseguirrangos)) {


                                    if (in_array($columna["idJugador"], $jugadoresCheck)) {
                                    } else {
                                        array_push($jugadoresCheck, $columna["idJugador"]);
                                        echo '<div class="jugadorLadder">';
                                        echo '<div class="infoLadder">';
                                        if ($row['fecha'] >= (sprintf("%02d", $fechadehoy))) {
                                            echo '<h2 style="padding-right: 2vh">' . $contador . 'º</h2>';
                                            echo '<a href="/elamateur/jugador?id=' . $row['idJugador'] . '"><h2>' . $columna['nombreJugador'] . '</h2></a>';
                                            $contador = $contador + $rangosCheck;
                                            echo '<div class="rango">';
                                            echo '<a href="#"><img src="https://lolpros.gg/_nuxt/img/' . strtolower($columna["posicion"]) . '.720b9bb.svg" style="height: 2rem"></a>';
                                            echo '<img src="https://lolpros.gg/_nuxt/img/' . strtolower($row["division"]) . '.b806d6c.png" style="height: 2rem">';
                                            if ($row['division'] != "CHALLENGER" && $row['division'] != "GRANDMASTER" && $row['division'] != "MASTER") {
                                                echo '<span>' . $row['rango'] . '</span>';
                                            }
                                            echo '<br>';
                                            echo '<span>&nbsp&nbsp' . $row['lps'] . ' LPS</span>';
                                            echo '<a href="/elamateur/equipo?id=' . $columna['idEquipo'] . '"><img src="https://res.cloudinary.com/chypriote/image/upload/t_mini/f_auto/v1634227483/teams/' . strtolower($columna['nombreEquipo']) . '" style="height: 2rem"></a>';
                                            echo '</div>';
                                            echo '</div>';
                                            echo '<div class="bordes">';
                                            echo '</div>';
                                            echo '</div>';
                                            break;
                                        }
                                    }
                                    //echo $columna['fecha'] . ' + ' . $fechadehoy;


                                }
                            }
                        } else {
                            $conseguirrangos = mysqli_query($conn, "SELECT * FROM `elamateur`.`jugadores` WHERE `idJugador` = '" . $row["idJugador"] . "' AND `posicion` = '" . $opcion . "'");
                            $rangosCheck = mysqli_num_rows($conseguirrangos);


                            if ($rangosCheck > 0) {
                                while ($columna = mysqli_fetch_assoc($conseguirrangos)) {


                                    if (in_array($columna["idJugador"], $jugadoresCheck)) {
                                    } else {
                                        array_push($jugadoresCheck, $columna["idJugador"]);
                                        echo '<div class="jugadorLadder">';
                                        echo '<div class="infoLadder">';
                                        if ($row['fecha'] >= (sprintf("%02d", $fechadehoy))) {
                                            echo '<h2 style="padding-right: 2vh">' . $contador . 'º</h2>';
                                            echo '<a href="/elamateur/jugador?id=' . $row['idJugador'] . '"><h2>' . $columna['nombreJugador'] . '</h2></a>';
                                            $contador = $contador + $rangosCheck;
                                            echo '<div class="rango">';
                                            echo '<a href="#"><img src="https://lolpros.gg/_nuxt/img/' . strtolower($columna["posicion"]) . '.720b9bb.svg" style="height: 2rem"></a>';
                                            echo '<img src="https://lolpros.gg/_nuxt/img/' . strtolower($row["division"]) . '.b806d6c.png" style="height: 2rem">';
                                            if ($row['division'] != "CHALLENGER" && $row['division'] != "GRANDMASTER" && $row['division'] != "MASTER") {
                                                echo '<span>' . $row['rango'] . '</span>';
                                            }
                                            echo '<br>';
                                            echo '<span>&nbsp&nbsp' . $row['lps'] . ' LPS</span>';
                                            echo '<a href="/elamateur/equipo?id=' . $columna['idEquipo'] . '"><img src="https://res.cloudinary.com/chypriote/image/upload/t_mini/f_auto/v1634227483/teams/' . strtolower($columna['nombreEquipo']) . '" style="height: 2rem"></a>';
                                            echo '</div>';
                                            echo '</div>';
                                            echo '<div class="bordes">';
                                            echo '</div>';
                                            echo '</div>';
                                            break;
                                        }
                                    }
                                    //echo $columna['fecha'] . ' + ' . $fechadehoy;


                                }
                            }
                        }
                    }
                }

                ?>

            </div>
        </div>
    </div>

    <footer class="pie">
        <div class="grupo-2">
            <!--<a href="#"><i class="fa-brands fa-discord"></i></a>-->
            <a href="https://twitter.com/miralpe"><i class="fa-brands fa-twitter"></i></a>
            <a href="https://twitter.com/rjzass"><i class="fa-brands fa-twitter"></i></a>

        </div>
    </footer>
</body>

</html>