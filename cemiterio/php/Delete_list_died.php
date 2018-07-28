<?php

session_start();
$id = addslashes(trim($_POST['id']));
  switch (checkMysqlUser($id)){
    case "ac_ok": 
        echo json_encode(array("code" => "ac_ok"));
      break;
    case "ac_error": 
        echo json_encode(array("code" => "ac_error"));
      break;

  }


function checkMysqlUser($id) {

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

  $sql1 = sprintf(" DELETE FROM dados_sepultado WHERE idSepultado =  $id ");
  $result1 = $conn->query($sql1);
  
  $sql2 = sprintf(" DELETE FROM dados_sepultamento WHERE idSepultado =  $id ");
  $result2 = $conn->query($sql2);
  
  $sql3 = sprintf(" DELETE FROM endereco WHERE idSepultado =  $id ");
  $result3 = $conn->query($sql3);
  

    if ($result1) {
      return "ac_ok";
    } else {
      return "ac_error";
    }
    $conn->close();
}
