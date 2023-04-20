<?php


$query = $conexao->query("SELECT p.id_totem, p.dataProxPreventiva
                                FROM tbl_totem AS t
                                INNER JOIN tbl_ptotem AS p
                                ON t.id_totem = p.id_totem
                                WHERE p.id_totem = $id_totem");
$pTotem = $query->fetchAll(PDO::FETCH_ASSOC);


foreach ($pTotem as $totens) {

    if ($totens["id_totem"] == 1 or $totens["id_totem"] == 2) {
        echo  $totens['dataProxPreventiva'];
        $proximaPreventiva = date('d-m-Y  H:i:s', strtotime('+10 months', strtotime(date($totens['dataProxPreventiva'])))); ?>

        <strong class="text-success">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="15" height="15" fill="currentColor"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path d="M342.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 178.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l80 80c12.5 12.5 32.8 12.5 45.3 0l160-160zm96 128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 402.7 54.6 297.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l256-256z" />
            </svg>
        </strong>

    <?PHP }

    if ($totens["id_totem"] >= 3 and $totens["id_totem"] <= 6) {
        echo  $totens['dataProxPreventiva'];
        $proximaPreventiva = date('d-m-Y  H:i:s', strtotime('+8 months', strtotime(date($totens['dataProxPreventiva'])))); ?>

        <strong class="text-success">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="15" height="15" fill="currentColor"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path d="M342.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 178.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l80 80c12.5 12.5 32.8 12.5 45.3 0l160-160zm96 128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 402.7 54.6 297.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l256-256z" />
            </svg>
        </strong>

    <?PHP }

    if ($totens["id_totem"] == 7) {
        echo  $totens['dataProxPreventiva'];
        $proximaPreventiva = date('d-m-Y  H:i:s', strtotime('+6 months', strtotime(date($totens['dataProxPreventiva'])))); ?>

        <strong class="text-success">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="15" height="15" fill="currentColor"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path d="M342.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 178.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l80 80c12.5 12.5 32.8 12.5 45.3 0l160-160zm96 128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 402.7 54.6 297.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l256-256z" />
            </svg>
        </strong>

    <?PHP }

    if ($totens["id_totem"] >= 8 and $totens["id_totem"] <= 17) {
        echo  $totens['dataProxPreventiva'];
        $proximaPreventiva = date('d-m-Y  H:i:s', strtotime('+8 months', strtotime(date($totens['dataProxPreventiva'])))); ?>

        <strong class="text-success">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="15" height="15" fill="currentColor"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path d="M342.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 178.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l80 80c12.5 12.5 32.8 12.5 45.3 0l160-160zm96 128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 402.7 54.6 297.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l256-256z" />
            </svg>
        </strong>

    <?PHP }

    if ($totens["id_totem"] >= 18 and $totens["id_totem"] <= 23) {
        echo  $totens['dataProxPreventiva'];
        $proximaPreventiva = date('d-m-Y  H:i:s', strtotime('+10 months', strtotime(date($totens['dataProxPreventiva'])))); ?>

        <strong class="text-success">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="15" height="15" fill="currentColor"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path d="M342.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 178.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l80 80c12.5 12.5 32.8 12.5 45.3 0l160-160zm96 128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 402.7 54.6 297.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l256-256z" />
            </svg>
        </strong>
    <?php }

    if ($totens["id_totem"] == 24) {
        echo  $totens['dataProxPreventiva'];
        $proximaPreventiva = date('d-m-Y  H:i:s', strtotime('+1 months', strtotime(date($totens['dataProxPreventiva'])))); ?>

        <strong class="text-success">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="15" height="15" fill="currentColor"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path d="M342.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 178.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l80 80c12.5 12.5 32.8 12.5 45.3 0l160-160zm96 128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 402.7 54.6 297.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l256-256z" />
            </svg>
        </strong>
    <?php } ?>

<?php } ?>