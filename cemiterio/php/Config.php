<?php

session_start();
$is_admin= addslashes($_POST['access']);
$background = addslashes($_POST['background']);
$last_acess = addslashes($_POST['lastaccess']);

  switch (checkMysqlUser($background, $last_acess, $is_admin)){
    case "ac_ok": 
        echo json_encode(array("code" => "ac_ok"));
      break;
    case "ac_error": 
        echo json_encode(array("code" => "ac_error"));
      break;

  }
  

function checkMysqlUser($background, $last_acess, $is_admin) {

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

   $sql = "UPDATE config SET background = $background,
                                      is_admin = $is_admin,
                                      last_acess = $last_acess
                          WHERE idConfig = 1; ";
  $result = $conn->query($sql);
    $result = $conn->query($sql);

    if ($result) {
      return "ac_ok";
    } else {
      return "ac_error";
    }

  $conn->close();
}
