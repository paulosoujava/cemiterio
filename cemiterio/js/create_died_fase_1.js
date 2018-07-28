
$('#btnSepultamento').click(function () {

  var data = [];
  flag = true;
  for (var i = 1; i <= 9; i++) {
      if ($('#f1_cp' + i).val() === '') {
        alertShow('f1_cp' + i);
        flag = false;
        return;

      } else {
        data['f1_cp' + i] = $('#f1_cp' + i).val();

      }
    }
  if (flag)
    fase_1(data, $('#id').val());
});

$('.btnSepultamentoEditar').click(function () {
  
  var data = [];
  flag = true;
  for (var i = 1; i <= 9; i++) {
      if ($('#f1_cp' + i).val() === '') {
        alertShow('f1_cp' + i);
        flag = false;
        return;

      } else {
        data['f1_cp' + i] = $('#f1_cp' + i).val();

      }
    }
  
  if (flag)
    fase_1_up(data, $('#id').val());
});



function alertShow(id) {
  swal("Ops! , Por favor não deixe campos em branco.")
          .then(() => {
            $("#" + id).focus();
          });
}
function fase_1(dados, id) {
  
  dados += "f1_cp1=" + dados.f1_cp1 +
          "&f1_cp2=" + dados.f1_cp2 + 
          "&f1_cp3=" + dados.f1_cp3 +
          "&f1_cp4=" + dados.f1_cp4 +
          "&f1_cp5=" + dados.f1_cp5 + "&" +
          "f1_cp6=" + dados.f1_cp6+
          "&f1_cp7=" + dados.f1_cp7 +
          "&f1_cp8=" + dados.f1_cp8 + 
          "&f1_cp9=" + dados.f1_cp9+"&id="+id ;

  console.log(dados);
  $.ajax({
    type: 'POST',
    dataType: 'json',
    url: '../php/Create_died_fase2.php',
    async: true,
    data: dados,
    success: function (response) {
      console.log(response.request_cod);
    }
  }).always(function (response) {
    if (response.code === 'ac_ok') {
    swal("Opa!", "Ação realizada com sucesso.", "success");
    } else if (response.code === 'ac_empty') {
      swal("Ops!", "Verifique todos os campos, não pode haver campo em branco", "info");
    } else if (response.code === 'ac_error') {
      swal("Ops!", "Falha nossa, contacte o programador deste sistema", "error");
    } else if (response.code === 'ac_exist') {
      swal("Ops!", "Quadra:  e numero  já cadastrados no sistema", "info");
    }

  });
}

