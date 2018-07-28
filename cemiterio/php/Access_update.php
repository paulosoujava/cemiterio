<?php

session_start();
$id = addslashes(trim($_POST['id']));
$email = addslashes(trim($_POST['email']));
$pass = addslashes($_POST['pass']);
$name = addslashes($_POST['name']);
$lastName = addslashes($_POST['lastname']);
$ddd = addslashes($_POST['ddd']);
$phone = addslashes($_POST['numero']);


if (!empty($email) && !empty($name) && !empty($lastName) && !empty($ddd) && !empty($phone)) {
  $num = checkMysqlUser($email, $pass, $name, $lastName, $ddd, $phone, $id);
  switch ($num) {
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
} else {
  echo json_encode(array("code" => "ac_empty"));
}

function checkMysqlUser($email, $pass, $name, $lastName, $ddd, $phone, $id) {

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

  if( !empty($pass  )){
    $sql = sprintf("UPDATE `login` SET 
                                      pass = '%s' ,
                                      name = '%s' , 
                                      last_name = '%s' ,
                                      email = '%s' ,
                                      phone = '%s' ,
                                      ddd = '%s' 
                                  WHERE idLogin = %s",
                                                 $pass, 
                                                 $name,
                                                 $lastName,
                                                 $email, 
                                                 $phone,
                                                 $ddd, 
                                                  $id);
  }else{
    $sql = sprintf("UPDATE `login` SET  name = '%s' , 
                                        last_name = '%s' ,
                                        email = '%s' ,
                                        phone = '%s' ,
                                        ddd = '%s' 
                                  WHERE idLogin = %s",
                                                 $name,
                                                 $lastName,
                                                 $email, 
                                                 $phone,
                                                 $ddd,
                                                  $id);
  }
  

  $result = $conn->query($sql);

  if ($result) {
    return "ac_ok";
  } else {
    return "ac_error";
  }



  $conn->close();
}
