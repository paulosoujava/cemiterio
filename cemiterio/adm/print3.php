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
  <?php
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
        $cp9 = $row['cp_9'];
        $cp2 = $row['cp_2'];
        $cp3 = $row['cp_3'];
        $cp4 = $row['cp_4'];
        $cp5 = $row['cp_5'];
        $cp6 = $row['cp_6'];
        $cp7 = $row['cp_7'];
       $cp8 = $row['cp_8'];
        
      }
    }
  }
  ?>
  <div class="container">
    <div id="print">
  <?php echo" 
    <table>
    <thead>
      <tr>
        <th>Aforamento:<br /> $cp1 </th>
        <th>Quadra:<br />  $cp2</th>

      </tr>
      <tr>
        <td>
      
      <br />
      </td></tr>

      <tr>
        <td>
          Sepultura: $cp3
        </td>
      </tr>
      <tr>
        <td>
          Tipo Aforamento: $cp4
        </td>
        </tr>
      <tr>
        <td>
          Inicio ocupação: $cp5
        </td>
        </tr>
      <tr>
        <td>
         Prazo: $cp6
        </td>
        </tr>
      <tr>
        <td>
         Término: $cp7
        </td>
        </tr>
      <tr>
        <td>
          Valor do aforamento: $cp8

        </td>
        </tr>
      <tr>
        <td>
         livro: $cp9
        </td>
        </tr>
      
    </thead>

    <tbody>
  </table>";?>
      </div>
    <script>
function cont(){
   var conteudo = document.getElementById('print').innerHTML;
   tela_impressao = window.open('about:blank');
   tela_impressao.document.write(conteudo);
   tela_impressao.window.print();
   tela_impressao.window.close();
}
function goBack() {
    window.history.back();
}
</script>
    
    <a onclick="cont();" class="waves-effect waves-light btn"><i class="material-icons left">local_printshop</i>Imprimir</a>

    <a onclick="goBack();" class="waves-effect waves-light btn blue"><i class="material-icons left">replay</i>Voltar</a>

</div>









</html>       