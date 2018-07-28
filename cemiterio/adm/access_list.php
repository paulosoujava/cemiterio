<!DOCTYPE html>
<html lang="pt">
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
  <div class="container" >
    
    
          <div class="row ">
            <div class="row">
              <a href="index.php" class=" waves-effect waves-light "><i class="teal-text material-icons medium">home</i></a>
           </div>
             <br /> 
          <h3 >Acesso de Usuários</h3>
          <a href="access_create.php" class="btn-floating btn-large waves-effect waves-light teal right"><i class="material-icons">add</i></a>
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
               $sql = sprintf("SELECT * FROM login");
              $result = $conn->query($sql);

           if ($result->num_rows > 0) {
             echo'<br />
                  <table class=" highlight">
                    <thead>
                  <tr>
                      <th>Nome</th>
                      <th>E-mail</th>
                      <th>Celular</th>
                      <th>Nivel</th>
                      <th>Ult. Acesso</th>
                      <th>Opções</th>
                  </tr>
                  </thead>

                  <tbody>';
             while ($row = $result->fetch_assoc()) {
             
              echo' <tr>  ';
              echo '<td> '.strtoupper($row['name'])  .' '. strtoupper($row['last_name']). ' </td> ';
              echo '<td> '.strtoupper($row['email']). ' </td> ';
              $status = ($row['nivel']==0)? "Básico": "Admin";
              $cor = ($row['nivel']==0)? "blue": "teal";
              echo '<td> <a class="waves-effect waves-light btn-small '. $cor. ' btnAdmin">'. $status. '</a>
                    </td> ';
              echo '<td> '.$row['ddd']  . $row['phone']. ' </td> ';
              echo '<td> '.date("d/m H:i:s",  strtotime($row['last_access'] )). ' </td> ';
              echo'
                  <td>
                     <a style="cursor: pointer" class="delete" data="'.$row['idLogin'].' "><i class="material-icons red-text">delete</i> </a>&nbsp;|&nbsp;
                     <a href="access_create.php?id='.$row['idLogin'].'"><i class="material-icons green-text">edit</i></a>
                  </td>
                </tr>';
               }  
             }
            ?>
          
            </tbody>
          </table>
        </div>
    <br><br>
  </div>

  <!--  Scripts-->
  <script src="../js/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/sweetalert.min.js"></script>
  <script src="../js/access_list.js"></script>

  </body>
</html>
