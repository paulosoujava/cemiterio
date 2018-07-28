$('#btnSepultado').click(function () {
  var data = [];
  flag = true;
  
  for (var i = 1; i <= 38; i++) {
    
      if ($('#cp_' + i).val() === '' && i !== 31) {
        console.log(i)
        alertShow('cp_' + i);
        flag = false;
        return;
      } else {
        data['cp_' + i] = $('#cp_' + i).val();

      }
    }
  
  if (flag)
    fase_1(data);

});
$('.btnSepultadoEditar').click(function () {
  
  var data = [];
  flag = true;
  for (var i = 1; i <= 38; i++) {
    if (i === 31) {
      data['cp_' + i] = $('#cp_' + i).val();
    } else {
      if ($('#cp_' + i).val() === '') {
        alertShow('cp_' + i);
        flag = false;
        return;
      } else {
        data['cp_' + i] = $('#cp_' + i).val();

      }
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
function fase_1(dados) {
  var dados;
  dados += "cp_1=" + dados.cp_1 + "&cp_2=" + dados.cp_2 + "&cp_3=" + dados.cp_3 + "&cp_4=" + dados.cp_4 + "&cp_5=" + dados.cp_5 + "&" +
          "cp_6=" + dados.cp_6 + "&cp_7=" + dados.cp_7 + "&cp_8=" + dados.cp_8 + "&cp_9=" + dados.cp_9 + "&cp_10=" + dados.cp_10 + "&" +
          "cp_11=" + dados.cp_11 + "&cp_12=" + dados.cp_12 + "&cp_13=" + dados.cp_13 + "&cp_14=" + dados.cp_14 + "&cp_15=" + dados.cp_15 + "&" +
          "cp_16=" + dados.cp_16 + "&cp_17=" + dados.cp_17 + "&cp_18=" + dados.cp_18 + "&cp_19=" + dados.cp_19 + "&cp_20=" + dados.cp_20 + "&" +
          "cp_21=" + dados.cp_21 + "&cp_22=" + dados.cp_22 + "&cp_23=" + dados.cp_23 + "&cp_24=" + dados.cp_24 + "&cp_25=" + dados.cp_25 + "&" +
          "cp_26=" + dados.cp_26 + "&cp_27=" + dados.cp_27 + "&cp_28=" + dados.cp_28 + "&cp_29=" + dados.cp_29 + "&cp_30=" + dados.cp_30 + "&cp_31=" + dados.cp_31 + "&" +
          "cp_32=" + dados.cp_32 + "&cp_33=" + dados.cp_33 + "&cp_34=" + dados.cp_34 + "&cp_35=" + dados.cp_35 + "&cp_36=" + dados.cp_36 + "&" +
          "cp_37=" + dados.cp_37 + "&cp_38=" + dados.cp_38;

  
  $.ajax({
    type: 'POST',
    dataType: 'json',
    url: '../php/Create_died.php',
    async: true,
    data: dados,
    success: function (response) {
      console.log(response.request_cod);
    }
  }).always(function (response) {
    if (response.code === 'ac_ok') {

      swal({
        title: "Opa",
        text: "Cadastro realizado com sucesso, cadastrar outro?",
        icon: "success",
        buttons: true,
        dangerMode: true,
        buttons:[ 'sim', 'não'],
      })
              .then((willDelete) => {
                if (willDelete) {
                    window.location.href = "http://localhost/cemiterio/adm/list_died.php";
                  
                } else {
                  window.location.href = "http://localhost/cemiterio/adm/create_died.php";
                }
              });




    } else if (response.code === 'ac_empty') {
      swal("Ops!", "Verifique todos os campos, não pode haver campo em branco", "info");
    } else if (response.code === 'ac_error') {
      swal("Ops!", "Falha nossa, contacte o programador deste sistema", "error");
    } else if (response.code === 'ac_exist') {
      swal("Ops!", "Quadra:  e numero  já cadastrados no sistema", "info");
    }

  });
}


//updates
function fase_1_up(dados, id) {
  
  console.log(dados)
  dados += "cp_1=" + dados.cp_1 + "&cp_2=" + dados.cp_2 + "&cp_3=" + dados.cp_3 + "&cp_4=" + dados.cp_4 + "&cp_5=" + dados.cp_5 + "&" +
          "cp_6=" + dados.cp_6 + "&cp_7=" + dados.cp_7 + "&cp_8=" + dados.cp_8 + "&cp_9=" + dados.cp_9 + "&cp_10=" + dados.cp_10 + "&" +
          "cp_11=" + dados.cp_11 + "&cp_12=" + dados.cp_12 + "&cp_13=" + dados.cp_13 + "&cp_14=" + dados.cp_14 + "&cp_15=" + dados.cp_15 + "&" +
          "cp_16=" + dados.cp_16 + "&cp_17=" + dados.cp_17 + "&cp_18=" + dados.cp_18 + "&cp_19=" + dados.cp_19 + "&cp_20=" + dados.cp_20 + "&" +
          "cp_21=" + dados.cp_21 + "&cp_22=" + dados.cp_22 + "&cp_23=" + dados.cp_23 + "&cp_24=" + dados.cp_24 + "&cp_25=" + dados.cp_25 + "&" +
          "cp_26=" + dados.cp_26 + "&cp_27=" + dados.cp_27 + "&cp_28=" + dados.cp_28 + "&cp_29=" + dados.cp_29 + "&cp_30=" + dados.cp_30 + "&cp_31=" + dados.cp_31 + "&" +
          "cp_32=" + dados.cp_32 + "&cp_33=" + dados.cp_33 + "&cp_34=" + dados.cp_34 + "&cp_35=" + dados.cp_35 + "&cp_36=" + dados.cp_36 + "&" +
          "cp_37=" + dados.cp_37 + "&cp_38=" + dados.cp_38+"&id="+id;

  
  $.ajax({
    type: 'POST',
    dataType: 'json',
    url: '../php/Update_died.php',
    async: true,
    data: dados,
    success: function (response) {
      console.log(response.request_cod);
    }
  }).always(function (response) {
    if (response.code === 'ac_ok') {

      swal("Opa!", "Dados atualizado com sucesso.", "success");

    } else if (response.code === 'ac_empty') {
      swal("Ops!", "Verifique todos os campos, não pode haver campo em branco", "info");
    } else if (response.code === 'ac_error') {
      swal("Ops!", "Falha nossa, contacte o programador deste sistema", "error");
    } else if (response.code === 'ac_exist') {
      swal("Ops!", "Quadra:  e numero  já cadastrados no sistema", "info");
    }

  });
}