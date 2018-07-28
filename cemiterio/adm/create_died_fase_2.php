<?php session_start() ?>
<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Cadastro de Sepultado</title>

    <!-- CSS  -->
    <link href="../css/icon.css" rel="stylesheet">
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  </head>

  <body>
    <?php
    include_once '../assets/header.php';

    include_once '../assets/header.php';
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
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
      $id = $_GET['id'];
      $sql = sprintf("SELECT * FROM endereco WHERE idSepultado = " . $_GET['id']);
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $cp1 = $row['endereco'];
          $cp2 = $row['numero'];
          $cp3 = $row['bairro'];
          $cp4 = $row['cep'];
          $cp5 = $row['telefone'];
          $cp6 = $row['cidade'];
          $cp7 = $row['estado'];
          $cp8 = $row['fixo'];
          $cp9 = $row['dataCreate'];
          $cp0 = $row['dataUpdate'];
        }
      }
    }
    ?>
    <div class="container">
      <div class="row">
        <br />
        <div class="row">
          <a  href="index.php" class=" waves-effect waves-light "><i class="teal-text material-icons medium">home</i></a>
        </div>

        <div id="__sepultamento" class="col s12">

          <a href="list_died.php" class=" waves-effect waves-light right "><i class="teal-text material-icons medium">arrow_back</i></a>

          <div>
            <div id="__endereco" class="col s12">
              <?php
              if (isset($cp40)) {
                echo '<h3>Editar Endereço</h3>';
                echo '<b>Criado: ' . date("d/m H:i:s", strtotime($cp9)) . '  Atualizado dia: ' . date("d/m H:i:s", strtotime($cp0)) . ' </b><hr />';
              } else {
                echo '<h3> Endereço</h3>';
              }
              ?>

              <br /><br />
              <div class="row">
                <form class="col s12">
                  <div class="row">
                    <div class="input-field col s6">
                      <input  value="<?php if (isset($cp1)) echo $cp1; ?>" 
                              id="cp1" type="text" >
                      <label for="cp1">Endereço</label>
                    </div>
                    <div class="input-field col s6">
                      <input  value="<?php if (isset($cp2)) echo $cp2; ?>"  
                              id="cp2" type="text" >
                      <label for="cp2">Num.:</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s6">
                      <input value="<?php if (isset($cp3)) echo $cp3; ?>" 
                             id="cp3" type="text" >
                      <label for="cp3">Bairro</label>
                    </div>
                    <div class="input-field col s6">
                      <input  value="<?php if (isset($cp4)) echo $cp4; ?>"  
                              id="cp4" type="text" >
                      <label for="cp4">Cep.:</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s6">
                      <input  value="<?php if (isset($cp5)) echo $cp5; ?>"
                              id="cp5" type="text" >
                      <label for="cp5">Cidade</label>
                    </div>
                    <div class="input-field col s6">
                      <input  value="<?php if (isset($cp6)) echo $cp6; ?>"  
                              id="cp6" type="text" >
                      <label for="cp7">Estado</label>
                    </div>
                    <div class="row">
                      <div class="input-field col s6">
                        <input value="<?php if (isset($cp7)) echo $cp7; ?>"  
                               id="cp7" type="text" >
                        <label for="cp7">Telefone Res</label>
                      </div>
                      <div class="input-field col s6">
                        <input id="cp8" type="text"  value="<?php if (isset($cp8)) echo $cp8; ?>" >
                        <label for="cp8">Tel. Celular.:</label>
                      </div>
                      <br />
                      <?php
                      if ($result->num_rows > 0) {
                        $title = 'Editar';
                        $color = 'green';
                      } else {
                        $title = 'Cadastrar';
                        $color = 'teal';
                      }
                      ?>
                      <a class="waves-effect waves-light btn  btn-large right <?= $color ?>t" id="btnEndereco" >
                        <?= $title ?>
                      </a>

                      <input type="hidden" value="<?php if (isset($_GET['id'])) echo $_GET['id']; ?>" name="id" id="id" />

                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!--  Scripts-->
          <script src="../js/jquery-2.1.1.min.js"></script>
          <script src="../js/materialize.js"></script>
          <script src="../js/sweetalert.min.js"></script>
          <script src="../js/create_died_fase_2.js"></script>
          </body>
          </html>
