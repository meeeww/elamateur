<?php

include "db.php";

?>

<html>

<head>
    <link rel="stylesheet" href="estilo.css">
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
                $query = "SELECT * FROM historialRangos WHERE idJugador = 5";
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
                colors: ['#E91E63']
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
            chart.draw(data, options);
        }
    </script>
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
    <div class="graficoChart">
        <h3>Hola</h3>
        <div class="curve_chart" id="curve_chart" style="width:900px; height:500px"></div>
    </div>
</body>

</html>