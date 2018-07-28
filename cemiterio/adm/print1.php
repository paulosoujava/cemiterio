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
    $sql = sprintf("SELECT * FROM dados_sepultado WHERE idSepultado = " . $_GET['id']);
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $cp1 = $row['cp_1'];
        $cp9 = $row['cp_9'];
        $cp17 = $row['cp_17'];
        $cp25 = $row['cp_25'];
        $cp33 = $row['cp_33'];
        $cp2 = $row['cp_2'];
        $cp10 = $row['cp_10'];
        $cp18 = $row['cp_18'];
        $cp26 = $row['cp_26'];
        $cp34 = $row['cp_34'];
        $cp3 = $row['cp_3'];
        $cp11 = $row['cp_11'];
        $cp19 = $row['cp_19'];
        $cp27 = $row['cp_27'];
        $cp35 = $row['cp_35'];
        $cp4 = $row['cp_4'];
        $cp12 = $row['cp_12'];
        $cp20 = $row['cp_20'];
        $cp28 = $row['cp_28'];
        $cp36 = $row['cp_36'];
        $cp5 = $row['cp_5'];
        $cp13 = $row['cp_13'];
        $cp21 = $row['cp_21'];
        $cp29 = $row['cp_29'];
        $cp37 = $row['cp_37'];
        $cp6 = $row['cp_6'];
        $cp14 = $row['cp_14'];
        $cp22 = $row['cp_22'];
        $cp30 = $row['cp_30'];
        $cp38 = $row['cp_38'];
        $cp7 = $row['cp_7'];
        $cp15 = $row['cp_15'];
        $cp23 = $row['cp_23'];
        $cp31 = $row['cp_31'];
        $cp39 = $row['data_create'];
        $cp8 = $row['cp_8'];
        $cp16 = $row['cp_16'];
        $cp24 = $row['cp_24'];
        $cp32 = $row['cp_32'];
        $cp40 = $row['data_update'];
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
        <th>Quadra<br /> $cp1 </th>
        <th>Número<br />  $cp2</th>
<tr>
        <td>
      <br />
      

      </td></tr>

      </tr>
      <tr>
        <td>
          Aos $cp3; dias do mês de $cp4 do ano de dois mil e $cp5 neste cemitério do Município de Florianópolis, 
          capital do Estado de Santa Catarina, me foi apresentado um cadáver acompanhado da seguinte certidão de óbito:
        </td>
      </tr>
      <tr>
        <td>
          $cp6 Registro Civil. Estado de Santa Catarina, município de $cp7 Óbito num.: $cp8 Oficial.
          Certifico que a(s) fl.(s)  $cp9 do livro num.:  $cp10 de registro de óbitos, foi feito hoje o assento de
        </td>
        </tr>
      <tr>
        <td>
          $cp11  falecido aos $cp12 dia de  $cp13 de 20 $cp14 às $cp15 horas, em  $cp16 do sexo $cp17 de cor 
          $cp18  de profissão $cp19 natural de $cp20 domiciliado e residente $cp21 com  $cp22 de idade. Estado civil
        </td>
        </tr>
      <tr>
        <td>
          $cp23 filho de  $cp24 .de profissão $cp25 ,natural de $cp26 e residente em $cp27 ,foi declarante  $cp28
          sendo atestado de óbito firmado pelo Dr.: $cp29 que deu, como causa da morte,  $cp30
        </td>
        </tr>
      <tr>
        <td>
          Observações:  $cp31
        </td>
        </tr>
      <tr>
        <td>
          Florianópolis, $cp32 de  $cp33 de 20 $cp34

        </td>
        </tr>
      <tr>
        <td>
          O referido cadáver foi sepultado neste cemitério, na sepultura num.: 
          $cp35 de  $cp36 Quadra $cp37
        </td>
        </tr>
      <tr>
        <td>
          O Administrador:<br />
          $cp38
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