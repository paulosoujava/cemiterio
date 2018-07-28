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

    <?php
    include_once '../assets/header.php';

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
        $ch1 = $row['background'];
        $ch2 = $row['is_admin'];
        $ch3 = $row['last_acess'];
      }
    }
    ?>

    <div class="container">

      <div class="section">
        <div class="container">
          <div class="row ">
            <div class="row">
              <a  href="index.php" class=" waves-effect waves-light "><i class="teal-text material-icons medium">home</i></a>

            </div>
            <br /> 
            <h3 >Configurações</h3>
            <br />

            <a class="btn-floating btn-large waves-effect waves-light teal right" id="save"><i class="material-icons">save</i></a>

            <table class=" highlight">

              <tbody>
                <tr>
                  <td>
                    <h5>Somente administrador cadastra novos acessos </h5>
                    <p>
                      <label>
                        <input type="checkbox" id="admin" 
                               <?php if (isset($ch2) && ($ch2 == 1)) echo 'checked="true"'; else'checked="false"'  ?> />
                        <span>Sim </span>
                      </label>
                    </p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Exibir background </h5>
                    <p>
                      <label>
                        <input type="checkbox" id="background"
                         <?php if (isset($ch2) && ($ch1 == 1)) echo 'checked="true"'; else'checked="false"'  ?> />
                        <span>Sim </span>
                      </label>
                    </p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Registrar ultimo acesso ao sistema </h5>
                    <p>
                      <label>
                        <input type="checkbox" id="acesso"
                               <?php if (isset($ch3) && ($ch3 == 1)) echo 'checked="true"'; else'checked="false"'  ?> />
                        <span>Sim </span>
                      </label>
                    </p>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <br><br>
    </div>

    <!--  Scripts-->
    <script src="../js/jquery-2.1.1.min.js"></script>
    <script src="../js/materialize.js"></script>
    <script src="../js/sweetalert.min.js"></script>
    <script src="../js/config.js"></script>

  </body>
</html>
