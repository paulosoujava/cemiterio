$(document).ready(function() {
  $('#save').click(function () {
    var chAdm = $('#admin').is(':checked');
    var chBac = $('#background').is(':checked');
    var chAc = $('#acesso').is(':checked');
    
    mAjax(chAdm, chBac, chAc);
  });
    
    
});


function mAjax(cAd, cB, cAcc) {

  var dados = "access=" + cAd +
              "&background=" + cB +
              "&lastaccess=" + cAcc;
          $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '../php/Config.php',
            async: true,
            data: dados,
            success: function (response) {
              console.log(response.request_cod);
            }
          }).always(function (response) {
    if (response.code === 'ac_ok') {
      swal("Opa", "Configurações alteradas.", "success");
    }else if (response.code === 'ac_exist') {
      swal("Ops!", "Falha nossa, contacte o programador deste sistema", "error");
    }

  });


}
