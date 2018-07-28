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
        <td>Endereço:<br /> $cp1 </td>
          </tr>
      <tr>
        <td>Número:<br />  $cp2</td>
      <tr>
        <td>
          Cep: $cp3
        </td>
      </tr>
      <tr>
        <td>
          Bairro: $cp4
        </td>
        </tr>
        <tr>
        <td>
          Cidade:  $cp5  Estado : $cp6
        </td>
        </tr>
      <tr>
        <td>
          Telefone Fixo: $cp7
        </td>
        </tr>
      <tr>
        <td>
         Telefone Celular: $cp8
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