<? 
header("Content-Type: text/javascript");
include_once "../../sesion/arriba.php";
if ($fasd==433){?><script><? }?>

function llevaImagen(va,cual){

$('#llevaImagen'+cual).hide();	
if(va=="1"){
$('#llevaImagen'+cual).show();	
}
	
}

function cambiaColor(cual){
	
	if(cual==null){cual="";}
	$('#transparente'+cual).attr('checked', false);
	
}

	function columnasShow(colas){
	$('.columnasDivs').hide();
	$('.columnasDivs').each(function() {
		var este=$(this).data('id');
	    
		if(este<=colas){
			
			$(this).show();
		}
		
	});
	
}

function aleatorio()
{
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for( var i=0; i < 5; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}



$(function() {

	
alto100();

var sortis=$('#sortables').val();

    $( sortis ).sortable({
      connectWith: ".conectados",
	  placeholder: "placeholder",
	  handle: ".dragin",
	  tolerance: "pointer",
	  forceHelperSize: true,
	  
	    start : function(e, ui){
	   var moviendo = ui.item.attr("id");
	 	  $('#'+moviendo).width('50px').height('50px');
		  $("#"+moviendo+"_controles").hide();
	  },
	  
	   stop : function(e, ui){
	   var moviendo = ui.item.attr("id");
	 	 		    $("#"+moviendo+"_controles").show();
	  },
	   
	  update : function(e, ui){
		var orden="";	
		 
		 
		
		 	var este=$(e.target).attr("id");
			var seccion=$('#seccion').val();
			orden=$('#'+este).sortable('toArray').toString();
			 
		 	$.ajax({
				
				type: "POST",
				url: "<?=$url?>/_contenido/reordenElementos.php",
				data: "seccion="+seccion+"&padre="+este+"&orden="+orden,
				success: 
				function(msg){				
				 // $("#sub").html(msg);
			  }
	 		});
		  
		 
        }
	   
    }).disableSelection();
  } );
  
  function alto100(){
	var altin=$(window).height()-150;
	$('.ventana').height(altin+'px');
	 
	  
  }



$(function() {
	
	

	
	
    $('.ponible').draggable({
        revert: "invalid"
    });
    $('.drop').droppable({
		hoverClass: "dropHover",
	 
        drop: function(e, ui) {
			
				
			 var donde=$(ui.draggable).attr("id");
			 var padre=$(e.target).attr("id");
		 
		  
		 if ( $('#'+donde ).hasClass( "iconoCont" ) ) {
 
				elementoTipo(donde,padre,'');
		  }
			 
        }
    });
	
	
	 $('.posicionable').draggable({
        revert: "invalid"
    });
   
	
	

});


function elementoTipo(donde,padre,elemento){
 
	var seccion=$('#seccion').val();
	var d=$('#d').val();
	$.ajax({
    type: "POST",
    url: "<?=$url?>/_contenido/"+donde+".php",
    data: "d="+d+"&seccion="+seccion+"&padre="+padre+"&elemento="+elemento,
    success: 
    function(msg){
		
		var opa=0.5;
		if(donde=="acomodo"){opa=1;}
		$('.elementosPonibles').css('opacity',opa);
 
		$("#"+donde).css({'top':'','left':''});

	 $("#sub").html(msg);
	
 	 }
     	 });

		
	}
	
/*
function elementoPosicion(donde,padre){
var seccion=$('#seccion').val();
	var d=$('#d').val();
	$.ajax({
    type: "POST",
    url: "<?=$url?>/_contenido/elementoPosicion.php",
    data: "d="+d+"&seccion="+seccion+"&donde="+donde+"&padre="+padre,
    success: 
    function(msg){
		$("#sub").html(msg);
 	 }
     	 });

		
	}
*/



$(function() {
	
$(window).scroll(function () {
 

     var scrollpos = $(window).scrollTop();
  if (scrollpos >= 160) {

      $('.elementosPonibles').css( {
        "top" : "0",
        "position": "fixed",
		  "zIndex":"99999"
      });
	 
 
  } else {
	  
    $('.elementosPonibles').css( {
        "position": "relative",
		"float":"left"
        
      });
	 
    
  }


});

 

$( "#actuales" ).sortable({
	delay:300,
		 cursor: 'move',
		 placeholder: "placeholder100",
  		  handle: ".draginC",
		     update : function(event, ui){
          var orden=$('#actuales').sortable('toArray').toString();
		 
		  $('#orden').val(orden);
  			var seccion=$('#seccion').val();
			var tab=$('#tab').val();
		 	$.ajax({
				
				type: "POST",
				url: "<?=$url?>/_contenido/reorden.php",
				data: "seccion="+seccion+"&orden="+orden,
				success: 
				function(msg){				
				//$("#aqui").html(msg);
			  }
	 		});
		 
        }
		
		
		});
        $( "#actuales" ).disableSelection();

 
			
			
			//forma
			
jQuery.ajaxSetup({
  beforeSend: function() {
 $('#load').show();
   //$('#sub').hide();
  
  $('.botonEnviar').hide();
  },

  complete: function(){

  $('#load').hide();
   //$('#sub').show();
    $('.botonEnviar').show();
  },

  success: function() {}
		});
		
		
	  

 
});

function eliminarE(mata){
	$('#elemento_'+mata).hide();
	var seccion=$('#seccion').val();	
	var tab=$('#tab').val();	
	$('#cont_'+seccion).hide();
	$.ajax({
    type: "POST",
    url: "<?=$url?>/_contenido/mata.php",
     data: "seccion="+seccion+"&elemento="+mata,
    success: 
    function(msg){
	//$("#sub").html(msg);
 	 }
     	 });
         	}




 
/* acordeon */
 
function cambiaTitulo(cual){
	alert('aa');
	$('#'+cambiaTitulo+'_titulo').html('hola');
	
}
function agregaOpcion(){
	
var va = parseInt($('#va').val());
var id='v'+aleatorio();
va=va+1;	
$('#va').val(va);
	
var apenda='<div id="acordeon'+id+'" style="width:100%; margin-bottom:10px; float:left;" class="acordeonAcordeon" data-id="acordeon'+id+'">'+
'<div  class="acordeonTitulo">'+
'<div  class="tableCell padd  material-icons mueve" style="width:30px; cursor:pointer;">open_with</div>'+
'<div class="tableCell padd">'+
'Título '+va+
'</div>'+
'<div id="acordeon'+id+'_flecha" data-id="acordeon'+id+'" class="tableCell padd  material-icons bajaAcordeon" style="width:30px; cursor:pointer;">keyboard_arrow_up</div>'+
'<div id="acordeon'+id+'_flecha" data-id="acordeon'+id+'" class="tableCell padd  material-icons borra" style="width:30px; cursor:pointer;">clear</div>'+
'</div>'+
'<div id="acordeon'+id+'_bloque" style="width:100%; float:left; display:none;">'+
'<div class="clear10"></div>'+
 '<div class="formaB">'+
	'<div class="formaT">Título</div>'+
    '<div class="formaC">'+
    '<textarea id="titulo'+id+'" name="acordeon'+id+'_titulo" class="textoEdit"> </textarea>'+
	'</div>'+
'</div>'+
'<div class="formaB">'+
'<div class="formaT">Color de fondo</div>'+
 '<div class="formaC">'+
  '<input type="color" id="colorTitulo'+id+'" name="acordeon'+id+'_colorTitulo" class=" "  value="#FFFFFF" onChange="cambiaColor(\'Titulo'+id+'\');"/> '+
   '<div class="clear"></div>'+
    '<input type="checkbox" checked name="acordeon'+id+'_transparenteTitulo" id="transparenteTitulo'+id+'"> Transparente'+
	'</div>'+
'</div>'+
'<div class="formaB">'+
	'<div class="formaT">Texto</div>'+
    '<div class="formaC">'+
    '<textarea id="texto'+id+'" name="acordeon'+id+'_texto" class="textoEdit"></textarea>'+
	'</div>'+
'</div>'+
'<div class="formaB">'+
	'<div class="formaT">Color de fondo</div>'+
    '<div class="formaC">'+
    '<input type="color" id="colorTexto'+id+'" name="acordeon'+id+'_colorTexto" class=" "  value="#ffffff" onChange="cambiaColor(\'Texto'+id+'\');"/> '+
    '<div class="clear"></div>'+
    '<input type="checkbox" checked name="acordeon'+id+'_transparenteTexto" id="transparenteTexto'+id+'"> Transparente'+
	'</div>'+
	'</div>'+
'</div>'+
 '</div>';
	
	
	$('#nuevasOpciones').before(apenda);
	CKEDITOR.replace( 'titulo'+id );
	CKEDITOR.replace( 'texto'+id );
	recargaSelects();
}
$( ".selectrones" ).live("change", function() {
recargaSelects();
});
$( ".borra" ).live("click", function() {
	var borra=$(this).data("id")
	$('#'+borra).remove();
recargaSelects();
});



function recargaSelects() {
	
	var opcionesOrdenes = new Array();
	$(".acordeonAcordeon").each(function() {
		
		var este=$(this).data("id")
			opcionesOrdenes.push(este);
		
		var nuevo=opcionesOrdenes.join(',');
		$('#orden').val(nuevo);
    	
	});
	
}
 
 
$( ".bajaAcordeon" ).die().live("click", function() {
 
	  var esteId=$('#'+this.id).data('id');
	  $('#'+esteId+'_bloque').slideToggle();
		var flechita= $('#'+esteId+'_flecha').text();
	 
		if(flechita=="keyboard_arrow_up"){
			$('#'+esteId+'_flecha').text('keyboard_arrow_down');
		}else{
			
		 $('#'+esteId+'_flecha').text('keyboard_arrow_up');
		}
	});
 
//reorden
 
 
function acordeonSorta(){
	
 
         $( "#losAcordeones" ).sortable({
			 
     	  handle: '.mueve',
		 cursor: 'move',
		   placeholder: 'placeholder',
	     update : function(event, ui){
         var orden=$('#losAcordeones').sortable('toArray').toString();
		  $('#orden').val(orden);
		 
		  
        }
		
		
		});
 	

}
 
 	
<? if ($fasd==433){?></script><? }?>