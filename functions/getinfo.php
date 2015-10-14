<html>
<head>
    <title>
        Franchise Dashboard
    </title>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>

</head>
<body class="form"><center>
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: brotherfuryan
 * Date: 10/9/15
 * Time: 11:57 AM
 * To change this template use File | Settings | File Templates.
 */
include "checklogin.php";

$applicationID = $_POST['email'];
$applicationKey = $_POST['password'];

$allowed = array("diego.alves@vtex.com.br", "usuario@vtex.com.br");

if($_POST['utm']==""){
    exit("Favor preencher a utm_source");
}

if(in_array($_POST['email'], $allowed)){

    echo '<div id="donutchart" style="width: 800px; height: 300px;"></div>';

    echo '<div id="table_div" style="width: 700px; height: 300px;"></div>';

    $data_inicio = $_POST['data-inicio'];
    $datas_inicio = explode("-", $data_inicio);
    $data_fim = $_POST['data-fim'];
    $datas_fim = explode("-", $data_fim);

    $dia_inicio = $datas_inicio[2];
    $mes_inicio = $datas_inicio[1];
    $ano_incio = $datas_inicio[0];

    $dia_fim = $datas_fim[2];
    $dia_fim = $dia_fim+1;
    $mes_fim = $datas_fim[1];
    $ano_fim = $datas_fim[0];

    $accountname = $_POST['accountname'];
    $utm = $_POST['utm'];


    $url = 'http://'.$accountname.'.vtexcommercestable.com.br/api/oms/pvt/orders/?f_UtmSource='.$utm.'&f_creationDate=creationDate:%5B'.$ano_incio.'-'.$mes_inicio.'-'.$dia_inicio.'T03:00:00.000Z+TO+'.$ano_fim.'-'.$mes_fim.'-'.$dia_fim.'T02:59:59.999Z%5D';

    $headers = array(
        'http' => array(
            'method' => "GET",
            'header' => "X-VTEX-API-AppKey: " . $applicationID . "\r\n" .
                "X-VTEX-API-AppToken: " . $applicationKey . "\r\n" .
                "DecibelTimestamp: " . date('Ymd H:i:s', time()) . "\r\n"
        )
    );

    $context = stream_context_create($headers);

    $response = file_get_contents($url, false, $context);

    $datareceived = json_decode($response);

    echo "<script type='text/javascript'>google.load('visualization', '1', {packages:['corechart']});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Value'],
            ";

        foreach ($datareceived->list as &$item) {
                   echo "['".$item->clientName."', ".$item->totalValue."],";
        }

        $dia_fim = $dia_fim-1;
        echo "
        ]);

        var options = {
            title: 'UTM: ".$utm." - período de: ".$dia_inicio."/".$mes_inicio."/".$ano_incio." a ".$dia_fim."/".$mes_fim."/".$ano_fim." - Total em vendas: R$".substr_replace($datareceived->stats->stats->totalValue->Sum,',',-2,0) ."',
            pieHole: 0.4
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
        }</script>";


       echo" <script type='text/javascript'>
          google.load('visualization', '1.1', {packages:['table']});
          google.setOnLoadCallback(drawTable);

          function drawTable() {
              var data = new google.visualization.DataTable();
              data.addColumn('string', 'Numero pedido');
              data.addColumn('string', 'Data');
              data.addColumn('string', 'Nome do cliente');
              data.addColumn('number', 'Total pedido');
              data.addColumn('string', 'Status');
            data.addRows([
            ";

            foreach ($datareceived->list as &$item) {
                echo "['".$item->orderId."','".substr($item->creationDate, 0, -17)."','".$item->clientName."', {v:". $item->totalValue.", f: 'R$".substr_replace($item->totalValue,',',-2,0)."'},'".$item->status."'],";
            }
            echo "['','','Soma dos pedidos', {v:". $item->totalValue.", f: 'R$".substr_replace($datareceived->stats->stats->totalValue->Sum,',',-2,0)."'},''],";
            echo "
            ]);

            var table = new google.visualization.Table(document.getElementById('table_div'));

            table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
          }
        </script>";

}else{
    echo "Não encontramos registro para seu email e senha.";
}