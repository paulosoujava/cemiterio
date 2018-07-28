<?php

session_start();

//EU SEI ISSO É HORRIVEL, MAS TO SEM TEMPO CORRIJO DEPOIS
$id = addslashes($_POST['id']);
$cp_1 = addslashes($_POST['f1_cp1']);
$cp_2 = addslashes($_POST['f1_cp2']);
$cp_3 = addslashes($_POST['f1_cp3']);
$cp_4 = addslashes($_POST['f1_cp4']);
$cp_5 = addslashes($_POST['f1_cp5']);
$cp_6 = addslashes($_POST['f1_cp6']);
$cp_7 = addslashes($_POST['f1_cp7']);
$cp_8 = addslashes($_POST['f1_cp8']);
$cp_9 = addslashes($_POST['f1_cp9']);



$flag = false;

for( $i = 1; $i <= 9; $i++){
    if( empty($_POST['f1_cp'.$i])){
      $flag = true;
    }
  }

if( !$flag ){

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

  $sql = sprintf("SELECT idSepultado FROM dados_sepultamento WHERE idSepultado ='%s'",$id);
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    
    $sql = sprintf("UPDATE `dados_sepultamento` SET 
    cp_1 = '%s',
    cp_2 = '%s',
    cp_3 = '%s',
    cp_4 = '%s',
    cp_5 = '%s',
    cp_6 = '%s',
    cp_7 = '%s',
    cp_8 = '%s',
    cp_9 = '%s'
      WHERE idSepultado= %s",
         $cp_1,$cp_2,$cp_3,$cp_4,$cp_5,$cp_6,$cp_7,$cp_8,$cp_9, $id);


    $result = $conn->query($sql);

    if ($result) {
       echo json_encode(array("code" => "ac_ok"));
    } else {
       echo json_encode(array("code" => "ac_error"));
    }
    
    
  } else {
    $sql = sprintf("INSERT INTO dados_sepultamento (
    idSepultado, cp_1,cp_2,cp_3,cp_4,cp_5,cp_6,cp_7,cp_8,cp_9
     ) VALUES (
     %s,'%s', '%s', '%s', '%s', '%s','%s','%s', '%s', '%s');",
        $id, $cp_1,$cp_2,$cp_3,$cp_4,$cp_5,$cp_6,$cp_7,$cp_8,$cp_9);


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
