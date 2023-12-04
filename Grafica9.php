
<?php include ('hit.php');

$csvFile = 'Respuestas.csv';
$csvData = file_get_contents($csvFile);
$rows = str_getcsv($csvData, "\n");
$data = array();


foreach ($rows as $row) {
    $data[] = str_getcsv($row, ",");
}

?>


<script src="code/highcharts.js"></script>
<script src="code/modules/data.js"></script>
<script src="code/modules/exporting.js"></script>
<script src="code/modules/export-data.js"></script>
<script src="code/modules/accessibility.js"></script>


<figure class="highcharts-figure">
<div id="container"></div>
</figure>


       <table id="datatable">

        <thead> 
        <?php for ($i=0;$i<count($data);$i++):
         endfor ?>
            <tr>
                <th></th>
                <th>Mujeres</th>
                <th>Hombres</th>
                <th>Estudiantes</th>
            </tr>
        </thead>


        <tbody>
            <?php for  ($i=0;$i<count($data);$i++): ?>
                <?php if ($data [$i][0]== "24/11/2023"){ ?>

            <tr>
                <th><?php echo $data[$i][2] ?> </th>
                <td><?php echo $data[$i][6] ?></td>
                <td><?php echo $data[$i][7] ?></td>
                <td><?php echo $data[$i][8] ?></td>
            </tr>

            <?php } endfor ?>
        </tbody>
    </table>


    <script type="text/javascript">
    Highcharts.chart('container', {
    data: {
        table: 'datatable'
    },
    chart: {
        type: 'column'
    },
    title: {
        text: 'Viernes 24 Noviembre, 2023'
    },
    subtitle: {
        text:
            'Source: <a href="https://www.ssb.no/en/statbank/table/04231" target="_blank">SSB</a>'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        allowDecimals: false,
        title: {
            text: 'Amount'
        }
    }
});

</script>
<?php include ('rooter.php'); ?>