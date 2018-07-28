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
                <label for="text">Pesquisa</label>
                <input id="text" type="text" name="text" />


                <div class="input-field col s6">
                  <div class="row">
                    <div class="col s3">
                      <div class="row" style="border-right:  1px solid gray;margin-right: 10px">
                        <label>
                          <input name="group1" type="radio"  value="1"  class="ch" />
                          <span>Sepultado</span>
                        </label>
                        <div class="row" style="padding: 20px; display: none" id="container_1">

                          <p> <label> <input name="stp"   type="radio" value="quadra" id="spd_1" /> <span>Quadra</span> </label></p>
                          <p> <label> <input name="stp"   type="radio" value="numero"  id="spd_2"/> <span>Numero</span> </label></p>
                          <p> <label> <input name="stp"   type="radio" value="obt" id="spd_1" /> <span>Obito</span> </label></p>
                          <p> <label> <input name="stp"    type="radio" value="mes"  id="spd_2"/> <span>Mês</span> </label></p>
                          <p> <label> <input name="stp"    type="radio" value="ano"  id="spd_2"/> <span>Ano</span> </label></p>
                          <p> <label> <input name="stp"    type="radio" value="adm"  id="spd_2"/> <span>Administrador</span> </label></p>
                          <p> <label> <input name="stp"    type="radio" value="filho"  id="spd_2"/> <span>Filho de</span> </label></p>
                          <p> <label> <input name="stp"    type="radio" value="prof"  id="spd_2"/> <span>Profissão</span> </label></p>
                          <p> <label> <input name="stp"    type="radio" value="doutor"  id="spd_2"/> <span>Doutor</span> </label></p>


                        </div>
                      </div>
                    </div>
                    <div class="col s3">
                      <div class="row" style="border-right:  1px solid gray;margin-right: 10px">
                        <label>
                          <input name="group1" type="radio" value="2"  class="ch" />
                          <span>Endereço</span>
                        </label>
                        <div class="row" style="padding: 20px; display: none" id="container_2">
                          <p> <label> <input name="end"  type="radio" value="end"  id="end_1"/> <span>Endereço</span> </label></p>
                          <p> <label> <input name="end"  type="radio" value="num"  id="end_2"/> <span>Número</span> </label></p>
                          <p> <label> <input name="end"  type="radio" value="cep"  id="end_3"/> <span>CEP</span> </label></p>
                          <p> <label> <input name="end"  type="radio" value="cid"  id="end_4"/> <span>Cidade</span> </label></p>
                          <p> <label> <input name="end"  type="radio" value="est"  id="end_5"/> <span>Estado</span> </label></p>
                          <p> <label> <input name="end"  type="radio" value="res"  id="end_6"/> <span>Telefone Res</span> </label></p>
                          <p> <label> <input name="end"  type="radio" value="cel"  id="end_7"/> <span>Tel. Celular</span> </label></p>

                        </div>
                      </div>
                    </div>
                    <div class="col s3">
                      <div class="row">
                        <label>
                          <input name="group1" type="radio" value="3"  class="ch" />
                          <span>Sepultamento</span>
                        </label>
                        <div class="row" style="padding: 20px; display: none" id="container_3">
                          <p> <label> <input name="sep" type="radio" value="afo"  id="spt_1"/> <span>Aforamento</span> </label></p>
                          <p> <label> <input name="sep" type="radio" value="qua"  id="spt_2"/> <span>Quadra</span> </label></p>
                          <p> <label> <input name="sep"  type="radio" value="sep"  id="spt_3"/> <span>Sepultura</span> </label></p>
                          <p> <label> <input name="sep"  type="radio" value="tipo"  id="spt_4"/> <span>Tipo Aforamento</span> </label></p>
                          <p> <label> <input name="sep"  type="radio" value="inic"  id="spt_5"/> <span>Inicio ocupação</span> </label></p>
                          <p> <label> <input name="sep"  type="radio" value="praz"  id="spt_6"/> <span>Prazo</span> </label></p>
                          <p> <label> <input name="sep"  type="radio" value="ter"  id="spt_7"/> <span>Término</span> </label></p>
                          <p> <label> <input name="sep"  type="radio" value="liv"  id="spt_8"/> <span>livro</span> </label></p>
                        </div>
                      </div>
                    </div>
                    <div class="col s3">
                      <input type="submit" name="submit" class=" btn-large teal right " value="OK"/>
                    </div>

                    </span>
                  </div>
                  </form>
                </div>
            </div>
        </div>
     
        <br />
        <?php if (!isset($_POST['submit'])) { ?>
          
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
          $txt = @addslashes($_POST['text']);
          $grupo = @addslashes($_POST['group1']);
          $searc1 = @addslashes($_POST['stp']);
          $searc2 = @addslashes($_POST['end']);
          $searc3 = @addslashes($_POST['sep']);


          switch ($grupo) {
            case 1:
                  switch ($searc1) {
                    case 'quadra' : $cp = 'cp_1';
                      break;
                    case 'obt' : $cp = 'cp_8';
                      break;
                    case 'num' : $cp = 'cp_2';
                      break;
                    case 'mes' : $cp = 'cp_4';
                      break;
                    case 'ano' : $cp = 'cp_5';
                      break;
                    case 'adm' : $cp = 'cp_38';
                      break;
                    case 'filho' : $cp = 'cp_23';
                      break;
                    case 'prof' : $cp = 'cp_19';
                      break;
                    case 'doutor' : $cp = 'cp_29';
                      break;
                  }
                  //SELECT colunas FROM tabela WHERE campo LIKE 'valor'
                   $sql = ("SELECT * FROM dados_sepultado WHERE $cp LIKE '%" . $txt . "%'" );
                  echo '<div id="campo_pesquisa">
                          <a href="search.php" class="btn-floating btn-large waves-effect waves-light red left"><i class="material-icons">refresh</i></a>
                        </div>';

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

                                     <i class="material-icons red-text"><a href="create_died_fase_1.php?id=' . $row['idSepultado'] . '" class="waves-effect waves-light btn">Sepultamento</a></i>
                                     &nbsp;|&nbsp;
                                     <i class="material-icons red-text"><a href="create_died_fase_2.php?id=' . $row['idSepultado'] . '" class="waves-effect waves-light btn">Endereço</a></i>
                                     </center>
                                  </td>
                                  <td>
                                     <a style="cursor: pointer" class="delete" data="' . $row['idSepultado'] . ' "><i class="material-icons red-text">delete</i> </a>
                                       &nbsp;|&nbsp;
                                     <a href="create_died.php?id=' . $row['idSepultado'] . '"><i class="material-icons green-text">edit</i></a>
                                       &nbsp;|&nbsp;
                                     <a href="index_print.php?id=' . $row['idSepultado'] . '"><i class="material-icons black-text">local_printshop</i></a>

                                  </td>
                                </tr>';
                    }
                    echo ' </tbody>
                        </table>';
                }
                   echo '<center><h5>Encontrados ( ' . $result->num_rows . ') registro(s) </h5></center>';
            break;
            case 2:
                  switch ($searc2) {
                    case 'end' : $cp = 'endereco  ';
                      break;
                    case 'num' : $cp = 'numero  ';
                      break;
                    case 'cep' : $cp = 'cep  ';
                      break;
                    case 'cid' : $cp = 'cid  ';
                      break;
                    case 'est' : $cp = 'estado  ';
                      break;
                    case 'res' : $cp = 'fixo  ';
                      break;
                    case 'cel' : $cp = 'telefone  ';
                      break;
                  }
                  //SELECT colunas FROM tabela WHERE campo LIKE 'valor'
                   $sql = ("SELECT * FROM endereco WHERE $cp LIKE '%" . $txt . "%'" );
                  echo '<div id="campo_pesquisa">
                          <a href="search.php" class="btn-floating btn-large waves-effect waves-light red left"><i class="material-icons">refresh</i></a>
                        </div>';

                  $result = $conn->query($sql);

                  if (@$result->num_rows > 0) {
                    echo'<br />
                              <table class=" highlight">
                                <thead>
                                  <tr>
                                      <th>Endereco</th>
                                      <th>Cep</th>
                                      <th>Fixo</th>
                                      <th>Celular</th>
                                      <th>Cidade</th>
                                      <th>UF</th>
                                      <th>Data Cadastro</th>
                                      <th>Data Alteração</th>


                                  </tr>
                                </thead>
                                <tbody>';
                    while ($row = $result->fetch_assoc()) {
                      echo '<tr>
                                    <td>' . $row['endereco'] . '</td>
                                    <td>' . $row['cep'] . '</td>
                                      <td>' . $row['fixo'] . '</td>
                                        <td>' . $row['telefone'] . '</td>
                                          <td>' . $row['cidade'] . '</td>
                                            <td>' . $row['estado'] . '</td>
                                    <td>' . date("d/m H:i:s", strtotime($row['dataCreate'])) . '</td>
                                      <td>' . date("d/m H:i:s", strtotime($row['dataUpdate'])) . '</td>

                                </tr>';
                    }
                    echo ' </tbody>
                        </table>';

                   
                  }
                    echo '<center><h5>Encontrados ( ' . $result->num_rows . ') registro(s) </h5></center>';
                  
              break;
            case 3:
                  switch ($searc3) {
                    case 'afo' : $cp = 'cp_1  ';
                      break;
                    case 'qua' : $cp = 'cp_2  ';
                      break;
                    case 'sep' : $cp = 'cp_3  ';
                      break;
                    case 'tipo' : $cp = 'cp_4  ';
                      break;
                    case 'inic' : $cp = 'cp_5  ';
                      break;
                    case 'praz' : $cp = 'cp_6  ';
                      break;
                    case 'ter' : $cp = 'cp_7  ';
                      break;
                    case 'liv' : $cp = 'cp_9  ';
                      break;
                  }
                  $sql = ("SELECT * FROM dados_sepultamento WHERE $cp LIKE '%" . $txt . "%'" );
                
                  echo '<div id="campo_pesquisa">
                          <a href="search.php" class="btn-floating btn-large waves-effect waves-light red left"><i class="material-icons">refresh</i></a>
                        </div>';

                  $result = $conn->query($sql);
              
                     if ($result->num_rows > 0) {
                         echo'<br />
                          <table class=" highlight">
                            <thead>
                              <tr>
                                  <th>Aforamento</th>
                                  <th>Quadra</th>
                                  <th>Sepultamento</th>
                                  <th>Tipo</th>
                                  <th>Inicio</th>
                                  <th>Prazo</th>
                                  <th>Termino</th>
                                  <th>Data Cadastro</th>
                                  <th>Data Alteração</th>
                                 
                                  
                              </tr>
                            </thead>
                            <tbody>';
                      while ($row = $result->fetch_assoc()) {
                        echo '<tr>
                                      <td>' . $row['cp_1'] . '</td>
                                      <td>' . $row['cp_2'] . '</td>
                                        <td>' . $row['cp_3'] . '</td>
                                          <td>' . $row['cp_4'] . '</td>
                                            <td>' . $row['cp_5'] . '</td>
                                              <td>' . $row['cp_6'] . '</td>
                                                <td>' . $row['cp_7'] . '</td>
                                      <td>' . date("d/m H:i:s", strtotime($row['data_create'])) . '</td>
                                        <td>' . date("d/m H:i:s", strtotime($row['data_update'])) . '</td>

                                  </tr>';
                      }
                    echo ' </tbody>
                        </table>';

               

               
              }
               echo '<center><h5>Encontrados ( ' . $result->num_rows . ') registro(s) </h5></center>';  
              break;
          }
        }
          ?>


      </div>
    </div>
    <br><br>




    <!--  Scripts-->
    <script src="../js/jquery-2.1.1.min.js"></script>
    <script src="../js/materialize.js"></script>
    <script src="../js/sweetalert.min.js"></script>
    <script src="../js/search.js"></script>
  </body>
</html>
