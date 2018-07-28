<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Acesso a Usuários</title>

    <!-- CSS  -->
    <link href="../css/icon.css" rel="stylesheet">
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  </head>
  <body>
    <?php include_once '../assets/header.php'; ?>
    <?php
    if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {
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
      $sql = sprintf("SELECT * FROM login WHERE idLogin = $id");
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $nome = $row['name'];
          $nomeLast = $row['last_name'];
          $email = $row['email'];
          $phone = $row['phone'];
          $ddd = $row['ddd'];
        }
      }
    }
    ?>

    <div class="container">
      <div class="section">
        <div class="container">
          <div class="row ">
            <div class="row">
              <a href="index.php" class=" waves-effect waves-light "><i class="teal-text material-icons medium">home</i></a>
            </div>
            <br /> 
            <h3>
<?php
if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id']))
  echo 'Modo Edição';
else
  echo 'Cadastro de Acesso ';
?>


            </h3>
            <a href="access_list.php" class=" waves-effect waves-light right "><i class="teal-text material-icons medium">arrow_back
              </i></a>
            <br />
            <div class="row">
              <form class="col s12">

                <div class="row">
                  <div class="input-field col s6">
                    <input placeholder="digite o nome"
                           value="<?php if (isset($nome)) echo $nome; ?>"
                           id="first_name" type="text" />
                    <label for="first_name">Primeiro nome</label>
                  </div>
                  <div class="input-field col s6">
                    <input placeholder="digite o sobrenome" id="last_name" type="text" 
                           value="<?php if (isset($nomeLast)) echo $nomeLast; ?>"/>
                    <label for="last_name">Último nome</label>
                  </div>
                </div>

                <div class="row">
                  <div class="input-field col s6">
                    <input placeholder="digite o email para acesso" id="email" type="email" 
                           value="<?php if (isset($email)) echo $email; ?>"/>
                    <label for="email">Email</label>
                  </div>
                  <div class="input-field col s6">
                    <input placeholder="digite uma senha simples" id="password" type="password" />
                    <label for="password">Senha</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s2">
                    <input placeholder="ddd" id="ddd" type="text"
                           value="<?php if (isset($ddd)) echo $ddd; ?>"/>
                    <label for="ddd">DDD</label>
                  </div>
                  <div class="input-field col s4">
                    <input placeholder="digite o número" id="phone" type="text" 
                           value="<?php if (isset($phone)) echo $phone; ?>"/>
                    <label for="phone">Num. Celular</label>
                  </div>
                </div>
                <input id="id" type="hidden" value="<?php if (isset($_GET['id'])) echo $_GET['id']; ?>"/>
                <div class="row">
                  <div class="input-field col s12">
<?php
if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id']))
  echo '<a class="waves-effect waves-light btn right btn-large green" id="btnEdit">Editar</a>';
else
  echo '<a class="waves-effect waves-light btn right btn-large" id="btnCreate">Cadastrar</a>';
?>

                  </div>
                </div>

              </form>
            </div>
          </div>
          <br><br>
        </div>

        <!--  Scripts-->
        <script src="../js/jquery-2.1.1.min.js"></script>
        <script src="../js/materialize.js"></script>
        <script src="../js/sweetalert.min.js"></script>
        <?php if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) { ?>
          <script src="../js/access_update.js"></script>
        <?php } else { ?>
          <script src="../js/access_create.js"></script>
        <?php } ?>

        </body>
        </html>
