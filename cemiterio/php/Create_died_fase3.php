<?php

session_start();

//EU SEI ISSO É HORRIVEL, MAS TO SEM TEMPO CORRIJO DEPOIS
$id = addslashes($_POST['id']);
$cp_1 = addslashes($_POST['cp1']);
$cp_2 = addslashes($_POST['cp2']);
$cp_3 = addslashes($_POST['cp3']);
$cp_4 = addslashes($_POST['cp4']);
$cp_5 = addslashes($_POST['cp5']);
$cp_6 = addslashes($_POST['cp6']);
$cp_7 = addslashes($_POST['cp7']);
$cp_8 = addslashes($_POST['cp8']);




$flag = 0;

for( $i = 1; $i <= 8; $i++){
    if( empty($_POST['cp'.$i])){
      $flag++;
    }
  }

if( $flag != 8){

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "cemiterio";

// Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = sprintf("SELECT idSepultado FROM endereco WHERE idSepultado ='%s'",$id);
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
          
    
    $sql = sprintf("UPDATE `endereco` SET 
    endereco = '%s',
    numero = '%s',
    bairro = '%s',
    cep = '%s',
    telefone = '%s',
    cidade = '%s',
    estado = '%s',
    fixo = '%s'
      WHERE idSepultado= %s",
         $cp_1,$cp_2,$cp_3,$cp_4,$cp_5,$cp_6,$cp_7,$cp_8, $id);


    $result = $conn->query($sql);

    if ($result) {
       echo json_encode(array("code" => "ac_ok"));
    } else {
       echo json_encode(array("code" => "ac_error"));
    }
    
    
  } else {
    $sql = sprintf("INSERT INTO endereco (
    idSepultado, endereco,numero,bairro,cep,telefone,cidade,estado,fixo
     ) VALUES (
     %s,'%s', '%s', '%s', '%s', '%s','%s','%s', '%s');",
        $id, $cp_1,$cp_2,$cp_3,$cp_4,$cp_5,$cp_6,$cp_7,$cp_8);


    $result = $conn->query($sql);

    if ($result) {
       echo json_encode(array("code" => "ac_ok"));
    } else {
       echo json_encode(array("code" => "ac_error"));
    }
  }


  $conn->close();

}else{
        echo json_encode(array("code" => "ac_empty"));
}
