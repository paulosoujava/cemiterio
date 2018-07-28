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
  <body>
    <?php include_once '../assets/header.php'; ?>
    <div class="container">
      <div class="section">
        <div class="container">
          <div class="row">
            <a href="index.php" class=" waves-effect waves-light "><i class="teal-text material-icons medium">home</i></a>
          </div>
          <br /> 
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="input-field col s12">
              <span>
                <label for="text">Pesquise por:<b>Número ou Quadra</b>, <i> para uma busca avaçada <a href="search.php">clique aqui</a></i> </label>
                <input id="text" type="text" name="text" />
                <input type="submit" name="submit" class=" btn-large teal right " value="OK"/>
              </span>
            </div>
          </form>
        </div>
        <?php   if (!isset($_POST['submit'])) { ?>
        <h3 >Lista de Sepultados</h3>
        <?php }?>
        <br />
        <?php   if (!isset($_POST['submit'])) { ?>
        <a href="create_died.php" class="btn-floating btn-large waves-effect waves-light teal right"><i class="material-icons">add</i></a>
        <?php
        }
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

        if (isset($_POST['submit'])) {
          $txt = addslashes($_POST['text']);
          
          echo '<div id="campo_pesquisa">
          <a href="list_died.php" class="btn-floating btn-large waves-effect waves-light red left"><i class="material-icons">refresh</i></a>
          &nbsp;<h4>Pesquisado por: <i>' . $txt . '</i></h4>
        </div>';
          
           $sql = sprintf("SELECT * FROM dados_sepultado WHERE
             cp_1 = '%s' 
             OR cp_2 = '%s' 
             OR data_update = '%s' 
             OR data_create ='%s'
             OR cp_38 = '%s'", $txt, $txt, $txt, $txt, $txt);;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          echo'<br />
                  <table class=" highlight">
                    <thead>
                      <tr>
                          <th>Quadra</th>
                          <th>Numero</th>
                          <th>Data Cadastro</th>
                          <th>Data Apteração</th>
                          <th><center>Associações</center></th>
                          <th>Opções</th>
                      </tr>
                    </thead>
                    <tbody>';
                    while ($row = $result->fetch_assoc()) {
                      echo '<tr>
                                <td>' . $row['cp_1'] . '</td>
                                <td>' . $row['cp_2'] . '</td>
                                <td>' . date("d/m H:i:s", strtotime($row['data_create'])) . '</td>
                                  <td>' . date("d/m H:i:s", strtotime($row['data_update'])) . '</td>
                                <td>
                                <center>

                                 <i class="material-icons red-text"><a href="create_died_fase_1.php?id='.$row['idSepultado'].'" class="waves-effect waves-light btn">Sepultamento</a></i>
                                 &nbsp;|&nbsp;
                                 <i class="material-icons red-text"><a href="create_died_fase_2.php?id='.$row['idSepultado'].'" class="waves-effect waves-light btn">Endereço</a></i>
                                 </center>
                              </td>
                              <td>
                                 <a style="cursor: pointer" class="delete" data="'.$row['idSepultado'].' "><i class="material-icons red-text">delete</i> </a>
                                   &nbsp;|&nbsp;
                                 <a href="create_died.php?id='.$row['idSepultado'].'"><i class="material-icons green-text">edit</i></a>
                                   &nbsp;|&nbsp;
                                 <a href="index_print.php?id='.$row['idSepultado'].'"><i class="material-icons black-text">local_printshop</i></a>

                              </td>
                            </tr>';
                    }
                    echo ' </tbody>
                    </table>';
                  }
                  echo '<center><h5>Encontrados ( '.$result->num_rows . ') registro(s) </h5></center>';
          
        }else{
        ?>

        <div id="campo_lista">

        <?php
     
       
        $sql = sprintf("SELECT * FROM dados_sepultado");
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          echo'<br />
                  <table class=" highlight">
                    <thead>
                      <tr>
                          <th>Quadra</th>
                          <th>Numero</th>
                          <th>Data Cadastro</th>
                          <th>Data Apteração</th>
                          <th><center>Associações</center></th>
                          <th>Opções</th>
                      </tr>
                    </thead>
                    <tbody>';
          while ($row = $result->fetch_assoc()) {
            echo '<tr>
                      <td>' . $row['cp_1'] . '</td>
                      <td>' . $row['cp_2'] . '</td>
                      <td>' . date("d/m H:i:s", strtotime($row['data_create'])) . '</td>
                        <td>' . date("d/m H:i:s", strtotime($row['data_update'])) . '</td>
                      <td>
                       <center>
                       
                        <i class="material-icons red-text"><a href="create_died_fase_1.php?id='.$row['idSepultado'].'" class="waves-effect waves-light btn">Sepultamento</a></i>
                        &nbsp;|&nbsp;
                        <i class="material-icons red-text"><a href="create_died_fase_2.php?id='.$row['idSepultado'].'" class="waves-effect waves-light btn">Endereço</a></i>
                        </center>
                     </td>
                     <td>
                        <a style="cursor: pointer" class="delete" data="'.$row['idSepultado'].' "><i class="material-icons red-text">delete</i> </a>
                          &nbsp;|&nbsp;
                        <a href="create_died.php?id='.$row['idSepultado'].'"><i class="material-icons green-text">edit</i></a>
                          &nbsp;|&nbsp;
                        <a href="index_print.php?id='.$row['idSepultado'].'"><i class="material-icons black-text">local_printshop</i></a>

                     </td>
                  </tr>';
          }
          echo ' </tbody>
          </table>';
        }
        }
        ?>
        </div>
      </div>
    </div>
    <br><br>
  </div>

  <!--  Scripts-->
  <script src="../js/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/sweetalert.min.js"></script>
  <script src="../js/delete_list_died.js"></script>
</body>
</html>
