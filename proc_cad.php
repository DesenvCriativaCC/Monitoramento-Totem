<?php
	include_once('conn\conn.php');
	$preventiva = 0;
    //$dadosPreventiva = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $idTotem = $_GET ['id_totem'];
    $dataP = $_GET ['data_Preventiva'];
    //$dataP = $_GET ($dadosPreventiva['data_Preventiva']);
    $textoP  = $_GET ['TextoPreventiva'];
    $check = $_GET ['preventiva'];
 
    var_dump($idTotem);
	var_dump($dataP);
    var_dump($textoP);
    var_dump($check);
    

	// $query = "INSERT INTO tbl_ptotem (`dataPreventiva`, `dataProxPreventiva`, `assunto`, `dataPub`, `id_totem`, `checked`) VALUES ('dataProxPreventiva', 'assunto', 'dataPub', 'id_totem', 'checked')";	
	// $result_cadastro = $conexao->query($query);
?>