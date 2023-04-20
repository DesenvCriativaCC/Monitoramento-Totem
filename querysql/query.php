<?php
$query = $conexao->query("SELECT * FROM tbl_totem");
$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
$contar = count($resultado);

$query = $conexao->query("SELECT * FROM tbl_totem where status='1'");
$resultup = $query->fetchAll(PDO::FETCH_ASSOC);
$up = count($resultup);

$query = $conexao->query("SELECT * FROM tbl_totem where status='0'");
$resultdow = $query->fetchAll(PDO::FETCH_ASSOC);
$dow = count($resultdow);
