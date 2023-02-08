<?php

include_once("db.php");

$idEquipoJugador = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM `jugadores`;");
$resultCheck = mysqli_num_rows($result);
$comprobar = false;
if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['idJugador'] == $idEquipoJugador) {
            $comprobar = true;
            $nombreJugadorPagina = $row['nombreJugador'];
            $rolJugadorPagina = $row['posicion'];
            $nombreEquipodeJugador = $row['nombreEquipo'];
            $idEquipodeJugador = $row['idEquipo'];
            //

            ///
            break;
        }
    }
}

if (!$comprobar) {
    header('Location: https://www.elamateur.es/');
    die();
}
#actual
$result = mysqli_query($conn, "SELECT * FROM `historialRangos` WHERE idJugador = '" . $idEquipoJugador . "' ORDER BY fecha DESC, FIELD(division,'CHALLENGER','GRANDMASTER','MASTER','DIAMOND', 'PLATINUM', 'GOLD', 'SILVER', 'BRONZE', 'IRON') ASC, FIELD(rango,'I', 'II', 'III', 'IV') ASC, lps DESC LIMIT 1;");
$resultCheck = mysqli_num_rows($result);
$comprobar = false;
if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['idJugador'] == $idEquipoJugador) {
            $comprobar = true;
            $divisionActual = $row['division'];
            $rangoActual = $row['rango'];;
            $lpsActual = $row['lps'];;
            $fechaActual = $row['fecha'];
            //

            ///
            break;
        }
    }
}
$result = mysqli_query($conn, "SELECT * FROM `historialRangos` WHERE idJugador = '" . $idEquipoJugador . "' ORDER BY FIELD(division,'CHALLENGER','GRANDMASTER','MASTER','DIAMOND', 'PLATINUM', 'GOLD', 'SILVER', 'BRONZE', 'IRON') ASC, FIELD(rango,'I', 'II', 'III', 'IV') ASC, lps DESC LIMIT 1;");
$resultCheck = mysqli_num_rows($result);
$comprobar = false;
if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['idJugador'] == $idEquipoJugador) {
            $comprobar = true;
            $divisionMaximo = $row['division'];
            $rangoMaximo = $row['rango'];;
            $lpsMaximo = $row['lps'];;
            $fechaMaximo = $row['fecha'];
            //

            ///
            break;
        }
    }
}
#maximo
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugador</title>
    <link rel="icon" href="src/logopequeño.png">
    <link rel="stylesheet" href="estilo.css">
    <script src="https://kit.fontawesome.com/38818051b5.js" crossorigin="anonymous"></script>
    <script src="index.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Fecha');
            data.addColumn('number', 'LPS');
            data.addRows([
                <?php
                $rango;
                $query = "SELECT * FROM historialRangos WHERE idJugador = '" . $idEquipoJugador . "'";
                $res = mysqli_query($conn, $query);
                $result = mysqli_num_rows($res);
                if ($result > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo "['" . $row["fecha"] . "', " . $row["lps"] . "],";
                        //$rango = $row["division"] + $row["rango"];
                        $rango = substr($row["division"], 0);
                    }
                }
                ?>
            ]);

            var options = {
                curveType: 'function',
                legend: {
                    position: 'none'
                },
                backgroundColor: {
                    fill: 'transparent'
                },
                colors: ['#E91E63'],
                hAxis: {
                    textStyle: {
                        color: '#E91E63'
                    }
                },
                chartArea: {
                    left: 65,
                    top: 70,
                    width: "700px",
                    height: "500px"
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
            chart.draw(data, options);
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

    <div class="cuerpoJugadores">
        <div class="infoJugador">
            <div class="tarjetaJugador">
                <?php
                echo '<h3>' . $nombreJugadorPagina . '</h3>';
                ?>
                <div class="redesSocialesJugador">
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-twitch"></i>
                    <i class="fa-solid fa-trophy"></i>
                </div>
                <div class="keypoints">
                    <div class="rolJugador">
                        <?php
                        echo '<img src="src/' . $rolJugadorPagina . '" alt="' . $rolJugadorPagina . '">';
                        switch ($rolJugadorPagina) {
                            case "top":
                                echo '<h4>Toplaner</h4>';
                                break;
                            case "jng":
                                echo '<h4>Jungler</h4>';
                                break;
                            case "mid":
                                echo '<h4>Midlaner</h4>';
                                break;
                            case "adc":
                                echo '<h4>ADC</h4>';
                                break;
                            case "sup":
                                echo '<h4>Support</h4>';
                                break;
                        }
                        ?>
                    </div>
                    <div class="equipoJugador">
                        <img src="" alt="">
                        <?php
                        echo '<a href="https://elamateur.es/equipoid?=' . $idEquipodeJugador . '"><h4>' . $nombreEquipodeJugador . '</h4></a>';
                        ?>
                    </div>
                </div>
            </div>
            <div class="ranks">
                <div class="rankGlobal">
                    <h4>Global</h4>
                    <h4>1</h4>
                </div>
                <div class="rankRol">
                    <h4>Jungle</h4>
                    <h4>1</h4>
                </div>
            </div>
        </div>
        <div class="cuentas">
            <!--
            <div class="opcionesCuentas">
                <ul class="listaCuentas">
                    <li><a href="">ACCOUNTS</a></li>
                    <li><a href="">LIVE GAME</a></li>
                    <li><a href="">NO NEED ORGA</a></li>
                    <li><a href="">PREVIOUS TEAMS</a></li>
                </ul>
            </div>
            <div class="nombreCuentas">
                <div class="cuenta">
                    <div>rango</div>
                    <a href="#">
                        <h4>Agurin</h4>
                    </a>
                </div>
                <div class="cuenta">
                    <div>rango</div>
                    <a href="#">
                        <h4>Agurin</h4>
                    </a>
                </div>
                <div class="cuenta">
                    <div>rango</div>
                    <a href="#">
                        <h4>Agurin</h4>
                    </a>
                </div>
                <div class="cuenta">
                    <div>rango</div>
                    <a href="#">
                        <h4>Agurin</h4>
                    </a>
                </div>
                <div class="cuenta">
                    <div>rango</div>
                    <a href="#">
                        <h4>Agurin</h4>
                    </a>
                </div>
            </div>
            -->
            <div class="infoRank">
                <div class="tarjetaInfoRank">
                    <div>
                        <h2>Rango Actual</h2>
                        <?php
                        echo '<a href="https://www.op.gg/summoners/euw/' . $nombreJugadorPagina . '" target="_blank"><span>OP.GG</span></a>';
                        ?>

                    </div>
                    <div class="tarjetaCurrentRank">
                        <div class="rangoCurrentRank">
                            <?php
                            echo '<span>' . $nombreJugadorPagina . '</span>';
                            ?>
                        </div>
                        <div class="imagenRango">
                            <?php
                            echo '<img src="src/' . strtolower($divisionActual) . '.png" style="height: 5rem">';
                            ?>

                        </div>
                        <div class="infoRangoCurrentRank">
                            <?php
                            echo '<span>' . ucfirst($divisionActual) . '</span>';
                            if ($divisionActual == "CHALLENGER" || $divisionActual == "GRANDMASTER" || $divisionActual == "MASTER") {
                            } else {
                                echo '<span>' . $rangoActual . '</span>';
                            }
                            echo '<span>' . $lpsActual . ' LPS</span>';
                            echo '<span>' . $fechaActual . '</span>';
                            ?>
                        </div>
                    </div>
                </div>

                <div class="tarjetaInfoRank">
                    <div>
                        <h2>Rango Máximo</h2>
                    </div>
                    <div class="tarjetaCurrentRank">
                        <div class="rangoCurrentRank">
                            <?php
                            echo '<span>' . $nombreJugadorPagina . '</span>';
                            ?>
                        </div>
                        <div class="imagenRango">
                            <?php
                            echo '<img src="src/' . strtolower($divisionMaximo) . '.png" style="height: 5rem">';
                            ?>

                        </div>
                        <div class="infoRangoCurrentRank">
                            <?php
                            echo '<span>' . ucfirst($divisionMaximo) . '</span>';
                            if ($divisionMaximo == "CHALLENGER" || $divisionMaximo == "GRANDMASTER" || $divisionMaximo == "MASTER") {
                            } else {
                                echo '<span>' . $rangoMaximo . '</span>';
                            }
                            echo '<span>' . $lpsMaximo . ' LPS</span>';
                            echo '<span>' . $fechaMaximo . '</span>';
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM `historialNombres` WHERE idJugador = '" . $idEquipoJugador . "';");
                $resultCheck = mysqli_num_rows($result);
                $comprobar = false;
                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['idJugador'] == $idEquipoJugador) {
                            echo '<div class="tarjetaInfoRank">';
                            echo '<div>';
                            echo '<h2>Nombres de Invocador</h2>';
                            echo '</div>';
                            echo '<ul>';
                            echo '<div>';
                            echo '<span>' . $row["nombreAnterior"] . '</span>';
                            echo '<span>' . $row["fecha"] . '</span>';
                            echo '</div>';
                            echo '</ul>';
                            echo '</div>';
                        }
                    }
                }
                ?>

                <div class="rankHistory">
                    <div class="curve_chart" id="curve_chart" style="width:900px; height:500px">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- <div class="banner">
        <img class="imagenbanner" src="https://via.placeholder.com/1000x200" alt="Anuncio">
    </div> -->

    <footer class="pie">
        <div class="grupo-2">
            <!--<a href="#"><i class="fa-brands fa-discord"></i></a>-->
            <a href="https://twitter.com/miralpe"><i class="fa-brands fa-twitter"></i></a>
            <a href="https://twitter.com/rjzass"><i class="fa-brands fa-twitter"></i></a>

        </div>
    </footer>
</body>

</html>