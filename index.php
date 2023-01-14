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
                <a class="laddercompleta" href="#">Ladder Completa</a>
            </div>
            <div class="tablita" id="tablitajugadores">
                <?php
                $result = mysqli_query($conn, "SELECT * FROM historialRangos 
                ORDER BY fecha DESC, FIELD(division,'CHALLENGER','GRANDMASTER','MASTER','DIAMOND') ASC, FIELD(rango,'I', 'II', 'III', 'IV') ASC, lps DESC
                LIMIT 10;");

                $resultCheck = mysqli_num_rows($result);

                $hoy = getdate();
                $fechadehoy = $hoy['year'] . '-' . sprintf("%02d", $hoy['mon']) . '-' . sprintf("%02d", $hoy['mday']);

                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="jugador">';
                        echo '<div class="info">';



                        $conseguirrangos = mysqli_query($conn, "SELECT * FROM `elamateur`.`jugadores` WHERE `idJugador` = " . $row["idJugador"]);
                        $rangosCheck = mysqli_num_rows($result);
                        if ($rangosCheck > 0) {
                            while ($columna = mysqli_fetch_assoc($conseguirrangos)) {
                                //echo $columna['fecha'] . ' + ' . $fechadehoy;
                                if ($row['fecha'] >= (sprintf("%02d", $fechadehoy))) {
                                    echo '<h2>' . $columna['nombreJugador'] . '</h2>';
                                    echo '<div class="rango">';
                                    echo '<a href="#"><img src="https://lolpros.gg/_nuxt/img/' . $columna["posicion"] . '.720b9bb.svg" style="height: 2rem"></a>';
                                    echo '<img src="https://lolpros.gg/_nuxt/img/' . $row["division"] . '.b806d6c.png" style="height: 2rem">';
                                    echo '<span>' . $row['rango'] . '</span>';
                                    echo '<br>';
                                    echo '<span>' . $row['lps'] . '</span>';
                                    echo '<a href="#"><img src="https://res.cloudinary.com/chypriote/image/upload/t_mini/f_auto/v1634227483/teams/' . strtolower($columna['nombreEquipo']) . '" style="height: 2rem"></a>';
                                    break;
                                }
                            }
                        }





                        
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="bordes">';
                        echo '</div>';
                        echo '</div>';
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
                <div class="equipo">
                    <div class="infoequipos">
                        <h3>Nombre Equipo</h3>
                        <div class="infoCambio">
                            <span>Nombre Jugador</span>
                            <h4>&nbsp&nbsp→</h4>
                        </div>

                    </div>
                    <div class="bordes">

                    </div>
                </div>
                <div class="equipo">
                    <div class="infoequipos">
                        <h3>Nombre Equipo</h3>
                        <div class="infoCambio">
                            <span>Nombre Jugador</span>
                            <h4>&nbsp&nbsp→</h4>
                        </div>

                    </div>
                    <div class="bordes">

                    </div>
                </div>
                <div class="equipo">
                    <div class="infoequipos">
                        <h3>Nombre Equipo</h3>
                        <div class="infoCambio">
                            <span>Nombre Jugador</span>
                            <h4>&nbsp&nbsp→</h4>
                        </div>

                    </div>
                    <div class="bordes">

                    </div>
                </div>
                <div class="equipo">
                    <div class="infoequipos">
                        <h3>Nombre Equipo</h3>
                        <div class="infoCambio">
                            <span>Nombre Jugador</span>
                            <h4>&nbsp&nbsp→</h4>
                        </div>

                    </div>
                    <div class="bordes">

                    </div>
                </div>
                <div class="equipo">
                    <div class="infoequipos">
                        <h3>Nombre Equipo</h3>
                        <div class="infoCambio">
                            <span>Nombre Jugador</span>
                            <h4>&nbsp&nbsp→</h4>
                        </div>

                    </div>
                    <div class="bordes">

                    </div>
                </div>
                <div class="equipo">
                    <div class="infoequipos">
                        <h3>Nombre Equipo</h3>
                        <div class="infoCambio">
                            <span>Nombre Jugador</span>
                            <h4>&nbsp&nbsp→</h4>
                        </div>

                    </div>
                    <div class="bordes">

                    </div>
                </div>
                <div class="equipo">
                    <div class="infoequipos">
                        <h3>Nombre Equipo</h3>
                        <div class="infoCambio">
                            <span>Nombre Jugador</span>
                            <h4>&nbsp&nbsp→</h4>
                        </div>

                    </div>
                    <div class="bordes">

                    </div>
                </div>
            </div>
            <div class="footercambios">
                <a class="laddercompleta" href="#">Ver Todos Los Cambios</a>
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