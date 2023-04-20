
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