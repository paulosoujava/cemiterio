 $('#btnLogin').click(function() {
  var email = $('#email').val();
  var pass  = $('#password').val();
  if( email.length > 0 && pass.length > 0 ){
    mAjax(email, pass);
  }
  
 });
 
 function mAjax(email, pass){
   
   var dados = "email="+email+"&pass="+pass;
   $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'php/Login.php',
                async: true,
                data: dados,
                success: function(response) {
                    console.log(response.request_cod);
                }
            }).always(function(response) {
              if( response.code === 'success'){
                 window.location.href = "http://localhost/cemiterio/adm/";
              }else if(response.code === 'log_001'){
                 swal("Ops!", "Verifique seu e-mail/ senha, dados inválidos.", "info");
              }
        
    });
 
   
 }