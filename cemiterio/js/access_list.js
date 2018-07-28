
$('.delete').click(function () {
  var $this = $(this);
  var id = $this.attr('data');

  swal({
    title: "Você tem Certeza?",
    text: "Uma vez deletado não haverá como recuperar os dados.",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
          .then((willDelete) => {
            if (willDelete) {
              mAjax(id);
            } else {
              swal("Ok, mantendo os dados!");
            }
          });

});
$('.btnAdmin').click(function(){
  swal({
  title: "Informações",
  text: "Somente o administrador pode cadastrar novos usuários ao sistema, o usuário de nivel basico só poderá cadastrar supultados.",
  icon: "info",
  button: "Ok, entendi!",
});
});



function mAjax(id) {

  var dados = "id=" + id;

  $.ajax({
    type: 'POST',
    dataType: 'json',
    url: '../php/Access_list.php',
    async: true,
    data: dados,
    success: function (response) {
      console.log(response.request_cod);
    }
  }).always(function (response) {
    if (response.code === 'ac_ok') {
      swal({
        title: "Deletado com sucesso",
        text: "Vamos atualizar a lista ok?!",
        icon: "success",
        
        dangerMode: true,
      })
              .then((willDelete) => {
                window.location.href = "http://localhost/cemiterio/adm/access_list.php";
              });

    } else if (response.code === 'ac_error') {
      swal("Ops!", "Falha nossa, contacte o programador deste sistema", "error");
    }

  });


}


