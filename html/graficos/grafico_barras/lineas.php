<?php 
#require_once("../../Model/conexion.php");
require_once("conexion2.php");
 ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>
        <!--
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        -->
        <script type="text/javascript" src="../Highcharts-4.2.6/js/jquery-2.2.3.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        title: {
            text: 'Edad de alumnos segun genero',
            x: -20 //center
        },
        subtitle: {
            text: 'Source: WorldClimate.com',
            x: -20
        },
        xAxis: {
            categories: [ ///categorias
           <?php 
            $sql = "SELECT * FROM matricula";
            $result = mysqli_query($connection,$sql);
            while ($registros = mysqli_fetch_array($result))
            {
            ?>
                '<?php echo $registros["grado_alumno"]; ?>',
            <?php
            }
            ?>
            ]
        },
        yAxis: {
            title: {
                text: 'Edad de Alumnos'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '°C'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Edad',
            data: [ ///cantidad
               <?php 
            $sql = "SELECT * FROM persona";
            $result = mysqli_query($connection,$sql);
            while ($registros = mysqli_fetch_array($result))
            {
            ?>
                <?php echo $registros["edad"] ?>,
            <?php
            }
            ?>
            ]
        }]
    });
});
		</script>
	</head>
	<body>
<script src="highcharts.js"></script>
<script src="exporting.js"></script>
<!--
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
-->
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	</body>
</html>
