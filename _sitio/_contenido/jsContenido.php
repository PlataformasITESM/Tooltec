<? 
header("Content-Type: text/javascript");

if ($fasd==433){?><script><? }?>
 
 
  $(function() {
	  
	  
 
	  
	
	$(document).on('click', '.menuMenu', function(){ 
	var este=this.id; 
	este=$('#'+este).data('id');
	
	$('html,body').animate({scrollTop:$('.'+este+'Div').offset().top-80}, 500);

});


 
 

	
$( ".bajaAcordeon" ).die().live("click", function() {
 
	  var esteId=$('#'+this.id).data('id');
      var esteElemento=$('#'+this.id).data('elemento');
	  
	 
	  $('#'+esteId+'_contenido').slideToggle();
		var flechita= $('#'+esteId+'_flecha').text();
	 
		if(flechita=="keyboard_arrow_up"){
			$('#'+esteId+'_flecha').text('keyboard_arrow_down');
		}else{
			
		 $('#'+esteId+'_flecha').text('keyboard_arrow_up');
		}
	
		 $('.acordeon_'+esteElemento+'_colapsa').each( function(){
		
				var colapsaNo=esteId+'_contenido';
				var colapsa=this.id+'_contenido';
					
				 
					if(colapsa!=colapsaNo){
 
							$('#'+colapsa).slideUp();
				 			$('#'+this.id+'_flecha').text('keyboard_arrow_down');
						
					}
						

			 
			 
		 
	 	 })
		
		
		
	});
	  
    });
$( window ).load(function() {
	
	  animacion();  
 
	   });
	   
	   function animacion() {
  
        $('.animacion').each( function(i){
            
            var bottom_of_object = $(this).offset().top + ($(this).outerHeight())/3;
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            

            if( bottom_of_window > bottom_of_object ){
                
		var queAnimo=$(this).data("animacion");	
		
		
	$(this).animateCss(queAnimo);		
	$(this).removeClass('animacion');

				
              
                    
            }
            
        }); 	
}

	
$(window).scroll( function(){
    
     animacion();  


    });
	   
$.fn.extend({
    animateCss: function (animationName) {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        $(this).addClass('animated ' + animationName).one(animationEnd, function() {
            $(this).removeClass('animated ' + animationName);
        });
    }
});	
function paralelo(){
	 $('.paralelo').each( function(){
		
		var moveFactor=$(this).data("moveFactor");
		
		if( moveFactor != null || moveFactor==undefined){moveFactor=20;}
		moveFactor=1/moveFactor
 
 
 		var alturaPadre=$('#'+this.id+'Parent').height();
		var estaAltura=$(this).height();
		var riel=estaAltura-alturaPadre;
		
	 
					var alturaY= $(window).scrollTop();
					if (alturaY>riel){alturaY=riel;}
					
  					var desplazamiento=(moveFactor*(alturaY/(moveFactor)) );
					
					
					
				 
					
					 
					 $(this).css( 'top','-'+desplazamiento+'px');
 
		 
		// $('#aqui').val(desplazamiento+" / "+alturaY);
	 })
	
}


$( window ).scroll(function() {
	paralelo();
}); 

 

 
 
<? if ($fasd==433){?></script><? }?>