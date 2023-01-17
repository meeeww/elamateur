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

    <div class="tablasLadder">
        <div class="topLadder">
            <div class="headertopLadder">
                <h3 class="jugadorHeaderLadder">Jugador</h3>
                <h3 class="rolHeaderLadder">Rol</h3>
                <h3 class="rangoHeaderLadder">Rango</h3>
                <h3 class="equipoHeaderLadder">Equipo</h3>
            </div>
            <div class="tablaLadder">

                <?php
                $result = mysqli_query($conn, "SELECT * FROM historialRangos
            ORDER BY fecha DESC, FIELD(division,'CHALLENGER','GRANDMASTER','MASTER','DIAMOND') ASC, FIELD(rango,'I', 'II', 'III', 'IV') ASC, lps DESC;");

                $resultCheck = mysqli_num_rows($result);

                $hoy = getdate();
                $fechadehoy = $hoy['year'] . '-' . sprintf("%02d", $hoy['mon']) . '-' . sprintf("%02d", $hoy['mday']);
                $contador = 1;
                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="jugadorLadder">';
                        echo '<div class="infoLadder">';
                        $conseguirrangos = mysqli_query($conn, "SELECT * FROM `elamateur`.`jugadores` WHERE `idJugador` = " . $row["idJugador"]);
                        $rangosCheck = mysqli_num_rows($conseguirrangos);

                        
                        if ($rangosCheck > 0) {
                            while ($columna = mysqli_fetch_assoc($conseguirrangos)) {
                                //echo $columna['fecha'] . ' + ' . $fechadehoy;
                                
                                if ($row['fecha'] >= (sprintf("%02d", $fechadehoy))) {
                                    echo '<h2 style="padding-right: 2vh">'.$contador.'º</h2>';
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
    </div>

    <footer class="pie">
        <div class="grupo-2">
            <small>&copy; 2023<b> Lee Sin</b> - Derechos Reservados</small>
        </div>
    </footer>
</body>

</html>