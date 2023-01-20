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
    <link rel="stylesheet" href="estilo.css">
    <script src="https://kit.fontawesome.com/38818051b5.js" crossorigin="anonymous"></script>
    <script src="index.js"></script>
</head>

<body>
    <header>
        <a href="#" class="logo">
            <img src="https://via.placeholder.com/150" alt="Logo">
        </a>
        <div class="linksheader">
            <nav>
                <a href="" class="nav-link">Inicio</a>
                <a href="" class="nav-link">Ladder</a>
                <a href="" class="nav-link">Ligas</a>
                <a href="" class="nav-link">Directos</a>
                <a href="" class="nav-link">Mercado LFT</a>
            </nav>
        </div>
    </header>
    <header class="headeroculto">
        <a href="#" class="logo">
            <img src="https://via.placeholder.com/150" alt="Logo">
        </a>
        <div class="linksheader">
            <nav>
                <a href="" class="nav-link">Inicio</a>
                <a href="" class="nav-link">Ladder</a>
                <a href="" class="nav-link">Ligas</a>
                <a href="" class="nav-link">Directos</a>
                <a href="" class="nav-link">Mercado LFT</a>
            </nav>
        </div>
    </header>

    <div class="cuerpo">
        <div class="opciones">
            <a class="card" href="#">
                <div>
                    <i class="fa-solid fa-bolt"></i>
                    <h2>Ladder</h2>
                </div>
            </a>
            <a class="card" href="#">
                <div>
                    <i class="fa-solid fa-trophy"></i>
                    <h2>Ligas</h2>
                </div>
            </a>
            <a class="card" href="#">
                <div>
                    <i class="fa-brands fa-twitch"></i>
                    <h2>Directos</h2>
                </div>
            </a>
            <a class="card" href="#">
                <div>
                    <i class="fa-solid fa-shop"></i>
                    <h2>Mercado LFT</h2>
                </div>
            </a>
        </div>
    </div>

    <div class="banner">
        <img class="imagenbanner" src="https://via.placeholder.com/1000x200" alt="Anuncio">
    </div>

    <div class="tablas">
        <div class="top10">
            <div class="headertop">
                <h3>Top 10 Jugadores</h3>
                <a class="laddercompleta" href="/elamateur/ladder">Ladder Completa</a>
            </div>
            <div class="tablita" id="tablitajugadores">
                <?php
                $result = mysqli_query($conn, "SELECT * FROM historialRangos
                ORDER BY fecha DESC, FIELD(division,'CHALLENGER','GRANDMASTER','MASTER','DIAMOND') ASC, FIELD(rango,'I', 'II', 'III', 'IV') ASC, lps DESC
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
                                    if($limite <= 9){
                                        if (in_array($columna["idJugador"], $jugadoresCheck)) {
                                        } else {
                                            
                                            array_push($jugadoresCheck, $columna["idJugador"]);
                                            $limite = $limite + 1;
                                            echo $jugadoresCheck[0];
                                            echo '<div class="jugador">';
                                            echo '<div class="info">';
                                            echo '<a href="/elamateur/jugador?id=' . $row['idJugador'] . '"><h2>' . $columna['nombreJugador'] . '</h2></a>';
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
                LIMIT 9;");

                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="equipo">';
                        echo '<div class="infoequipos">';
                        echo '<a class="nombrePlayer" href="/elamateur/jugador?id=' . $row['idJugador'] . '">' . $row['nombreJugador'] . '</a>';
                        echo '<div class="infoCambio">';
                        echo '<a href="/elamateur/equipo?id=' . $row['idEquipo'] . '">' . $row['nombreEquipoAnterior'] . '</a>';
                        echo '<h4>&nbsp&nbsp→&nbsp&nbsp</h4>';
                        echo '<a href="/elamateur/equipo?id=' . $row['idEquipoAnterior'] . '">' . $row['nombreEquipoNuevo'] . '</a>';
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
                <a class="laddercompleta" href="/elamateur/cambios">Ver Todos Los Cambios</a>
            </div>

        </div>
    </div>

    <div class="banner">
        <img class="imagenbanner" src="https://via.placeholder.com/1000x200" alt="Anuncio">
    </div>

    <footer class="pie">
        <div class="grupo-2">
            <small>&copy; 2023<b> Lee Sin</b> - Derechos Reservados</small>
        </div>
    </footer>
</body>

</html>