$('.ch').click(function () {
  var $this = $(this);
  var id = $this.attr('value');

  
    if(id === '1'){
      
          $("#container_1").css("display", "inherit");
          $("#container_2").css("display", "none");
          $("#container_3").css("display", "none");
        }
    if(id === '2'){
          $("#container_2").css("display", "inherit");
          $("#container_1").css("display", "none");
          $("#container_3").css("display", "none");
        }
        
    if(id === '3'){
          $("#container_3").css("display", "inherit");
          $("#container_2").css("display", "none");
          $("#container_1").css("display", "none");
        }
  

});

