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
    
    <?php include_once '../assets/header.php'; 
    
    if( isset($_GET['id']) && is_numeric($_GET[ 'id'])){
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
      $sql = sprintf("SELECT * FROM dados_sepultado WHERE idSepultado = ".$_GET['id']);
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $cp1 = $row['cp_1'];$cp9 = $row['cp_9'];$cp17 = $row['cp_17'];$cp25 = $row['cp_25'];$cp33 = $row['cp_33'];
          $cp2 = $row['cp_2'];$cp10 = $row['cp_10'];$cp18 = $row['cp_18'];$cp26 = $row['cp_26'];$cp34 = $row['cp_34'];
          $cp3 = $row['cp_3'];$cp11 = $row['cp_11'];$cp19 = $row['cp_19'];$cp27 = $row['cp_27'];$cp35 = $row['cp_35'];
          $cp4 = $row['cp_4'];$cp12 = $row['cp_12'];$cp20 = $row['cp_20'];$cp28 = $row['cp_28'];$cp36 = $row['cp_36'];
          $cp5 = $row['cp_5'];$cp13 = $row['cp_13'];$cp21 = $row['cp_21'];$cp29 = $row['cp_29'];$cp37 = $row['cp_37'];
          $cp6 = $row['cp_6'];$cp14 = $row['cp_14'];$cp22 = $row['cp_22'];$cp30 = $row['cp_30'];$cp38 = $row['cp_38'];
          $cp7 = $row['cp_7'];$cp15 = $row['cp_15'];$cp23 = $row['cp_23'];$cp31 = $row['cp_31'];$cp39 = $row['data_create'];
          $cp8 = $row['cp_8'];$cp16 = $row['cp_16'];$cp24 = $row['cp_24'];$cp32 = $row['cp_32'];$cp40 = $row['data_update'];
          
        }
      
      }
    }
    ?>
    <div class="container">
      <div class="row">
        <div id="__sepultado" class="col s12">
          <div class="row">
            <a  href="index.php" class=" waves-effect waves-light "><i class="teal-text material-icons medium">home</i></a>
          </div>
          <br /> 
          <br /><br />
          <h3>Dados Sepultado</h3>
          <br /><br />
          <div class="row" style="font-size: 20px;">
            <a href="list_died.php" class=" waves-effect waves-light right "><i class="teal-text material-icons medium">arrow_back</i></a>
            
            <div class="col s12">
              <div class="col s4">
                Quadra  <input placeholder="_______" 
                               value="<?php if( isset($cp1)) echo $cp1; ?>"
                               id="cp_1" type="text"  style="outline: 0; width: 120px; height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray; "  >
              </div>

              <div class="col s4 right">
                Número  <input placeholder="_______" 
                               value="<?php if( isset($cp2)) echo $cp2; ?>"
                               id="cp_2" type="text"  style="outline: 0; width: 120px; height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray; " >
              </div>

            </div>
          </div>

          <div class="col s12" style="margin-top: 50px">
            Aos 
            <input placeholder="_____" id="cp_3"
                   value="<?php if( isset($cp3)) echo $cp3; ?>"
                   type="text"  style="outline: 0; width: 120px; height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray; " >

            dias do mês de
            <input placeholder="_____" id="cp_4"
                   value="<?php if( isset($cp4)) echo $cp4; ?>"
                   type="text"  style="width: 120px ; height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray;" >

            do ano de dois mil e 
            <input placeholder="_____" id="cp_5"
                   value="<?php if( isset($cp5)) echo $cp5; ?>"
                   type="text"  style="width: 120px; height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray;" >
            neste cemitério do Município de Florianópolis, capital do Estado de Santa Catarina, me foi apresentado um cadáver acompanhado da seguinte certidão de óbito:
            <input placeholder="_____" id="cp_6" 
                   value="<?php if( isset($cp6)) echo $cp6; ?>"
                   type="text"  style="width: 120px ;height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray;" >

            Registro Civil. Estado de Santa Catarina, município de 
            <input placeholder="_____" id="cp_7" 
                   value="<?php if( isset($cp7)) echo $cp7; ?>"
                   type="text"  style="width: 220px ;height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray;" > 

            <br />Óbito num.:
            <input placeholder="_____" id="cp_8"
                   value="<?php if( isset($cp8)) echo $cp8; ?>"
                   type="text"  style="width: 120px;height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray;" > 

            Oficial. Certifico que a(s) fl.(s)
            <input placeholder="_____" id="cp_9"
                   value="<?php if( isset($cp9)) echo $cp9; ?>"
                   type="text"  style="width: 120px;height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray;" >

            do livro num.: 
            <input placeholder="_____" id="cp_10" 
                   value="<?php if( isset($cp10)) echo $cp10; ?>"
                   type="text"  style="width: 120px ;height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray;" >, 

            de registro de óbitos, foi feito hoje o assento de
            <input placeholder="_____" id="cp_11" 
                   value="<?php if( isset($cp11)) echo $cp11; ?>"
                   type="text"  style="width: 120px ; height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray;" >,

            falecido aos
            <input placeholder="_____" id="cp_12" 
                   value="<?php if( isset($cp12)) echo $cp12; ?>"
                   type="text"  style="width: 120px ;height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray;" > 
            dia de
            <input placeholder="_____" id="cp_13"
                   value="<?php if( isset($cp13)) echo $cp13; ?>"
                   type="text"  style="width: 120px ;height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray;" > 

            de 20
            <input placeholder="_____" id="cp_14"
                   value="<?php if( isset($cp14)) echo $cp14; ?>"
                   type="text"  style="width: 20px;height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray;">, 

            às
            <input placeholder="_____" id="cp_15"
                   value="<?php if( isset($cp15)) echo $cp15; ?>"
                   type="text"  style="width: 120px;height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray;" > 

            horas, em
            <input placeholder="_____" id="cp_16"
                   value="<?php if( isset($cp16)) echo $cp16; ?>"
                   type="text"  style="width: 120px;height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray;" >, 

            do sexo
            <input placeholder="_____" id="cp_17" 
                   value="<?php if( isset($cp17)) echo $cp17; ?>"
                   type="text"  style="width: 120px;height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray;" >, 

            de cor 
            <input placeholder="_____" id="cp_18"
                   value="<?php if( isset($cp18)) echo $cp18; ?>"
                   type="text"  style="width: 120px;height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray;" >, 

            de profissão
            <input placeholder="_____" id="cp_19"
                   value="<?php if( isset($cp19)) echo $cp19; ?>"
                   type="text"  style="width: 120px; height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray;" >,
            natural de
            <input placeholder="_____" id="cp_20"
                   value="<?php if( isset($cp20)) echo $cp20; ?>"accept=""type="text"  style="width: 120px; height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray;" >
            domiciliado e residente
            <input placeholder="_____" id="cp_21" 
                   value="<?php if( isset($cp21)) echo $cp21; ?>"
                   type="text"  style="width: 120px;height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray;" >, 
            com
            <input placeholder="_____" id="cp_22" 
                   value="<?php if( isset($cp22)) echo $cp22; ?>"
                   type="text"  style="width: 120px; height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray; " > 

            de idade. Estado civil
            <input placeholder="_____" id="cp_23"
                   value="<?php if( isset($cp23)) echo $cp23; ?>"
                   type="text"  style="width: 120px; height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray; " >, 
            filho de 
            <input placeholder="_____" id="cp_24"
                   value="<?php if( isset($cp24)) echo $cp24; ?>"
                   type="text"  style="width: 120px;height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray;" >

            .de profissão
            <input placeholder="_____" id="cp_25" 
                   value="<?php if( isset($cp25)) echo $cp25; ?>"
                   type="text"  style="width: 120px;height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray;" >

            ,natural de
            <input placeholder="_____" id="cp_26"
                   value="<?php if( isset($cp26)) echo $cp26; ?>"
                   type="text"  style="width: 120px; height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray;" >

            e residente em
            <input placeholder="_____" id="cp_27"
                   value="<?php if( isset($cp27)) echo $cp27; ?>"
                   type="text"  style="width: 120px;height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray;" >

            ,foi declarante 
            <input placeholder="_____" id="cp_28"
                   value="<?php if( isset($cp28)) echo $cp28; ?>"
                   type="text"  style="width: 120px;height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray;" >,

            sendo atestado de óbito firmado pelo Dr.:
            <input placeholder="_____" id="cp_29" 
                   value="<?php if( isset($cp29)) echo $cp29; ?>"
                   type="text"  style="width: 120px;height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray;" > 

            que deu, como causa da morte, 
            <input placeholder="_____" id="cp_30" 
                   value="<?php if( isset($cp30)) echo $cp30; ?>"
                   type="text"  style="width: 120px; height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray;" > 

            <br />
            <br />Observações:<br />
            <div class="row">
              <div class="input-field col s12">
                <textarea id="cp_31"  placeholder="_____" class="materialize-textarea" style="margin-bottom: -40px; width: 420px; height: 80px; background: #fff; padding: 5px; border-bottom:0px solid gray; " ><?php if( isset($cp31)) echo $cp31; ?></textarea>
              </div>
            </div>
            <br /><br />
            Florianópolis,
            <input placeholder="_____" id="cp_32"
                   value="<?php if( isset($cp32)) echo $cp32; ?>"
                   type="text"  style="width: 80px ;height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray;" >

            de <input placeholder="_____" id="cp_33"
                      value="<?php if( isset($cp33)) echo $cp33; ?>"
                      type="text"  style="width: 120px;height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray;" >, 

            de 20 <input placeholder="_____" id="cp_34"
                         value="<?php if( isset($cp34)) echo $cp34; ?>"
                         type="text"  style="width: 40px;height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray;" ><br />

            <br />O referido cadáver foi sepultado neste cemitério, na sepultura num.: 
            <input placeholder="_____" id="cp_35"
                   value="<?php if( isset($cp35)) echo $cp35; ?>"
                   type="text"  style="width: 120px; height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray;" >

            de <input placeholder="_____" id="cp_36"
                      value="<?php if( isset($cp36)) echo $cp36; ?>"
                      type="text"  style="width: 70px;height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray;" >  

            Quadra <input placeholder="_____" id="cp_37"
                          value="<?php if( isset($cp37)) echo $cp37; ?>"
                          type="text"  style="width: 120px;height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray;" ><br /><br />

            O Administrador<br />
            <?php if( isset($cp38))  {?>
              <input placeholder="_____" 
                      value="<?php if( isset($cp38)) echo $cp38; ?>"
                     id="cp_38" type="text"  style="width: 420px; height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray; " >
            <?php }else{ ?>
            <input placeholder="_____" value="<?= $_SESSION['NAME'] . " " . $_SESSION['LAST_NAME']; ?>" id="cp_38" type="text"  style="width: 420px; height: 20px; background: #fff; padding: 5px; border-bottom:0px solid gray; " >
            <?php } ?>
            <br />
            <?php if( isset($_GET['id']) && is_numeric($_GET[ 'id'])){ ?>
            <input type="hidden" value="<?= $_GET[ 'id'] ?>" name="id" id="id" />
            <a class="waves-effect waves-light btn  btn-large right green btnSepultadoEditar" >Editar</a>
            <?php }else{?>
            <a class="waves-effect waves-light btn  btn-large right" id="btnSepultado" >Salvar</a>
            <?php }?>
          </div> 
        </div>
      </div>
    </div>

    <!--  Scripts-->
    <script src="../js/jquery-2.1.1.min.js"></script>
    <script src="../js/materialize.js"></script>
    <script src="../js/sweetalert.min.js"></script>
    <script src="../js/create_died.js"></script>
  </body>
</html>
