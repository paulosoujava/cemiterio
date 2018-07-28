<?php

session_start();

//EU SEI ISSO É HORRIVEL, MAS TO SEM TEMPO CORRIJO DEPOIS
$cp_1 = addslashes($_POST['cp_1']);$cp_11 = addslashes($_POST['cp_11']);
$cp_2 = addslashes($_POST['cp_2']);$cp_12 = addslashes($_POST['cp_12']);
$cp_3 = addslashes($_POST['cp_3']);$cp_13 = addslashes($_POST['cp_13']);
$cp_4 = addslashes($_POST['cp_4']);$cp_14 = addslashes($_POST['cp_14']);
$cp_5 = addslashes($_POST['cp_5']);$cp_15 = addslashes($_POST['cp_15']);
$cp_6 = addslashes($_POST['cp_6']);$cp_16 = addslashes($_POST['cp_16']);
$cp_7 = addslashes($_POST['cp_7']);$cp_17 = addslashes($_POST['cp_17']);
$cp_8 = addslashes($_POST['cp_8']);$cp_18 = addslashes($_POST['cp_18']);
$cp_9 = addslashes($_POST['cp_9']);$cp_19 = addslashes($_POST['cp_19']);
$cp_10 = addslashes($_POST['cp_10']);$cp_20 = addslashes($_POST['cp_20']);
$cp_21 = addslashes($_POST['cp_21']);$cp_22 = addslashes($_POST['cp_22']);
$cp_23 = addslashes($_POST['cp_23']);$cp_24 = addslashes($_POST['cp_24']);
$cp_25 = addslashes($_POST['cp_25']);$cp_26 = addslashes($_POST['cp_26']);
$cp_27 = addslashes($_POST['cp_27']);$cp_28 = addslashes($_POST['cp_28']);
$cp_29 = addslashes($_POST['cp_29']);$cp_30 = addslashes($_POST['cp_30']);
$cp_31 = addslashes($_POST['cp_31']);$cp_32 = addslashes($_POST['cp_32']);
$cp_33 = addslashes($_POST['cp_33']);$cp_34 = addslashes($_POST['cp_34']);
$cp_35 = addslashes($_POST['cp_35']);$cp_36 = addslashes($_POST['cp_36']);
$cp_37 = addslashes($_POST['cp_37']);$cp_38 = addslashes($_POST['cp_38']);

$flag = false;

for( $i = 1; $i <= 38; $i++){
    if( empty($_POST['cp_'.$i]) && $i != 31){
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

  $sql = sprintf("SELECT cp_1, cp_2 FROM dados_sepultado WHERE cp_1 ='%s' AND cp_2 = '%s' ", $cp_1, $cp_2);
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo json_encode(array("code" => "ac_exist")); //existe
    exit;
  } else {
    $sql = sprintf("INSERT INTO dados_sepultado (
    cp_1,cp_2,cp_3,cp_4,cp_5,cp_6,cp_7,cp_8,cp_9,cp_10,
    cp_11,cp_12,cp_13,cp_14,cp_15,cp_16,cp_17,cp_18,cp_19,cp_20,
    cp_21,cp_22,cp_23,cp_24,cp_25,cp_26,cp_27,cp_28,cp_29,cp_30,
    cp_31,cp_32,cp_33,cp_34,cp_35,cp_36,cp_37,cp_38
     ) VALUES (
     '%s', '%s', '%s', '%s', '%s','%s','%s', '%s', '%s','%s',
     '%s', '%s', '%s', '%s', '%s','%s','%s', '%s',   '%s','%s',
     '%s', '%s', '%s', '%s', '%s','%s','%s', '%s', '%s','%s',
     '%s', '%s', '%s', '%s', '%s','%s','%s', '%s');",
         $cp_1,$cp_2,$cp_3,$cp_4,$cp_5,$cp_6,$cp_7,$cp_8,$cp_9,$cp_10,
    $cp_11,$cp_12,$cp_13,$cp_14,$cp_15,$cp_16,$cp_17,$cp_18,$cp_19,$cp_20,
    $cp_21,$cp_22,$cp_23,$cp_24,$cp_25,$cp_26,$cp_27,$cp_28,$cp_29,$cp_30,
    $cp_31,$cp_32,$cp_33,$cp_34,$cp_35,$cp_36,$cp_37,$cp_38);


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
