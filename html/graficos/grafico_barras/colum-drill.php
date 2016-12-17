<?php 
require('../../../core/models/model_conexion.php');

 ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="jquery-1.8.2.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    // Create the chart
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Tesis Registradas por Filiales'
        },
        subtitle: {
            text: 'Fuente Repositorio Institucional'
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Número de Tesis'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.1f}%'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },

        series: [{
            name: 'Filial',
            colorByPoint: true,
          data: [
							<?php 
							 $db = new Conexion2();
							 $sql = $db->query("SELECT DesFilial FROM filial");
							 while ($registros = $db->recorrer($sql))
							 {
							 ?>
						 		{
									name: '<?php echo $registros["DesFilial"]; ?>',
									y: 16.33
								},
							 <?php
						 	}
							 ?>
							 
						
						]
        }],
        drilldown: {
            series: [{
                name: 'Microsoft Internet Explorer',
                id: 'Microsoft Internet Explorer',
                data: [
                    [
                        'v11.0',
                        24.13
                    ],
                    [
                        'v8.0',
                        17.2
                    ],
                    [
                        'v7.0',
                        0.5
                    ]
                ]
            },  {
                name: 'Opera',
                id: 'Opera',
                data: [
                    [
                        'v12.x',
                        0.34
                    ],
                    [
                        'v28',
                        0.24
                    ],
                    [
                        'v27',
                        0.17
                    ],
                    [
                        'v29',
                        0.16
                    ]
                ]
            }]
        }
    });
});
		</script>
	</head>
	<body>
<script src="highcharts.js"></script>
<script src="data.js"></script>
<script src="drilldown.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	</body>
</html>
