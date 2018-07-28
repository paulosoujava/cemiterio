(function($){
  $(function(){

   $('.sidenav').sidenav();
   
   $('.modal').modal();	
   $('#click_search').click(function() {
	 swal("Good job!", "You clicked the button!", "success");
    });
    $('#click_print').click(function() {
	var conteudo = document.getElementById('test1').innerHTML, tela_impressao = window.open('about:blank');

	tela_impressao.document.write(conteudo);
	tela_impressao.window.print();
	tela_impressao.window.close();
    });

  }); // end of document ready
})(jQuery); // end of jQuery name space
