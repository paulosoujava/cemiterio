$('#btnEdit').click(function () {
  var id = $('#id').val();
  var email = $('#email').val();
  var pass = $('#password').val();
  var name = $('#first_name').val();
  var lastname = $('#last_name').val();
  var ddd = $('#ddd').val();
  var phone = $('#phone').val();

  var flag = false;

  if (name.length <= 0) {
    flag = true;
    alertShow("primeiro nome",'first_name');
  
  } else if (lastname.length <= 0) {
    flag = true;
     alertShow("último nome",'last_name');
     
  } else if (email.length <= 0) {
      flag = true;
      alertShow("email",'email');
  
  } else if (ddd.length <= 0) {
    flag = true;
    alertShow("ddd",'ddd');
    
  } else if ( phone.length <= 0) {
    flag = true;
    alertShow("num. celular",'phone');
    
  }

  if (!flag) {
    mAjax(email, pass, name, lastname, ddd, phone,id);
  }
});

function alertShow(msg, id) {
  swal("Ops! , Verifique o campo: " + msg + " ele não pode estar vazio.")
  .then(() => {
    $( "#"+id ).focus();
  });
}
function mAjax(email, pass, name, lastname, ddd, phone, id) {

  var dados = "email=" + email +
              "&pass=" + pass +
              "&name=" + name +
              "&lastname=" + lastname +
              "&ddd=" + ddd +
              "&id=" + id +
              "&numero="+phone;
  
  
          $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '../php/Access_update.php',
            async: true,
            data: dados,
            success: function (response) {
              console.log(response.request_cod);
            }
          }).always(function (response) {
    if (response.code === 'ac_ok') {
      swal("Opa", "Usuário: "+ name+" "+lastname+" alterado com sucesso.", "success");
    } else if (response.code === 'ac_empty') {
      swal("Ops!", "Verifique todos os campos, não pode haver campo em branco", "info");
    }else if (response.code === 'ac_error') {
      swal("Ops!", "Falha nossa, contacte o programador deste sistema", "error");
    }else if (response.code === 'ac_exist') {
      swal("Ops!", "Esste usuário "+email+" já está cadastrado no sistema", "error");
    }

  });


}
