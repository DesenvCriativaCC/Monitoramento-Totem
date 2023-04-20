<?php
	//include_once('conn\conn.php');
	
    $dadosPreventiva = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $dataP = $dadosPreventiva['data_Preventiva'];
    $textoP  = $dadosPreventiva['TextoPreventiva'];
	var_dump($dataP);
    var_dump($textoP);

	// $result_cursos = "INSERT INTO cursos (nome, categoria_id, detalhes) VALUES ('$nome', '1', '$detalhes')";	
	// $resultado_cursos = mysqli_query($conn, $result_cursos);	
?>