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
                include_once "db.php";
$myslqi = include_once "db.php";
$resultado = $mysqli->query("SELECT * FROM jugadores");
$jugadores = $resultado->fetch_all(MYSQLI_ASSOC);
echo "Hola";
                ?>
                <div class="jugador">
                    <div class="info">

                        <h2>Agurin</h2>
                        <div class="rango">
                            <a href="#"><img src="https://lolpros.gg/_nuxt/img/jungle.720b9bb.svg" style="height: 2rem"></a>
                            <img src="https://lolpros.gg/_nuxt/img/challenger.b806d6c.png" style="height: 2rem">
                            <span>15 LPS</span>
                            <a href="#"><img src="https://res.cloudinary.com/chypriote/image/upload/t_mini/f_auto/v1634227483/teams/no-need-orga" style="height: 2rem"></a>
                        </div>

                    </div>
                    <div class="bordes">

                    </div>
                </div>
                <div class="jugador">
                    <div class="info">
                        <h2>Agurin</h2>
                        <div class="rango">
                            <a href="#"><img src="https://lolpros.gg/_nuxt/img/jungle.720b9bb.svg" style="height: 2rem"></a>
                            <img src="https://lolpros.gg/_nuxt/img/challenger.b806d6c.png" style="height: 2rem">
                            <span>15 LPS</span>
                            <a href="#"><img src="https://res.cloudinary.com/chypriote/image/upload/t_mini/f_auto/v1634227483/teams/no-need-orga" style="height: 2rem"></a>
                        </div>

                    </div>
                    <div class="bordes">

                    </div>
                </div>
                <div class="jugador">
                    <div class="info">
                        <h2>Agurin</h2>
                        <div class="rango">
                            <a href="#"><img src="https://lolpros.gg/_nuxt/img/jungle.720b9bb.svg" style="height: 2rem"></a>
                            <img src="https://lolpros.gg/_nuxt/img/challenger.b806d6c.png" style="height: 2rem">
                            <span>15 LPS</span>
                            <a href="#"><img src="https://res.cloudinary.com/chypriote/image/upload/t_mini/f_auto/v1634227483/teams/no-need-orga" style="height: 2rem"></a>
                        </div>

                    </div>
                    <div class="bordes">

                    </div>
                </div>
                <div class="jugador">
                    <div class="info">
                        <h2>Agurin</h2>
                        <div class="rango">
                            <a href="#"><img src="https://lolpros.gg/_nuxt/img/jungle.720b9bb.svg" style="height: 2rem"></a>
                            <img src="https://lolpros.gg/_nuxt/img/challenger.b806d6c.png" style="height: 2rem">
                            <span>15 LPS</span>
                            <a href="#"><img src="https://res.cloudinary.com/chypriote/image/upload/t_mini/f_auto/v1634227483/teams/no-need-orga" style="height: 2rem"></a>
                        </div>

                    </div>
                    <div class="bordes">

                    </div>
                </div>
                <div class="jugador">
                    <div class="info">
                        <h2>Agurin</h2>
                        <div class="rango">
                            <a href="#"><img src="https://lolpros.gg/_nuxt/img/jungle.720b9bb.svg" style="height: 2rem"></a>
                            <img src="https://lolpros.gg/_nuxt/img/challenger.b806d6c.png" style="height: 2rem">
                            <span>15 LPS</span>
                            <a href="#"><img src="https://res.cloudinary.com/chypriote/image/upload/t_mini/f_auto/v1634227483/teams/no-need-orga" style="height: 2rem"></a>
                        </div>

                    </div>
                    <div class="bordes">

                    </div>
                </div>
                <div class="jugador">
                    <div class="info">
                        <h2>Agurin</h2>
                        <div class="rango">
                            <a href="#"><img src="https://lolpros.gg/_nuxt/img/jungle.720b9bb.svg" style="height: 2rem"></a>
                            <img src="https://lolpros.gg/_nuxt/img/challenger.b806d6c.png" style="height: 2rem">
                            <span>15 LPS</span>
                            <a href="#"><img src="https://res.cloudinary.com/chypriote/image/upload/t_mini/f_auto/v1634227483/teams/no-need-orga" style="height: 2rem"></a>
                        </div>

                    </div>
                    <div class="bordes">

                    </div>
                </div>
                <div class="jugador">
                    <div class="info">
                        <h2>Agurin</h2>
                        <div class="rango">
                            <a href="#"><img src="https://lolpros.gg/_nuxt/img/jungle.720b9bb.svg" style="height: 2rem"></a>
                            <img src="https://lolpros.gg/_nuxt/img/challenger.b806d6c.png" style="height: 2rem">
                            <span>15 LPS</span>
                            <a href="#"><img src="https://res.cloudinary.com/chypriote/image/upload/t_mini/f_auto/v1634227483/teams/no-need-orga" style="height: 2rem"></a>
                        </div>

                    </div>
                    <div class="bordes">

                    </div>
                </div>
                <div class="jugador">
                    <div class="info">
                        <h2>Agurin</h2>
                        <div class="rango">
                            <a href="#"><img src="https://lolpros.gg/_nuxt/img/jungle.720b9bb.svg" style="height: 2rem"></a>
                            <img src="https://lolpros.gg/_nuxt/img/challenger.b806d6c.png" style="height: 2rem">
                            <span>15 LPS</span>
                            <a href="#"><img src="https://res.cloudinary.com/chypriote/image/upload/t_mini/f_auto/v1634227483/teams/no-need-orga" style="height: 2rem"></a>
                        </div>

                    </div>
                    <div class="bordes">

                    </div>
                </div>
                <div class="jugador">
                    <div class="info">
                        <h2>Agurin</h2>
                        <div class="rango">
                            <a href="#"><img src="https://lolpros.gg/_nuxt/img/jungle.720b9bb.svg" style="height: 2rem"></a>
                            <img src="https://lolpros.gg/_nuxt/img/challenger.b806d6c.png" style="height: 2rem">
                            <span>15 LPS</span>
                            <a href="#"><img src="https://res.cloudinary.com/chypriote/image/upload/t_mini/f_auto/v1634227483/teams/no-need-orga" style="height: 2rem"></a>
                        </div>

                    </div>
                    <div class="bordes">

                    </div>
                </div>
                <div class="jugador">
                    <div class="info">
                        <h2>Agurin</h2>
                        <div class="rango">
                            <a href="#"><img src="https://lolpros.gg/_nuxt/img/jungle.720b9bb.svg" style="height: 2rem"></a>
                            <img src="https://lolpros.gg/_nuxt/img/challenger.b806d6c.png" style="height: 2rem">
                            <span>15 LPS</span>
                            <a href="#"><img src="https://res.cloudinary.com/chypriote/image/upload/t_mini/f_auto/v1634227483/teams/no-need-orga" style="height: 2rem"></a>
                        </div>

                    </div>
                    <div class="bordes">

                    </div>
                </div>
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