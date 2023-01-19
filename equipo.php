<?php

include_once("db.php");

$idEquipoPagina = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM `equipos`;");

$resultCheck = mysqli_num_rows($result);

$comprobar = false;

if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['idEquipo'] == $idEquipoPagina) {
            $comprobar = true;
            $nombreEquipoPagina = $row['nombreEquipo'];
            $logoEquipoGrande = $row['logoGrande'];
            $logoEquipoPequeño = $row['logoPequeño'];
            //

            ///
            break;
        }
    }
}
if (!$comprobar) {
    header('Location: http://localhost/elamateur/');
    die();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipo</title>
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

    <div class="cuerpoequipo">
        <div class="infoequipoindividual">
            <div class="informaciongeneralequipo">
                <?php
                echo '<img src="https://res.cloudinary.com/chypriote/image/upload/t_medium/f_auto/v1634227483/teams/no-need-orga">';

                echo '<h2>' . $nombreEquipoPagina . '</h2>';
                echo '<h4>Redes</h4>';
                ?>
            </div>
            <div class="compitiendoen">
                <h2>Hola</h2>
            </div>
        </div>
        <div class="informacionjugadores">
            <div class="multiopggheader">
                <h3>Miembros</h3>
                <?php
                $resultOPGG = mysqli_query($conn, "SELECT * FROM `jugadores` WHERE nombreEquipo = '" . $nombreEquipoPagina . "';");
                $resultCheckOPGG = mysqli_num_rows($resultOPGG);
                $jugadoresJuntos = '';
                $vuelta = 0;
                //conseguir jugadores
                if ($resultCheckOPGG > 0) {
                    while ($rowOPGG = mysqli_fetch_assoc($resultOPGG)) {
                        $vuelta = $vuelta + 1;
                        //array_push($a, $rowOPGG['nombreJugador']);//hay que hacer bien el link
                        if ($resultCheckOPGG == $vuelta) {
                            $jugadoresJuntos = $jugadoresJuntos . $rowOPGG['nombreJugador'];
                        } else {
                            $jugadoresJuntos = $jugadoresJuntos . $rowOPGG['nombreJugador'] . ',';
                        }
                    }
                }

                $opgglink = 'https://euw.op.gg/multi/query=' . preg_replace("/\s+/", "%20", $jugadoresJuntos);
                echo '<a href=' . $opgglink . '><img src="https://lolpros.gg/_nuxt/img/opgg-long.8f2c257.png" class="opgglogo"></a>';
                ?>

            </div>
            <?php
            $result2 = mysqli_query($conn, "SELECT * FROM `jugadores` WHERE nombreEquipo = '" . $nombreEquipoPagina . "';");
            $resultCheck2 = mysqli_num_rows($result2);
            //conseguir jugadores
            if ($resultCheck2 > 0) {
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    echo '<div class="equipoinformacion">';
                    echo '<div class="infojugadorenequipo">';
                    echo '<div class="jugadorprimero">';
                    echo '<a href="#"><img src="https://lolpros.gg/_nuxt/img/' . $row2["posicion"] . '.844c0d4.svg" style="height: 2rem"></a>';
                    echo '<a href="/elamateur/jugador?id='.$row2['idJugador'].'"><h3>' . $row2['nombreJugador'] . '</h3></a>';
                    echo '</div>';
                    echo '<div class="jugadorsegundo">';
                    echo '<h4>' . $row2['fecha'] . '</h4>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="rangoequipo">';
                    //

                    $result3 = mysqli_query($conn, "SELECT * FROM historialRangos WHERE idJugador = '" . $row2['idJugador'] . "';");

                    $resultCheck3 = mysqli_num_rows($result3);

                    $hoy = getdate();
                    $fechadehoy = $hoy['year'] . '-' . sprintf("%02d", $hoy['mon']) . '-' . sprintf("%02d", $hoy['mday']);

                    if ($resultCheck3 > 0) {
                        while ($row3 = mysqli_fetch_assoc($result3)) {
                            if ($row3['fecha'] >= (sprintf("%02d", $fechadehoy))) {
                                echo '<img src="https://lolpros.gg/_nuxt/img/' . strtolower($row3['division']) . '.b806d6c.png" style="height: 2rem">';
                                echo '<h3>&nbsp&nbsp' . $row3['lps'] . ' LPS</h3>';
                            }
                        }
                    }


                    //

                    echo '</div>';
                    echo '</div>';
                    echo '<div class="bordes">';
                    echo '</div>';
                }
            }

            ?>

        </div>

        <!--staff-------------------------------------------------------------------------------------------->
        <div class="staffdelequipo">
            <div class="multiopggheader">
                <h3>Staff</h3>
            </div>

            <?php
            $resultStaff = mysqli_query($conn, "SELECT * FROM `staff` WHERE nombreEquipo = '" . $nombreEquipoPagina . "';");
            $resultCheckStaff = mysqli_num_rows($resultStaff);
            //conseguir jugadores
            if ($resultCheckStaff > 0) {
                while ($rowStaff = mysqli_fetch_assoc($resultStaff)) {
                    echo '<div class="equipoinformacion">';
                    echo '<div class="infojugadorenequipo">';
                    echo '<div class="jugadorprimero">';
                    echo '<a href="#"><img src="https://lolpros.gg/_nuxt/img/' . $rowStaff['rol'] . '.844c0d4.svg" style="height: 2rem"></a>';
                    echo '<a href="/elamateur/staff?id='.$rowStaff['idStaff'].'"><h3>' . $rowStaff['nombreStaff'] . '</h3></a>';
                    echo '</div>';
                    echo '<div class="jugadorsegundo">';
                    echo '<h4>' . $rowStaff['fecha'] . '</h4>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="bordes">';
                    echo '</div>';
                }
            }


            ?>

        </div>
    </div>

    <div class="cuerpoequiposecundario">
        <div class="antiguosmiembros">
            <div class="headertop">
                <h3>Antiguos miembros</h3>
            </div>
            <div class="tablitaEquipo">
                <?php
                $resultAntiguosMiembros = mysqli_query($conn, "SELECT * FROM `ultimosCambios` WHERE idEquipoAnterior = '" . $idEquipoPagina . "' ORDER BY `fecha` ASC;");
                $resultCheckAntiguosMiembros = mysqli_num_rows($resultAntiguosMiembros);
                //conseguir jugadores
                if ($resultCheckAntiguosMiembros > 0) {
                    while ($rowAntiguosMiembros = mysqli_fetch_assoc($resultAntiguosMiembros)) {
                        echo '<div class="jugador">';
                        echo '<div class="info">';
                        echo '<a href="/elamateur/jugador?id='.$rowAntiguosMiembros['idJugador'].'"><h2>' . $rowAntiguosMiembros['nombreJugador'] . '</h2></a>';
                        echo '<div class="rango">';


                        $result3 = mysqli_query($conn, "SELECT * FROM historialRangos WHERE idJugador = '" . $rowAntiguosMiembros['idJugador'] . "';");

                        $resultCheck3 = mysqli_num_rows($result3);

                        if ($resultCheck3 > 0) {
                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                if ($row3['fecha'] >= (sprintf("%02d", $fechadehoy))) {
                                    //<a href="#"><img src="https://lolpros.gg/_nuxt/img/jungle.720b9bb.svg" style="height: 2rem"></a>
                                    echo '<img src="https://lolpros.gg/_nuxt/img/' . strtolower($row3["division"]) . '.b806d6c.png" style="height: 2rem">';
                                    if($row3['division'] != "CHALLENGER" && $row3['division'] != "GRANDMASTER" && $row3['division'] != "MASTER"){
                                        echo '<span>' . $row3['rango'] . '</span>';
                                    }
                                    echo '<br>';
                                    echo '<span>&nbsp&nbsp' . $row3['lps'] . ' LPS</span>';
                                    echo '<a href="/elamateur/equipo?id='.$rowAntiguosMiembros['idEquipo'].'"><img src="https://res.cloudinary.com/chypriote/image/upload/t_mini/f_auto/v1634227483/teams/' . strtolower($rowAntiguosMiembros['nombreEquipoNuevo']) . '" style="height: 2rem"></a>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '<div class="bordes">';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            }
                        }
                    }
                }

                ?>

            </div>
        </div>

        <div class="resultados">
            <div class="resultadosequipo">
                <div class="headertop">
                    <h3>Resultados del Equipo</h3>
                </div>
                <div class="tablitaEquipo">
                    <?php
                    $resultResultados = mysqli_query($conn, "SELECT * FROM `resultadosEquipos` WHERE idEquipo = '" . $idEquipoPagina . "' ORDER BY `fecha` ASC;");
                    $resultCheckResultados = mysqli_num_rows($resultResultados);
                    //conseguir jugadores
                    if ($resultCheckResultados > 0) {
                        while ($rowResultados = mysqli_fetch_assoc($resultResultados)) {
                            echo '<div class="jugador">';
                            echo '<div class="infoResultados">';
                            echo '<h3>'.$rowResultados['posicion'].'</h3>';
                            echo '<div class="resultadosEquipoTabla">';
                            echo '<a href="/elamateur/liga?nombre='.strtolower($rowResultados['liga']).'"><h4>'.$rowResultados['liga'].'</h4></a><br>';
                            echo '<h5>'.$rowResultados['fecha'].'</h5>';
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