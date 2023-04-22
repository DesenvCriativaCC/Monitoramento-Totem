<?php
include_once('conn\conn.php');
include_once('querysql\query.php');

date_default_timezone_set('America/Sao_Paulo');


$pegar_ip = $_SERVER["REMOTE_ADDR"]; //SERVER_NAME
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);

  # Incio Gravar Log Erro       
    $fp2 = fopen("./log_Acesso/ERR_".date("d-m-Y").".txt", "a+");
    $txt = "\n".date("d/m/Y - H:i:s")."  \t\t". $pegar_ip." \t\t". $hostname;
    fwrite($fp2, $txt);

    fclose($fp2); 
  # Final Gravar Log Erro     
    header("Refresh:60"); //recarrega em 60 segundos  

$data_Offdow = date('Y-m-d H:i');
$data_inicio_atual = date('Y-m-d');
$data_atual = date('Y-m-d');

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

<div class="container text-light text-center"><?php if ($hostname == "D0107.criativacc.datacenter") {
                                                    echo 'Seja Bem Vindo Lee Ewerton' . ' ' . $pegar_ip;
                                                } ?>
</div>

<body class="noturno">

    <br>
    <h5 class="container text-light text-center">Verificação do STATUS dos TOTENS BELÉM</h5>

    <div class="container col-12 text-center">


        <div class="container col-12">
            <!-- Incio Fomulario -->
            <?php include_once('form\form.php') ?>
            <!-- Final Fomulario-->
        </div>
        <br>

        <!-- Inicio Graficos google Charts-->
        <?php include_once('charts\charts.php') ?>
        <div class="container col-12" id="columnchart_material" style="width: 1600px; height: 300px;"></div>
        <!-- FIM Graficos google Charts-->
        <br>
        <?php include_once('indicadores\indicadores.php'); ?>

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
                        <th scope="col">PROXIMA PREVENTIVA</th>
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
                                if ($totem["data_Off"]  == '0000-00-00 00:00:00') {

                                    echo ' - ';
                                } elseif ($dateIntervalAux  > '3') { ?>
                                    <div class="btn-pisca text-danger" title="Incidência a mais de TRÊS dias."><strong> <?php echo $totem["data_Off"] . ' - ' . $dateIntervalAux . ' Dias.' ?></strong></div>
                                    <!-- <a class="btn btn-primary" href="https://omni.criativacc.app/web#menu_id=211&cids=1&action=319&active_id=1&model=helpdesk.ticket&view_type=kanban" target="_blank" role="button">Link</a> </div> -->

                                <?php } else {
                                    echo  $totem["data_Off"];
                                } ?>
                            </td>

                            <td>
                                <?php
                                if ($totem["status"]  == 1) {
                                    echo '<strong class="text-success">' . $totem["data_ON"] . '</strong>';
                                } else {
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
                                <?php } else { ?>
                                    <strong class="text-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="15" height="15" fill="currentColor"><!--! Font Awesome Pro 6.4.0 by @fontawesome -->
                                            <path d="M318 177.5c3.8-8.8 2-19-4.6-26l-136-144C172.9 2.7 166.6 0 160 0s-12.9 2.7-17.4 7.5l-136 144c-6.6 7-8.4 17.2-4.6 26S14.4 192 24 192H96l0 288c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32l0-288h72c9.6 0 18.2-5.7 22-14.5z" />
                                        </svg>
                                    </strong>
                                <?php } ?>
                            </td>

                            <td>
                                <?php

                                $query = $conexao->query("SELECT p.id_totem, p.dataProxPreventiva
                                FROM tbl_totem AS t
                                INNER JOIN tbl_ptotem AS p
                                ON t.id_totem = p.id_totem
                                WHERE p.id_totem = $id_totem");
                                $pTotem = $query->fetchAll(PDO::FETCH_ASSOC);

                                
                                foreach ($pTotem as $totens) {

                                    if($totens["id_totem"] == 1 OR $totens["id_totem"] == 2){
                                        echo  $totens['dataProxPreventiva'];
                                        $proximaPreventiva = date('d-m-Y  H:i:s', strtotime('+10 months', strtotime(date($totens['dataProxPreventiva'])))); ?>

                                        <strong class="text-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="15" height="15" fill="currentColor"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <path d="M342.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 178.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l80 80c12.5 12.5 32.8 12.5 45.3 0l160-160zm96 128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 402.7 54.6 297.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l256-256z" />
                                        </svg>
                                        </strong> 

                                    <?PHP }

                                    if($totens["id_totem"] >= 3 AND $totens["id_totem"] <= 6){
                                        echo  $totens['dataProxPreventiva'];
                                        $proximaPreventiva = date('d-m-Y  H:i:s', strtotime('+8 months', strtotime(date($totens['dataProxPreventiva'])))); ?>

                                        <strong class="text-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="15" height="15" fill="currentColor"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <path d="M342.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 178.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l80 80c12.5 12.5 32.8 12.5 45.3 0l160-160zm96 128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 402.7 54.6 297.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l256-256z" />
                                        </svg>
                                        </strong> 

                                    <?PHP }

                                    if($totens["id_totem"] == 7 ){
                                        echo  $totens['dataProxPreventiva'];
                                        $proximaPreventiva = date('d-m-Y  H:i:s', strtotime('+6 months', strtotime(date($totens['dataProxPreventiva'])))); ?>

                                        <strong class="text-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="15" height="15" fill="currentColor"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <path d="M342.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 178.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l80 80c12.5 12.5 32.8 12.5 45.3 0l160-160zm96 128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 402.7 54.6 297.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l256-256z" />
                                        </svg>
                                        </strong> 

                                    <?PHP } 

                                    if($totens["id_totem"] >= 8 AND $totens["id_totem"] <= 17){ 
                                        echo  $totens['dataProxPreventiva'];
                                        $proximaPreventiva = date('d-m-Y  H:i:s', strtotime('+8 months', strtotime(date($totens['dataProxPreventiva'])))); ?>

                                        <strong class="text-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="15" height="15" fill="currentColor"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <path d="M342.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 178.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l80 80c12.5 12.5 32.8 12.5 45.3 0l160-160zm96 128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 402.7 54.6 297.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l256-256z" />
                                        </svg>
                                        </strong> 

                                    <?PHP }

                                    if($totens["id_totem"] >= 18 AND $totens["id_totem"] <= 23 ){
                                        echo  $totens['dataProxPreventiva'];
                                        $proximaPreventiva = date('d-m-Y  H:i:s', strtotime('+10 months', strtotime(date($totens['dataProxPreventiva'])))); ?>

                                        <strong class="text-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="15" height="15" fill="currentColor"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <path d="M342.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 178.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l80 80c12.5 12.5 32.8 12.5 45.3 0l160-160zm96 128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 402.7 54.6 297.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l256-256z" />
                                        </svg>
                                        </strong> 
                                    <?php } 

                                    if($totens["id_totem"] == 24 ){

                                        echo  $totens['dataProxPreventiva'];
                                        $proximaPreventiva = date('d-m-Y', strtotime('+1 months', strtotime(date($totens['dataProxPreventiva'])))); 

                                        ?>

                                        <strong class="text-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="15" height="15" fill="currentColor"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <path d="M342.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 178.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l80 80c12.5 12.5 32.8 12.5 45.3 0l160-160zm96 128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 402.7 54.6 297.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l256-256z" />
                                        </svg>
                                        </strong> 
                                    <?php } ?> 

                                <?php } ?>

                            </td>

                            <td  class="text-left">
                                <?php 
                                    $proximaPreventiva;
                                   
                                    //echo date("d-m-Y  H:i:s", $totens['dataProxPreventiva']);
                                    $meses = array(1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril", 5 => "Maio", 6 => "Junho", 7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro");
                                    $mes_nome = date('n', strtotime($proximaPreventiva));

                                    $atual = date('n', strtotime('NOW'));

                                    //echo $atual;
                                    if ($atual == $mes_nome){?>
                                        <strong  class="text-left" title="Realizar Preventiva."><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20" height="20" fill="#FFD700"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <path d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480H40c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24V296c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/>
                                        </svg></strong>
                                   <?php } else { ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="16" height="16" fill="#32CD32"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/>
                                    </svg>
                                  <?php }
                                    
                                    echo ' ' . $meses[$mes_nome];
                                    
                                    ?>
                            </td>

                            <td>
                                
                                <button class="btn btn-outline-info btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg<?php echo $totem["id_totem"]; ?>">
                                <?php echo $id_totem; ?>
                                    <strong>Abrir</strong>
                                </button>

                                <!-- Modal coluna 01-->
                                <div class="modal fade bd-example-modal-lg<?php echo $totem["id_totem"]; ?>" tabindex="-1" role="dialog" aria-labelledby="carTotemModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content ">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-dark" id="bd-example-modal-lg<?php echo $totem["id_totem"]; ?>">Totem Bélem</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="alert alert-secondary text-left" role="alert">
                                                
                                                
                                                 <strong>IP: </strong><?php echo $totem["ip_totem"]  ?> <br>
                                                 <strong>LOCALIDADE: </strong><?php echo $totem["totem"] ?> <br>
                                              
                                            </div>
                                            <div class="modal-body text-dark text-left">


                                                <ul class="nav nav-tabs" id="myTab<?php echo $totem["id_totem"]; ?>" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home<?php echo $totem["id_totem"]; ?>" role="tab" aria-controls="home" aria-selected="true">
                                                        Eventos DOW 
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="15" height="15" fill="#FF0000"><!--! Font Awesome Pro 6.4.0 by @fontawesome -->
                                                            <path d="M2 334.5c-3.8 8.8-2 19 4.6 26l136 144c4.5 4.8 10.8 7.5 17.4 7.5s12.9-2.7 17.4-7.5l136-144c6.6-7 8.4-17.2 4.6-26s-12.5-14.5-22-14.5l-72 0 0-288c0-17.7-14.3-32-32-32L128 0C110.3 0 96 14.3 96 32l0 288-72 0c-9.6 0-18.2 5.7-22 14.5z" />
                                                        </svg>
                                                         - UP 
                                                         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="15" height="15" fill="#32CD32"><!--! Font Awesome Pro 6.4.0 by @fontawesome -->
                                                            <path d="M318 177.5c3.8-8.8 2-19-4.6-26l-136-144C172.9 2.7 166.6 0 160 0s-12.9 2.7-17.4 7.5l-136 144c-6.6 7-8.4 17.2-4.6 26S14.4 192 24 192H96l0 288c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32l0-288h72c9.6 0 18.2-5.7 22-14.5z" />
                                                        </svg>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link " id="profile-tab" data-toggle="tab" href="#perfil<?php echo $totem["id_totem"]; ?>" role="tab" aria-controls="profile" aria-selected="false">
                                                        Preventivas 
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20" height="20" fill="#4682B4"><!--! Font Awesome Pro 6.4.0 by @fontawesome -->
                                                            <path d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z"/>
                                                        </svg>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <br>
                                                <div class="tab-content" id="myTab<?php echo $totem["id_totem"]; ?>Content">

                                                    <div class="tab-pane fade show active" id="home<?php echo $totem["id_totem"]; ?>" role="tabpanel" aria-labelledby="home-tab">

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

                                                    <div class="tab-pane fade" id="perfil<?php echo $totem["id_totem"]; ?>" role="tabpanel" aria-labelledby="profile-tab">
                                                        <div class="row text-center">
                                                            <div class="col-6 ml-auto">
                                                            <?php
                                                                $query = $conexao->query("SELECT p.dataPreventiva, p.dataProxPreventiva
                                                                FROM tbl_totem AS t
                                                                INNER JOIN tbl_ptotem AS p
                                                                ON t.id_totem = p.id_totem
                                                                WHERE p.id_totem = $id_totem");
                                                                $pTotem = $query->fetchAll(PDO::FETCH_ASSOC);

                                                                foreach ($pTotem as $totens) { ?>
                                                                    
                                                                    <strong>Preventiva Realizada: </strong> <br>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="25" height="25"><!--! Font Awesome Pro 6.4.0 by @fontawesome -->
                                                                        <path d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H64C28.7 64 0 92.7 0 128v16 48V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192 144 128c0-35.3-28.7-64-64-64H344V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H152V24zM48 192h80v56H48V192zm0 104h80v64H48V296zm128 0h96v64H176V296zm144 0h80v64H320V296zm80-48H320V192h80v56zm0 160v40c0 8.8-7.2 16-16 16H320V408h80zm-128 0v56H176V408h96zm-144 0v56H64c-8.8 0-16-7.2-16-16V408h80zM272 248H176V192h96v56z"/>
                                                                    </svg>
                                                                    <?php echo $totens['dataProxPreventiva'] ?>
                                                                    <br><br>
                                                                    <strong>Preventiva Anterior: </strong> <br>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="25" height="25"><!--! Font Awesome Pro 6.4.0 by @fontawesome -->
                                                                        <path d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H64C28.7 64 0 92.7 0 128v16 48V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192 144 128c0-35.3-28.7-64-64-64H344V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H152V24zM48 192h80v56H48V192zm0 104h80v64H48V296zm128 0h96v64H176V296zm144 0h80v64H320V296zm80-48H320V192h80v56zm0 160v40c0 8.8-7.2 16-16 16H320V408h80zm-128 0v56H176V408h96zm-144 0v56H64c-8.8 0-16-7.2-16-16V408h80zM272 248H176V192h96v56z"/>
                                                                    </svg>
                                                                    <?php echo $totens['dataPreventiva'] ?>
                                                                
                                                            <?php }  ?>
                                                            </div>

                                                            <div class="col-6 ml-auto">
                                                                
                                                                <?php 
                                                                    // Recebe os dados do Formulario;
                                                                    //$dadosPreventiva = filter_input_array(INPUT_POST, FILTER_DEFAULT)
                                                                    ?>
                                                                    <!-- Incio Fomulario -->
                                                                    <form id="form" class="form-row" method="POST" action="proc_cad.php">
                                                                        <div class="form-group col-12">

                                                                            <!-- </div> -->
                                                                            <!-- <div class="col"> -->
                                                                            <?php
                                                                            //$data_atual =  date('Y-m-d');
                                                                            if (isset($dadosPreventiva['data_Preventiva'])) {
                                                                                $data_atual = $dadosPreventiva['data_Preventiva'];
                                                                                if ($data_atual < date('Y-m-d')) { 
                                                                                    echo $_SESSION['msg'] = "Erro";
                                                                          
                                                                           } 
                                                                           }?>
                                                                            
                                                                            <!-- <label class="input-group-text" title="Data Final"><strong>Data Final</strong></label>     -->
                                                                            <input type="date" name="data_Preventiva" value="<?php echo $data_atual ?>" class="form-control form-control-sm"  required="required">
                                                                            <br>
                                                                            <div class="text-left form-group">
                                                                                <label for="exampleFormControlFile1">Upload RAT</label>
                                                                                <input type="file" class="form-control-file" id="exampleFormControlFile1" Disabled>
                                                                            </div>
                                                                            
                                                                            <textarea class="form-control" name="TextoPreventiva" id="exampleFormControlTextarea1" placeholder="Observações:" ></textarea>
                                                                            <br>
                                                                            <button class="btn btn-primary btn-sm btn-block" onclick="bootstrapAlert()" type="submit" value="Pesquisar" name="#PesqEntreData">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                                                                </svg>
                                                                                Pesquisar
                                                                            </button>
                                                                            
                                                                        </div>    
                                                                    </form>
                                                                    <!-- Final Fomulario-->
                                                            </div>
                                                        </div>
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
                                <!-- FIM Modal coluna 01-->
                            </td>
                    </tr>

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