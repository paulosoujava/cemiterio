<?php
session_start();
if (isset($_SESSION['ACCESS_ADM'])) {
  ?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
      <title>Adm</title>

      <!-- CSS  -->
      <link href="../css/icon.css" rel="stylesheet">
      <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <style type="text/css">
      body {

        background-color: #cccccc;
      }
    </style>
    <?php
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
    $sql = sprintf("SELECT * FROM config WHERE idConfig = 1");
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $cssBack = $row['background'];
        $all_see = $row['is_admin'];
        $ch3 = $row['last_acess'];
      }
    }
    ?>
    <body  <?php if (isset($cssBack) && ($cssBack > 0)) echo 'style="background-image: url(../image/dark.jpg);"'; ?>>
  <?php include_once '../assets/header.php'; ?>
      <div class="section no-pad-bot" id="index-banner">
        <div class="container">
          <br><br>
          <div class="card   light-blue " style="padding: 10px; border-radius: 30px">
            <h1 class="header center white-text">Imprimir</h1>
            <p class="center white-text">Usuário:

            <?= $_SESSION['NAME'] ?> <?= $_SESSION['LAST_NAME'] ?>
              &nbsp; | &nbsp;Login: <?= $_SESSION['EMAIL'] ?>
              &nbsp; | &nbsp;Último Acesso: <?= date("d/m H:i:s", strtotime($_SESSION['LAST_ACCESS'])); ?>

            </p>
          </div>
          <br><br>
        </div>
      </div>
      <div class="container">
        <div class="section">
<div class="row">
              <a href="index.php" class=" waves-effect waves-light "><i class="teal-text material-icons medium">home</i></a>
           </div>
          <!--   Icon Section   -->
          <div class="row">
            <div class="col s12 m4">
              <a href="print1.php?id=<?=$_GET[ 'id'] ?>">
                <div class="row">
                  <div class="col s12 m12">
                    <div class="card  light-blue  darken-1 hoverable">
                      <div class="card-content white-text">
                        <span class="card-title center">Sepultado</span>
                        <center> <i class="large material-icons">local_printshop</i></center>
                      </div>

                    </div>
                  </div>
                </div>
              </a>
            </div>
  
              <a href="print3.php?id=<?=$_GET[ 'id'] ?>">
                <div class="col s12 m4">
                  <div class="row">
                    <div class="col s12 m12">
                      <div class="card  light-blue  darken-1 hoverable">
                        <div class="card-content white-text">
                          <span class="card-title center">Sepultamento </span>
                          <center> <i class="large material-icons">local_printshop</i></center>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
  
            <a href="print2.php?id=<?=$_GET[ 'id'] ?>">
              <div class="col s12 m4">
                <div class="row">
                  <div class="col s12 m12">
                    <div class="card  light-blue  darken-1 hoverable">
                      <div class="card-content white-text">
                        <span class="card-title center">Endereço</span>
                        <center> <i class="large material-icons">local_printshop</i></center>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </a>  
          </div>

          <a  href="#modal1" class="btn-floating btn-large waves-effect waves-light teal right modal-trigger"><i class="material-icons">info</i></a>



          <!-- Modal Structure -->
          <div id="modal1" class="modal">
            <div class="modal-content">
              <h4>!!Aviso!!</h4>
              <p>Este sistema foi desenvolvido por Paulo Oliveira [ pauosoujava@gmail.com] [48 996297813], e  licenciado ao cemitério São Crsitovão, o uso indevido do
                sistema ou seu código fonte está sujeito a ação judicial. Somente o desenvolvedor tem o direito de alterar, modificar o código fonte do sistema.</p>
            </div>
            <div class="modal-footer">
              <a href="#!" class="modal-close waves-effect waves-green btn-flat">Ok, entendi</a>
            </div>
          </div>


          <!--  Scripts-->
          <script src="../js/jquery-2.1.1.min.js"></script>
          <script src="../js/materialize.js"></script>
          <script src="../js/init.js"></script>

          </body>
          </html>
          <?php
        } else {
          header('Location: ../');
        }?>