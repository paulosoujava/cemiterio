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
      $sql = sprintf("SELECT * FROM dados_sepultamento WHERE idSepultado = " . $_GET['id']);
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $cp1 = $row['cp_1'];
          $cp2 = $row['cp_2'];
          $cp3 = $row['cp_3'];
          $cp4 = $row['cp_4'];
          $cp5 = $row['cp_5'];
          $cp6 = $row['cp_6'];
          $cp7 = $row['cp_7'];
          $cp8 = $row['cp_8'];
          $cp9 = $row['cp_9'];
          $cp40 = $row['data_update'];
          $cp39 = $row['data_create'];
        }
      }
    }
    ?>
    
    <div class="container">
      <div class="row">
        <div class="row">
          <a  href="index.php" class=" waves-effect waves-light "><i class="teal-text material-icons medium">home</i></a>
        </div>

        <div id="__sepultamento" class="col s12">
          <br /><br />
          <a href="list_died.php" class=" waves-effect waves-light right "><i class="teal-text material-icons medium">arrow_back</i></a>

          <div>

            <?php
            if (isset($cp40)) {
              echo '<h3>Editar Dados Sepultamento</h3>';
              echo '<b>Criado: ' . date("d/m H:i:s", strtotime($cp39)) . '  Atualizado dia: ' . date("d/m H:i:s", strtotime($cp40)) . ' </b><hr />';
            } else {
              echo '<h3> Dados Sepultamento</h3>';
            }
            ?>

            <br /><br />  

            <div style="font-size: 20px">

              <div class="row">

                <div class="col s6">
                  <p>Aforamento  </p>
                  <input  id="f1_cp1" type="text"
                          value="<?php if (isset($cp1)) echo $cp1; ?>" 
                          style="outline: 0; width: 320px; height: 20px; background: #fff; padding: 5px; border-bottom:1px solid gray; "  >
                  <p>Quadra</p> 
                  <input  id="f1_cp2" type="text" 
                          value="<?php if (isset($cp2)) echo $cp2; ?>" 
                          style="outline: 0; width: 320px; height: 20px; background: #fff; padding: 5px; border-bottom:1px solid gray; "  >

                  <p>Sepultura</p>
                  <input id="f1_cp3" type="text" 
                         value="<?php if (isset($cp3)) echo $cp3; ?>" 
                         style="outline: 0; width: 320px; height: 20px; background: #fff; padding: 5px; border-bottom:1px solid gray; "  >
                  <p>Tipo Aforamento</p>
                  <input  id="f1_cp4" type="text" 
                          value="<?php if (isset($cp4)) echo $cp4; ?>" 
                          style="outline: 0; width: 320px; height: 20px; background: #fff; padding: 5px; border-bottom:1px solid gray; "   id="quadra" type="text"  style="outline: 0; width: 320px; height: 20px; background: #fff; padding: 5px; border-bottom:1px solid gray; "  >

                </div>

                <div class="col s6">

                  <p>Inicio ocupação </p>
                  <input  id="f1_cp5" type="text" 
                          value="<?php if (isset($cp5)) echo $cp5; ?>" 
                          style="outline: 0; width: 320px; height: 20px; background: #fff; padding: 5px; border-bottom:1px solid gray; "  >
                  <p>Prazo </p>
                  <input  id="f1_cp6" type="text"
                          value="<?php if (isset($cp6)) echo $cp6; ?>" 
                          style="outline: 0; width: 320px; height: 20px; background: #fff; padding: 5px; border-bottom:1px solid gray; "  >


                  <p>Término</p>
                  <input  id="f1_cp7" type="text" 
                          value="<?php if (isset($cp7)) echo $cp7; ?>" 
                          style="outline: 0; width: 320px; height: 20px; background: #fff; padding: 5px; border-bottom:1px solid gray; "  >

                  <p>Valor do aforamento</p>
                  <input  id="f1_cp8" type="text" 
                          value="<?php if (isset($cp8)) echo $cp8; ?>" 
                          style="outline: 0; width: 320px; height: 20px; background: #fff; padding: 5px; border-bottom:1px solid gray; "  >

                  <p>livro</p>
                  <input  id="f1_cp9" type="text"
                          value="<?php if (isset($cp9)) echo $cp9; ?>" 
                          style="outline: 0; width: 320px; height: 20px; background: #fff; padding: 5px; border-bottom:1px solid gray; "  >  

                </div>
              </div>


            </div>  
            <br />
            <?php
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
              echo '<a class="waves-effect waves-light btn  btn-large right green" id="btnSepultamento" >Editar</a>';
            } else {
              echo '<a class="waves-effect waves-light btn  btn-large right" id="btnSepultamento" >Salvar</a>';
            }
            ?>
            <input type="hidden" value="<?php if (isset($_GET['id'])) echo $_GET['id']; ?>" name="id" id="id" />

          </div>
        </div>


      </div>

      <!--  Scripts-->
      <script src="../js/jquery-2.1.1.min.js"></script>
      <script src="../js/materialize.js"></script>
      <script src="../js/sweetalert.min.js"></script>
      <script src="../js/create_died_fase_1.js"></script>
  </body>
</html>
