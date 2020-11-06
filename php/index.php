<?php

$host = 'db'; //nombre del servicio desde el docker-compose
$user = 'admlinux';
$password = 'admlinux';
$db = 'MedicionesDB';

$conn = new mysqli($host,$user,$password,$db);

//SET GLOBAL time_zone = 'Europe/Madrid';

if($conn->connect_error){
    echo 'La conexion falló' . $conn->connect_error;
}

echo '<div style=font-size:30px Ubuntu>TP Adm Linux Segundo Cuatrimestre 2020</div><br><br> ';
echo 'Alumnos: Aguero Nicolás y Rota Franco<br><br>';


$datos = $conn->query("SELECT * FROM Tensiones");


?>

<!DOCTYPE html>
<html>
  <body>

<style type="text/css">
.milogo{

        margin: 40;
        display: block;
}
</style>

<img src="/imagenes/logo-unsam.jpg" width="280" height="125" title="Logo de UNSAM" alt="milogo" />


  </body>
</html>



<!DOCTYPE HTML>
<html>
        <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Highcharts Example</title>

                <style type="text/css">
.highcharts-figure, .highcharts-data-table table {
    min-width: 360px;
    max-width: 800px;
    margin: 1em auto;
}

.highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #EBEBEB;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
        font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

                </style>
        </head>
        <body>
<script src="highcharts.js"></script>
<script src="series-label.js"></script>
<script src="exporting.js"></script>
<script src="export-data.js"></script>
<script src="accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
        Tensiones medidas con placa ESP8266
    </p>
</figure>





                <script type="text/javascript">
Highcharts.chart('container', {

    title: {
        text: 'Tensiones'
    },

    subtitle: {
        text: ''
    },

    yAxis: {
        title: {
            text: 'Tensión'
        }
    },

    xAxis: {
        accessibility: {
            rangeDescription: 'Range: 0 to 50'
        }
    },

    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 0
        }
    },

    series: [{
        name: 'Tensiones medidas',
                data: [

                        <?php while($user = mysqli_fetch_array($datos)){

                                         echo "[".$user['tension']."], " ;

                                   }
                                   
                        ?>

                ]

    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
                </script>


	</body>


<meta http-equiv="refresh" content="8" />

</html>



<?php
	$tabladata = $conn->query("SELECT * FROM Tensiones ORDER BY fecha DESC LIMIT 10");
?>



<table border="1px">
    <thead>
       <td style="background-color:#76abdb;"> id </td>
       <td style="background-color:#76abdb;">tension</td>
       <td style="background-color:#76abdb;">fecha</td>
    </thead>
    <tbody>
        <?php while($user = mysqli_fetch_array($tabladata)){ ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['tension']; ?></td>
		<td><?php echo $user['fecha']; ?></td>
            </tr>

        <?php } ?>
    </tbody>
</table>



















