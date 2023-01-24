<?php

include "db.php";

?>

<html>

<head>
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
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
            chart.draw(data, options);
        }
    </script>
</head>

<body>
    <div class="graficoChart">
        <h3 class="hola">Hola</h3>
        <div id="curve_chart" style="width:900px; height:500px"></div>
    </div>
</body>

</html>