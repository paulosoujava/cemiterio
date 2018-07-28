<?php

session_start();
$email = addslashes(trim($_POST['email']));
$pass = addslashes($_POST['pass']);

if (!empty($email) && !empty($pass)) {
  if (checkMysqlUser($email, $pass) > 0) {
    echo json_encode(array("code" => "success"));
  } else {
    echo json_encode(array("code" => "log_001"));
  }
} else {
  echo json_encode(array("code" => "log_002"));
}

function checkMysqlUser($email, $pass) {

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

  $sql = sprintf("SELECT * FROM login WHERE email ='%s' AND pass = '%s' ", $email, $pass);
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $_SESSION['ACCESS_ADM'] = $row['nivel'];
      $_SESSION['ID'] = $row['idLogin'];
      $_SESSION['EMAIL'] = $row['email'];
      $_SESSION['NAME'] = $row['name'];
      $_SESSION['LAST_NAME'] = $row['last_name'];
      $_SESSION['LAST_ACCESS'] = $row['last_access'];
    }
    return 1;
  } else {
    return 0;
  }
  $conn->close();
}
