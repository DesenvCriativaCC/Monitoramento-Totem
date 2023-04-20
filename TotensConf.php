<?php

$host = "localhost"; // nome do servidor MySQL
$user = "root"; // nome de usuário do MySQL
$senha = ""; // senha do MySQL
$banco = "test"; // nome do banco de dados

// conexão com o banco de dados MySQL usando PDO
try {
  $conexao = new PDO("mysql:host=$host;dbname=$banco", $user, $senha);
  $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Conexão bem sucedida";
} catch(PDOException $e) {
  echo "Não foi possível conectar ao MySQL: " . $e->getMessage();
  exit();
}
 

// executa uma consulta SQL
// $resultado = $conexao;
//  var_dump ($resultado);
//exit();

date_default_timezone_set('America/Sao_Paulo');
header("Refresh:20");//recarrega em 20 segundos

echo $data_Offdow = date('Y-m-d H:i:s');

$data_OffNULL = '0000-00-00 00:00:00';



$totens = [    
  "ANANINDEUA - TOTEM 01 - 11168"                           => "172.31.1.51",                         
  "ANANINDEUA - PGM - TOTEM 02 - 15832"                     => "172.31.1.52",                  
  "DETRAN ANTÔNIO BARRETO - TOTEM 01 - 11230"               => "172.31.3.51", 
  "DETRAN ANTÔNIO BARRETO - TOTEM 02 - 11188"               => "172.31.3.52",
  "DETRAN ANTÔNIO BARRETO - PGM - TOTEM 03 - 11225"         => "172.31.3.53", 
  "DETRAN ANTÔNIO BARRETO - PGM - TOTEM 04 - 11249"         => "172.31.3.54",  
  "ALEPA - TOTEM 01 - 10712"                                => "172.31.11.19",
  "DETRAN SEDE - PGM - TOTEM 01 - 11122"                    => "172.31.11.11",
  "DETRAN SEDE - PGM - TOTEM 02 - 11190"                    => "172.31.11.12",
  "DETRAN SEDE - PGM - TOTEM 03 - 11242"                    => "172.31.11.13",
  "DETRAN SEDE - PGM - TOTEM 04 - 11248"                    => "172.31.11.14",
  "DETRAN SEDE - TOTEM 05 - 11126"                          => "172.31.11.15",
  "DETRAN SEDE - TOTEM 06 - 11207"                          => "172.31.11.16",
  "DETRAN SEDE - TOTEM 07 - 11204"                          => "172.31.11.17",
  "DETRAN SEDE - TOTEM 08 - 11202"                          => "172.31.11.18",
  "ICOARACI ESTACAO CIDADANIA - TOTEM 01 - 11136"           => "172.31.125.51",
  "ICOARACI ESTACAO CIDADANIA - PGM - TOTEM 02 - 11120"     => "172.31.125.52",
  "SHOPPING METROPOLE - TOTEM 01 - 11210"                   => "172.31.127.51",
  "SHOPPING METROPOLE - PGM - TOTEM 02 - 10710"             => "172.31.127.52",
  "SHOPPING GRÃO PARÁ - TOTEM 01 - 11209"                   => "172.31.99.51" ,
  "SHOPPING GRÃO PARÁ - PGM - TOTEM02 - 11247"              => "172.31.99.52" ,
  "SHOPPING PÁTIO BELÉM - TOTEM 01 - 11211"                 => "172.31.128.51",
  "SHOPPING PÁTIO BELÉM - PGM - TOTEM 02 - 11145"           => "172.31.128.52",
  "Homologação - criativa"                                  => "10.0.7.36",    
];



foreach($totens as $totem => $ip_totem){
    $retorno = shell_exec(sprintf('ping -n 1  -w 1 %s', escapeshellarg($ip_totem)));
    //echo $retorno;
    if (preg_match("/tempo</", $retorno) || preg_match("/tempo=/", $retorno)){

      $status = 1;

        if($status == 1){
           
          $query = "UPDATE tbl_totem SET data_Off = '$data_OffNULL', status = '$status' WHERE totem = '$totem'";
          $resultado = $conexao->query($query);

        }

    } else{

        $status = 0;
        
        if($status == 0){
          
          $query = "UPDATE tbl_totem SET status = '$status' WHERE totem = '$totem'";
          $resultado = $conexao->query($query);

        }
    }
    //$query = "UPDATE tbl_totem SET status = '$status', SET data_Off = '$data_Off' WHERE totem = '$totem ";
    //$resultado = $conexao->query($query); 
    //armazenar o status no banco MySQL
    //$query = "INSERT INTO tbl_totem (totem, ip_totem, status, Data_Pub) VALUES ('$totem', '$ip_totem', '$status', NOW())";


    }


    // consulta no banco MySQL
    $query = $conexao->query("SELECT * FROM tbl_totem");
    $resultadoAlert = $query->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($resultadoAlert  as $totens){

      echo "<br>". $totens['id_totem'] . ' - ' . $totens['data_Off'] . ' - ' .  $totens['status'];
      $totensid_totem = $totens['id_totem'];

        // if ($totens['status'] == 1){

        //   $query = "UPDATE tbl_totem SET data_Off = '$data_OffNULL' WHERE id_totem = '$totensid_totem'";
        //   $resultado = $conexao->query($query);

        // } 


        if(($totens['data_Off'] == $data_OffNULL) && ($totens['status'] == 0)){

          $query = "UPDATE tbl_totem SET data_Off = '$data_Offdow', data_ON = '$data_OffNULL' WHERE id_totem = '$totensid_totem'";
          $resultado = $conexao->query($query);

          // Cadastra na tabela datadow DATA do evento,
          $query = "INSERT INTO datadow(id_totem, dataDow) VALUES ('$totensid_totem', '$data_Offdow')";
          $resultado = $conexao->query($query);

          //echo "<br>". $totens['id_totem'] . ' - ' . $totens['data_Off'] . ' - - ' .  $totens['status'];

        } 

        if(($totens['data_ON'] == $data_OffNULL) && ($totens['status'] == 1)){

          $query = "UPDATE tbl_totem SET data_ON = '$data_Offdow' WHERE id_totem = '$totensid_totem'";
          $resultado = $conexao->query($query);

          // Cadastra na tabela datadow a data da recuperação.
          $query = "INSERT INTO datadow(id_totem, dataUp) VALUES ('$totensid_totem', '$data_Offdow')";
          $resultado = $conexao->query($query);

          //echo "<br>". $totens['id_totem'] . ' - ' . $totens['data_Off'] . ' - - ' .  $totens['status'];

        } 



    }



