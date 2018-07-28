
$('#btnEndereco').click(function () {
  var data = [];
  count = 0;
  for (var i = 1; i <= 8; i++) {
      if ($('#cp' + i).val() === '') {
        count += 1;
      } else {
        data['cp' + i] = $('#cp' + i).val();
      }
    }
  if (count !== 8)
    fase_1(data, $('#id').val());
  else
    swal("Ops!", "Pelo menos um campo tem que estar preenchido para o cadastro.", "info");
   
  console.log(count)
});
function fase_1(dados, id) {
  
  dados += "cp1=" + dados.cp1 +
          "&cp2=" + dados.cp2 + 
          "&cp3=" + dados.cp3 +
          "&cp4=" + dados.cp4 +
          "&cp5=" + dados.cp5 + "&" +
          "cp6=" + dados.cp6+
          "&cp7=" + dados.cp7 +
          "&cp8=" + dados.cp8 +"&id="+id ;

  console.log(dados);
  $.ajax({
    type: 'POST',
    dataType: 'json',
    url: '../php/Create_died_fase3.php',
    async: true,
    data: dados,
    success: function (response) {
      console.log(response.request_cod);
    }
  }).always(function (response) {
    if (response.code === 'ac_ok') {
    swal("Opa!", "Ação realizada com sucesso.", "success");
    } else if (response.code === 'ac_error') {
      swal("Ops!", "Falha nossa, contacte o programador deste sistema", "error");
    } else if (response.code === 'ac_exist') {
      swal("Ops!", "Quadra:  e numero  já cadastrados no sistema", "info");
    }

  });
}

