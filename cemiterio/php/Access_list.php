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

  $sql = sprintf(" DELETE FROM login WHERE idLogin =  $id ");
  $result = $conn->query($sql);

    if ($result) {
      return "ac_ok";
    } else {
      return "ac_error";
    }
    $conn->close();
}
