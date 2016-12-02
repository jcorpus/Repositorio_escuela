<?php 
require_once("../../core/models/model_conexion.php");
 ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>
        <!--
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        -->
        <script type="text/javascript" src="Highcharts-4.2.6/js/jquery-2.2.3.min.js"></script>
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
            text: 'Fuente: Repositorio',
            x: -20
        },
        xAxis: {
            categories: [ ///categorias
           <?php 
            $db = new Conexion2();
            $sql = $db->query("SELECT p.FechaNacimmiento,p.ApePaterno, year(CURDATE())-YEAR(p.FechaNacimmiento) as edad from persona p INNER JOIN alumno a ON a.idPersona = p.idPersona");
            while ($registros = $db->recorrer($sql))
            {
            ?>
                '<?php echo $registros["ApePaterno"]; ?>',
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
            $db = new Conexion2();
            $result = $db->query("SELECT p.FechaNacimmiento,p.ApePaterno, year(CURDATE())-YEAR(p.FechaNacimmiento) as edad from persona p INNER JOIN alumno a ON a.idPersona = p.idPersona");
            while ($registros = $db->recorrer($result))
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
<script src="grafico_barras/highcharts.js"></script>
<script src="grafico_barras/exporting.js"></script>
<!--
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
-->
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	</body>
</html>
