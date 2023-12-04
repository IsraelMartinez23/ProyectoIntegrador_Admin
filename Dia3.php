<?php include ('hit.php');

$csvFile = 'Respuestas.csv';
$csvData = file_get_contents($csvFile);
$rows = str_getcsv($csvData, "\n");
$data = array();


foreach ($rows as $row) {
    $data[] = str_getcsv($row, ",");
}

?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Highcharts Example</title>
		<style type="text/css">
#container {
    height: 400px;
}

.highcharts-figure,
.highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
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

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

	</style>
	</head>
	<body>
<script src="code/highcharts.js"></script>
<script src="code/highcharts-3d.js"></script>
<script src="code/modules/exporting.js"></script>
<script src="code/modules/export-data.js"></script>
<script src="modules/accessibility.js"></script>

<?php
$datos = array(
    array(
        "Marca"=> "Promedio Mujeres",
        "cantidad"=> 19
    ),
    array(
        "Marca"=> "Promedio Hombres",
        "cantidad"=> 20
    ),
    array(
        "Marca"=> "Promedio Estudiantes",
        "cantidad"=> 25
    ),

)
?>


<div id="container"></div>
    
<table class = "table table-dark table-striped">
        <thead>
            <?php for ($i=0;$i<count($data);$i++):
            
            endfor ?>
            <tr>
                <th>Fecha</th>
                <th>Clima</th>
                <th>Hora de salida</th>
                <th>Hora de llegada</th>
                <th>Numero de la unidad</th>
                <th>Marca</th>
                <th>Numero de Mujeres</th>
                <th>Numero de Hombres</th>
                <th>Numero de Estudiantes</th>
                <th>Musica</th>
                <th>Duracion del viaje</th>
                
            </tr>
        </thead>
        <tbody>
            <?php for  ($i=0;$i<count($data);$i++): ?>
                <?php if ($data [$i][0]== "11/11/2023"){ ?>

            <tr>
                <td><?php echo $data[$i][0] ?></td>
                <td><?php echo $data[$i][1] ?></td>
                <td><?php echo $data[$i][2] ?></td>
                <td><?php echo $data[$i][3] ?></td>
                <td><?php echo $data[$i][4] ?></td>
                <td><?php echo $data[$i][5] ?></td>
                <td><?php echo $data[$i][6] ?></td>
                <td><?php echo $data[$i][7] ?></td>
                <td><?php echo $data[$i][8] ?></td>
                <td><?php echo $data[$i][9] ?></td>
                <td><?php echo $data[$i][10] ?></td>
            </tr>
            <?php } endfor ?>
        </tbody>
    </table>


<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },
    title: {
        text: 'Sabado 11 de Noviembre, 2023',
        align: 'left'
    },
    subtitle: {
        text: 'Source: ' +
            '<a href="https://www.counterpointresearch.com/global-smartphone-share/"' +
            'target="_blank">Counterpoint Research</a>',
        align: 'left'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Share',
        data: [
            <?php
            foreach($datos as $dato){
                echo'['."'".$dato['Marca']."'".','. $dato['cantidad'].'],';

            }
            ?>
        ]
    }]
});

		</script>
	</body>
</html>

</script>
<?php include ('rooter.php'); ?>


