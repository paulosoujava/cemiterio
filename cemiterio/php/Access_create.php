<?php

session_start();
$email = addslashes(trim($_POST['email']));
$pass = addslashes($_POST['pass']);
$name = addslashes($_POST['name']);
$lastName = addslashes($_POST['lastname']);
$ddd = addslashes($_POST['ddd']);
$phone = addslashes($_POST['numero']);


if (!empty($email) && !empty($pass) && !empty($name) && !empty($lastName) && !empty($ddd) && !empty($phone)) {
  $num = checkMysqlUser($email, $pass, $name, $lastName, $ddd, $phone);
  switch ($num){
    case "ac_ok": 
        echo json_encode(array("code" => "ac_ok"));
      break;
    case "ac_exist": 
        echo json_encode(array("code" => "ac_exist")); //existe
      break;
    case "ac_error": 
        echo json_encode(array("code" => "ac_error"));
      break;

  }
}else{
        echo json_encode(array("code" => "ac_empty"));
}
  

function checkMysqlUser($email, $pass, $name, $lastName, $ddd, $phone) {

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

  $sql = sprintf("SELECT * FROM login WHERE email ='%s' ", $email);
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    return "ac_exist";
  } else {
    $sql = sprintf("INSERT INTO login ( name, 
                                      last_name,
                                      email, 
                                      pass, 
                                      phone,
                                      ddd
                                    ) VALUES ('%s', '%s', '%s', '%s', '%s','%s');", $name, $lastName, $email, $pass, $phone, $ddd);


    $result = $conn->query($sql);

    if ($result) {
      return "ac_ok";
    } else {
      return "ac_error";
    }
  }


  $conn->close();
}
