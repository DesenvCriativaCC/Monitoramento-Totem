<?php $host = "localhost"; // nome do servidor MySQL
$user = "root"; // nome de usuário do MySQL
$senha = ""; // senha do MySQL
$banco = "test"; // nome do banco de dados

// conexão com o banco de dados MySQL usando PDO
try {
    $conexao = new PDO("mysql:host=$host;dbname=$banco", $user, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexão bem sucedida";
} catch (PDOException $e) {
    echo "Não foi possível conectar ao MySQL: " . $e->getMessage();
}

date_default_timezone_set('America/Sao_Paulo');
header("Refresh:60"); //recarrega em 60 segundos

$pegar_ip = $_SERVER["REMOTE_ADDR"]; //SERVER_NAME
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
//echo $hostname;


// $df_c = disk_free_space("C:");
// $df_d = disk_free_space("D:");


//$ip_permitido = "ip_permitido";
$data_Offdow = date('Y-m-d H:i');

$data_inicio_atual = date('Y-m-d');

$data_atual = date('Y-m-d');

/* INICIO - Realiza as informações já atualizadas no BANCO */
// $query = $db->query("SELECT * FROM tbl_totem WHERE status = 1 limit 300");
$query = $conexao->query("SELECT * FROM tbl_totem");
$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
$contar = count($resultado);

$query = $conexao->query("SELECT * FROM tbl_totem where status='1'");
$resultup = $query->fetchAll(PDO::FETCH_ASSOC);
$up = count($resultup);

$query = $conexao->query("SELECT * FROM tbl_totem where status='0'");
$resultdow = $query->fetchAll(PDO::FETCH_ASSOC);
$dow = count($resultdow);


// $chart = $conexao->query("SELECT  id_totem, COUNT(dataDow) as dataDow, COUNT(dataUp) as dataUp FROM datadow WHERE id_totem =  id_totem GROUP BY id_totem");

// $chartDow = $chart->fetchAll(PDO::FETCH_ASSOC);

// foreach($chartDow as $Dow){

//     echo '<br>' .'ID: '. $Dow['id_totem'];
//     echo  ' UP: '. $Dow['dataUp'] . ' ';
//     echo  ' DOW: '. $Dow['dataDow'] . ' ' .'<br>';


//     //echo $teste['id_totem']. '<br>';

// }
// echo'<pre>';
// var_dump($chartDow);
// echo'<pre>';
// exit();

?>

<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="node_modules/img/call2.ico" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/css/piscando.css">
    <!-- fontawesome CSS -->
    <!-- fontawesome CSS -->
    <script src="node_modules/fontawesome/css/font-awesome.css"></script>
    <script src="node_modules/fontawesome/css/font-awesome.min.css"></script>
    <script src="node_modules/fontawesome-free-6.3.0-web/css/font-awesome.css"></script>
    <script src="node_modules/fontawesome-free-6.3.0-web/css/font-awesome.min.css"></script>

    <!-- <script src="node_modules/js/relogio.js"></script> -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="node_modules/js/notify.min.js"></script>



    <title>Verificação do STATUS dos TOTENS</title>
</head>

<div class="container text-light text-center"><?php if($hostname == "D0107.criativacc.datacenter"){
    echo 'Seja Bem Vindo Lee Ewerton' . ' ' . $pegar_ip;
} ?>
</div>

<body class="noturno">

    <br>
    <h5 class="container text-light text-center">Verificação do STATUS dos TOTENS BELÉM</h5>

    <div class="container col-12 text-center">

        <?php

        // Recebe os dados do Formulario;
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        ?>

        <div class="container col-12">

            <!-- Incio Fomulario -->
            <form id="form" class="form-row" method="POST" action="">
                <div class="form-row">
                    <?php
                    $data_inicio_atual =  date('Y-m-d');
                    if (isset($dados['data_inicio'])) {
                        $data_inicio_atual = $dados['data_inicio'];
                    } ?>

                    <div class="col">
                        <!-- <label class="input-group-text" title="Data Inicio"><strong>Data Incio</strong></label> -->
                        <input type="date" name="data_inicio" value="<?php echo $data_inicio_atual ?>" class="form-control form-control-sm" required="required">
                        <!-- <div class="col"> -->
                    </div>
                    <br>

                    <!-- </div> -->
                    <!-- <div class="col"> -->
                    <?php
                    //$data_atual =  date('Y-m-d');
                    if (isset($dados['data_fim'])) {
                        $data_atual = $dados['data_fim'];
                        if ($data_atual > date('Y-m-d') OR $data_atual < $data_inicio_atual) { ?>
                            <script>
                                alert('Operação invalida !!');
                            </script>
                    <?php
                            header("Refresh:0");
                            die();
                        }
                    }
                    ?>
                    <div class="col">
                        <!-- <label class="input-group-text" title="Data Final"><strong>Data Final</strong></label>     -->
                        <input type="date" name="data_fim" value="<?php echo $data_atual ?>" class="form-control form-control-sm" required="required">
                    </div>
                    <div class="col">
                        <button class="btn btn-primary btn-sm" onclick="bootstrapAlert()" type="submit" value="Pesquisar" name="PesqEntreData">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                            Pesquisar</button>
                    </div>
            </form>
            <!-- Final Fomulario-->
        </div>
        <br>

        <script type="text/javascript">
            //visualizar graficos
            google.charts.load('current', {'packages': ['bar'] });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['IP', 'UP', 'DOW'],
                    <?php
                    if (!empty($dados['PesqEntreData'])) {

                        if (($data_inicio_atual == $data_inicio_atual) && ($data_atual == $data_atual)) {
                            //$chartUp = $conexao->query("SELECT id_totem, COUNT(dataDow) as dataDow, COUNT(dataUp) as dataUp FROM datadow WHERE id_totem = id_totem GROUP BY id_totem");
                            $chartUp = $conexao->query("SELECT  id_totem, COUNT(dataDow) as dataDow, COUNT(dataUp) as dataUp FROM datadow WHERE id_totem =  id_totem 
                            and dataDow BETWEEN '$data_inicio_atual 07:00:00' AND '$data_atual 20:00:00'
                            OR dataUP BETWEEN '$data_inicio_atual 07:00:00' AND '$data_atual 20:00:00'
                            GROUP BY id_totem
                            ORDER BY id_totem DESC");
                            $chartUP = $chartUp->fetchAll(PDO::FETCH_ASSOC);
                            //var_dump($chartDow );
                            //$contar = count($chartDow);
                        }
                    }

                    //$chartUp = $conexao->query("SELECT id_totem, COUNT(dataDow) as dataDow, COUNT(dataUp) as dataUp FROM datadow WHERE id_totem = id_totem GROUP BY id_totem");
                    $chartUp = $conexao->query("SELECT  id_totem, COUNT(dataDow) as dataDow, COUNT(dataUp) as dataUp FROM datadow WHERE id_totem =  id_totem 
                    and dataDow BETWEEN '$data_inicio_atual 07:00:00' AND '$data_atual 20:00:00'
                    OR dataUP BETWEEN '$data_inicio_atual 07:00:00' AND '$data_atual 20:00:00'
                    GROUP BY id_totem
                    ORDER BY id_totem DESC");
                    $chartUP = $chartUp->fetchAll(PDO::FETCH_ASSOC);
                    //var_dump($chartDow );
                    //$contar = count($chartDow);

                    foreach ($chartUP as $dados) {
                        $chartIdTotem = $dados['id_totem'];
                        $char_DOW = $dados['dataDow'];
                        $char_UP = $dados['dataUp'];

                    ?>['<?php echo $chartIdTotem ?>', <?php echo $char_UP ?>, <?php echo $char_DOW ?>],
                    <?php } ?>
                ]);

                var options = {
                    backgroundColor: 'transparent',
                    colors: ['#2E8B57', '#FF0000'],

                    chartArea: {
                        backgroundColor: '',
                    },

                    chart: {
                        // title: 'Incidências TOTENS - <?php echo $data_inicio_atual . ' | ' . $data_atual ?>',
                        subtitle: 'Incidências TOTENS <?php echo $data_inicio_atual . ' | ' . $data_atual ?>',
                    }
                };
                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
                chart.draw(data, google.charts.Bar.convertOptions(options));
            }
        </script>

        <!-- Inicio Graficos google Charts-->
        <div class="container col-12" id="columnchart_material" style="width: 1600px; height: 300px;"></div>
        <!-- FIM Graficos google Charts-->
        <br>

        <div class="row">
            <div class="container col-3 text-center">
                <ul class="list-group">
                    <li class="shadow-lg p-3 mb-5 rounded list-group-item d-flex justify-content-between align-items-center text-white bg-dark">
                        TOTENS UP.
                        <span class="badge badge-success badge-pill"><?php echo $up; ?></span>
                    </li>
                </ul>
                <?php if ($up >= '1') { ?>
                    <div class="underline"><span></span></div>
                <?php } ?>

            </div>

            <div class="container col-3 text-center">
                <ul class="list-group">
                    <li class="shadow-lg p-3 mb-5 rounded list-group-item d-flex justify-content-between align-items-center text-white bg-dark">
                        TOTENS via protocolo ICMP
                        <span class="badge badge-primary badge-pill"><?php echo $contar; ?></span>
                    </li>
                </ul>
                <div class="underline"><span></span></div>
            </div>

            <div class="container col-3 text-center">
                <ul class="list-group">
                    <li class="shadow-lg p-3 mb-5 rounded list-group-item d-flex justify-content-between align-items-center text-white bg-dark">
                        TOTENS com falha de ping.
                        <span class="badge badge-danger badge-pill"><?php echo $dow; ?></span>
                    </li>
                </ul>
                <div class="underline"><span></span></div>
            </div>
        </div>
    </div>

    <div class="container col-12">

    <!-- inicio coluna 02-->
    <div class="col-12">
        <table class="table table-dark table-sm table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col">IP</th>
                    <th scope="col">Localidade</th>
                    <th scope="col">DATA DO EVENTO</th>
                    <th scope="col">HORA DA RECUPERAÇÃO</th>
                    <th class="text-center" scope="col">STATUS</th>
                    <th scope="col">PREVENTIVA REALIZADA</th>
                    <th class="text-center" scope="col">VISUALIZAR</th>
                </tr>
            </thead>


            <?php foreach ($resultado as $totem) { ?>

                <!--?php if ($totem["status"] == 0) { ?-->

                    <tr>
                        <?php if (strpos($totem["totem"], 'PGM') !== false) { ?>
                            <!--?php if(strpos($iplist[$item][1],'PGM') !== false){?-->
                            <td class="text-left">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-2-back-fill" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5H0V4zm11.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zM0 11v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1H0z" />
                                </svg>
                                <?php
                                echo $totem["ip_totem"] ?>
                                <!--?php echo $iplist[$item][0] ?-->
                            </td>

                        <?php } else { ?>
                            <td class="text-left">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16">
                                    <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                                </svg>

                                <?php echo $totem["ip_totem"] ?>
                            <?php } ?>

                            <td class="text-left"><?php $totem["totem"];
                                $length = strpos($totem["totem"], "-");
                                $resultTotem = substr($totem["totem"], 0, $length);
                                echo $resultTotem;
                                ?></td>

                            <td class="text-center">
                                <?php
                                //$nullEvento = $totem["data_Off"];

                                $data_inicio = new DateTime($totem["data_Off"]);
                                //var_dump( $data_inicio);
                                $data_fim = new DateTime($data_Offdow);

                                $dateInterval = $data_inicio->diff($data_fim);
                                $dateIntervalAux =  $dateInterval->days;
                                //var_dump($dateInterval);
                                //echo $dateInterval;
                                //echo $dateIntervalAux;
                                if($totem["data_Off"]  == '0000-00-00 00:00:00'){
                                    
                                    echo ' - ';

                                }elseif ($dateIntervalAux  > '3') { ?>
                                    <div class="btn-pisca text-danger" title="Incidência a mais de TRÊS dias."><strong> <?php echo $totem["data_Off"] . ' - ' . $dateIntervalAux . ' Dias.' ?></strong></div>
                                    <!-- <a class="btn btn-primary" href="https://omni.criativacc.app/web#menu_id=211&cids=1&action=319&active_id=1&model=helpdesk.ticket&view_type=kanban" target="_blank" role="button">Link</a> </div> -->

                                <?php } else {
                                    echo  $totem["data_Off"];
                                } ?>
                            </td>
                            
                            <td>
                                <?php
                                if($totem["status"]  == 1){
                                    echo '<strong class="text-success">' . $totem["data_ON"] . '</strong>';
                          
                                }else{
                                    echo ' - ';
                                }
                                
                                ?>
                            </td>
                            
                            <?php $id_totem = $totem["id_totem"]; ?>

                            <td>
                            <?php if ($totem["status"] == 0) { ?>
                                <strong class="text-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="15" height="15" fill="currentColor"><!--! Font Awesome Pro 6.4.0 by @fontawesome -->
                                        <path d="M2 334.5c-3.8 8.8-2 19 4.6 26l136 144c4.5 4.8 10.8 7.5 17.4 7.5s12.9-2.7 17.4-7.5l136-144c6.6-7 8.4-17.2 4.6-26s-12.5-14.5-22-14.5l-72 0 0-288c0-17.7-14.3-32-32-32L128 0C110.3 0 96 14.3 96 32l0 288-72 0c-9.6 0-18.2 5.7-22 14.5z" />
                                    </svg>
                                </strong>
                            <?php } else {?>
                                <strong class="text-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="15" height="15" fill="currentColor"><!--! Font Awesome Pro 6.4.0 by @fontawesome -->
                                        <path d="M318 177.5c3.8-8.8 2-19-4.6-26l-136-144C172.9 2.7 166.6 0 160 0s-12.9 2.7-17.4 7.5l-136 144c-6.6 7-8.4 17.2-4.6 26S14.4 192 24 192H96l0 288c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32l0-288h72c9.6 0 18.2-5.7 22-14.5z"/>
                                    </svg>
                                </strong>
                            <?php } ?>
                            </td>
                            
                            <td>
                            <?php 
                            

                            $query = $conexao->query("SELECT p.dataProxPreventiva
                            FROM tbl_totem AS t
                            INNER JOIN tbl_ptotem AS p
                            ON t.id_totem = p.id_totem
                            WHERE p.id_totem = $id_totem");
                            $pTotem = $query->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($pTotem as $totens) {
                                echo  $totens['dataProxPreventiva'];
                                //echo date("d-m-Y  H:i:s", $totens['dataProxPreventiva']);
                                // $meses = array(1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril", 5 => "Maio", 6 => "Junho", 7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro");
                                // $mes_nome = date('n', strtotime($totens['dataProxPreventiva']));
                                // echo $meses[$mes_nome];
                                ?>
                                <strong class="text-success"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="15" height="15" fill="currentColor"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path d="M342.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 178.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l80 80c12.5 12.5 32.8 12.5 45.3 0l160-160zm96 128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 402.7 54.6 297.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l256-256z"/>
                                </svg>
                              

                           <?php } ?>

                            </td>

                            <td>
                            <?php echo $id_totem;?>
                                <button class="btn btn-outline-info btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg<?php echo $totem["id_totem"]; ?>">
                                    <strong>Abrir</strong>
                                </button>

                                <!-- Modal coluna 02-->
                                <div class="modal fade bd-example-modal-lg<?php echo $totem["id_totem"]; ?>" tabindex="-1" role="dialog" aria-labelledby="carTotemModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-dark" id="bd-example-modal-lg<?php echo $totem["id_totem"]; ?>">Totem Bélem</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-dark text-left">
                                                <div class="alert alert-secondary" role="alert">
                                                    <?php
                                                    echo '<strong>IP: </strong>'     . $totem["ip_totem"]    . '<br>';
                                                    echo '<strong>LOCALIDADE: </strong>'   . $totem["totem"] . '<br>';
                                                    ?>
                                                </div>

                                                <div class="row text-center">

                                                    <div class="col-6 ml-auto">
                                                        <div class="alert alert-danger" role="alert"><strong>DATAS FALHA DE PING</strong></div>

                                                        <?php

                                                        $query2 = $conexao->query("SELECT * FROM datadow WHERE id_totem = $id_totem AND dataDow IS NOT NULL ORDER BY dataDow DESC");
                                                        $rest_datadow = $query2->fetchAll(PDO::FETCH_ASSOC);

                                                        foreach ($rest_datadow as $totens) {
                                                           
                                                            echo "<strong>" . $totens['dataDow'] . "</strong>" . '<br>';
                                                        } ?>

                                                    </div>

                                                    <div class="col-6 ml-auto">
                                                        <div class="alert alert-success" role="alert"><strong>HORA DA RECUPERAÇÃO</strong></div>

                                                        <?php
                                                        //echo '------' . '<br>';

                                                        $query2 = $conexao->query("SELECT * FROM datadow WHERE id_totem = $id_totem AND dataUP IS NOT NULL ORDER BY dataUP DESC");
                                                        $rest_datadow = $query2->fetchAll(PDO::FETCH_ASSOC);

                                                        foreach ($rest_datadow as $totens) {
                                                            echo '<strong>' . $totens['dataUp'] . '<br> </strong>';
                                                        } ?>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="modal-footer text-dark text-left">&copy;Criativa 2023 | Suporte e Monitoramento
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="40" height="40" fill="#000">
                                                    <path d="M384 96V320H64L64 96H384zM64 32C28.7 32 0 60.7 0 96V320c0 35.3 28.7 64 64 64H181.3l-10.7 32H96c-17.7 0-32 14.3-32 32s14.3 32 32 32H352c17.7 0 32-14.3 32-32s-14.3-32-32-32H277.3l-10.7-32H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm464 0c-26.5 0-48 21.5-48 48V432c0 26.5 21.5 48 48 48h64c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48H528zm16 64h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H544c-8.8 0-16-7.2-16-16s7.2-16 16-16zm-16 80c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H544c-8.8 0-16-7.2-16-16zm32 160a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                                </svg>
                                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
    </div>
    <!-- FIM Modal coluna 02-->

    </td>
   
    </tr>
<!--?php } ?-->

<?php } ?>
</table>

    </div>
    <div>
        <footer class="footer">&copy;Criativa 2023 | Suporte e Monitoramento
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="40" height="40" fill="#FFF">
                <path d="M384 96V320H64L64 96H384zM64 32C28.7 32 0 60.7 0 96V320c0 35.3 28.7 64 64 64H181.3l-10.7 32H96c-17.7 0-32 14.3-32 32s14.3 32 32 32H352c17.7 0 32-14.3 32-32s-14.3-32-32-32H277.3l-10.7-32H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm464 0c-26.5 0-48 21.5-48 48V432c0 26.5 21.5 48 48 48h64c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48H528zm16 64h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H544c-8.8 0-16-7.2-16-16s7.2-16 16-16zm-16 80c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H544c-8.8 0-16-7.2-16-16zm32 160a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
            </svg>
        </footer>
    </div>