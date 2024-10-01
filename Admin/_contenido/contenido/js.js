
function llevaImagen(va,cual){

$('#llevaImagen'+cual).hide();	
if(va=="1"){
$('#llevaImagen'+cual).show();	
}
	
}



function agregaVersion(valor){

	$.ajax({
    type: "POST",
    url: "versiones.php",
    data: "laseccion="+valor,
    success: 
    function(msg){

var enca='<div class="elementosTitulos"><div class="div100 titulosB textAlignCenter">VERSIONES</div></div>'+
'<div onClick="closeAlertElement();" class="close">X</div>';
var foots='<div class="elementosFooter"><div onclick="mandaF();" class="elementosBotonGuardar">Crear nueva versión</div></div>';

	 $('#granAlerta').fadeIn();
	 $('#alertaContent').append(enca).removeClass('div100 div50A').addClass('div50A');
	  $('#alertaContent').append(foots);

	 $("#elementosAqui").append(msg);
	
 	 }
     	 });


}

$(function() {


//los grids
var sortisG=$('#sortableGrids').val();
    $( sortisG ).sortable({
      connectWith: ".contectadosGrid",
	  placeholder: "placeholder",
	  handle: ".draginG",
	  tolerance: "pointer",
	  forceHelperSize: true,
	  
	    start : function(e, ui){
	   var moviendo = ui.item.attr("id");
	  $("#"+moviendo+"_controles").hide();
	  },
	  
	   stop : function(e, ui){
	   var moviendo = ui.item.attr("id");
	 	 		    $("#"+moviendo+"_controles").show();
	  },
	   
	  update : function(e, ui){
		var orden="";	
		 
		
			var emp=$('#e').val();
		 	var este=$(e.target).attr("id");
			var seccion=$('#seccion').val();
			
			orden=$('#'+este).sortable('toArray').toString();
			$.ajax({
				
				type: "POST",
				url: "reordenGrids.php",
				data: "seccion="+seccion+"&padre="+este+"&orden="+orden,
				success: 
				function(msg){				
				  $("#aqui").html(msg);
			  }
	 		});
		  
		 
        }
	   
    }).disableSelection();


//los elementos
var sortis=$('#sortables').val();

    $( sortis ).sortable({
      connectWith: ".conectados",
	  placeholder: "placeholder",
	  handle: ".draginE",
	  tolerance: "pointer",
	  forceHelperSize: true,
	  
	    start : function(e, ui){
	   var moviendo = ui.item.attr("id");
	 	  
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
				url: "reordenElementos.php",
				data: "seccion="+seccion+"&padre="+este+"&orden="+orden,
				success: 
				function(msg){				
				  $("#aqui").html(msg);
			  }
	 		});
		  
		 
        }
	   
    }).disableSelection();

	

	//botones
	
$('.ponible').draggable({
        revert: "invalid",
		
helper: 'clone',
    });
$('.drop').droppable({

	
	accept:'.ponible',
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
	var e=$('#e').val();
	tipoTit="";
	var divo="div100";
	if(donde=="cuadricula"){tipoTit="Bloque"; divo="div50A";}
	else if(donde=="grid"){tipoTit="Columnas";}
	else if(donde=="texto"){tipoTit="Texto"; divo="div50A";}
	else if(donde=="eventosCont"){tipoTit="Eventos"; divo="div50A";}
	else if(donde=="mediahubCont"){tipoTit="MediaHub"; divo="div50A";}
	else if(donde=="video"){tipoTit="Video"; divo="div50A";}
	else if(donde=="titulo"){tipoTit="Título"; divo="div50A";}
	else if(donde=="divisor"){tipoTit="Divisor"; divo="div50A";}
	else if(donde=="codigo"){tipoTit="Código HTML"; divo="div100";}
	else if(donde=="img"){tipoTit="Imagen"; divo="div50A";}
	else if(donde=="registro"){tipoTit="Registro"; divo="div50A";}
	else if(donde=="textoImagen"){tipoTit="Imagen y Texto "; divo="div50A";}
	else if(donde=="acordeon"){tipoTit="Acordeón "; divo="div100";}
	else if(donde=="galeria"){tipoTit="Galería "; divo="div100";}
	else if(donde=="galeria"){tipoTit="Galería "; divo="div100";}
	
	$.ajax({
    type: "POST",
    url: donde+".php",
    data: "e="+e+"&d="+d+"&seccion="+seccion+"&padre="+padre+"&elemento="+elemento,
    success: 
    function(msg){
		
		 
		 
		 
 
		$("#"+donde).css({'top':'','left':''});


var enca='<div class="elementosTitulos"><div class="div100 titulosB textAlignCenter">'+tipoTit+'</div></div>'+
'<div onClick="closeAlertElement();" class="close">X</div>';
var foots='<div class="elementosFooter"><div onclick="mandaF();" class="elementosBotonGuardar">Guardar</div></div>';

	 $('#granAlerta').fadeIn();
	 $('#alertaContent').append(enca).removeClass('div100 div50A').addClass(divo);
	  $('#alertaContent').append(foots);
	 
	 var espacio='<div class="clear50"></div>'+
	 $("#elementosAqui").append(msg)
	
 	 }
     	 });

		
	}
	function mandaF(){
	  CKupdate();
	$('#forma').submit();
	}
	
function elementoCopiar(copia,seccion){

	$('#cont_'+seccion).hide();
	$.ajax({
    type: "POST",
    url: "copiaElemento.php",
     data: "seccion="+seccion+"&elemento="+copia,
    success: 
    function(msg){
	$("#aqui").html(msg);
 	 }
     	 });
}	

function gridCopiar(copia,seccion){

	$('#cont_'+seccion).hide();
	$.ajax({
    type: "POST",
    url: "copiaGrid.php",
     data: "seccion="+seccion+"&grid="+copia,
    success: 
    function(msg){
	$("#aqui").html(msg);
 	 }
     	 });
}	

function bloqueCopiar(copia,seccion){

	$('#cont_'+seccion).hide();
	$.ajax({
    type: "POST",
    url: "copiaBloque.php",
     data: "seccion="+seccion+"&bloque="+copia,
    success: 
    function(msg){
	$("#aqui").html(msg);
 	 }
     	 });
}	
	
/*
function elementoPosicion(donde,padre){
var seccion=$('#seccion').val();
	var d=$('#d').val();
	$.ajax({
    type: "POST",
    url: "/sys/_contenido/elementoPosicion.php",
    data: "d="+d+"&seccion="+seccion+"&donde="+donde+"&padre="+padre,
    success: 
    function(msg){
		$("#contenidoAqui").html(msg);
 	 }
     	 });

		
	}
*/



$(function() {
 
 //ordena los bloques

$( "#actuales" ).sortable({
	delay:300,
		 cursor: 'move',
		 placeholder: "placeholder100",
  		  handle: ".draginC",
		  
		  
		  start: function() {
        $('.elementoBloque ').height('100px');
      },
	  
	  		  stop: function() {
        $('.elementoBloque ').height('');
      },
		  
		 update : function(event, ui){
          var orden=$('#actuales').sortable('toArray').toString();
		  $('#orden').val(orden);
  			var seccion=$('#seccion').val();
			var tab=$('#tab').val();

		 	$.ajax({
				
				type: "POST",
				url: "reorden.php",
				data: "seccion="+seccion+"&orden="+orden,
				success: 
				function(msg){				
			 	$("#aqui").html(msg);
			  }
	 		});
		 
        }
		
		
		});
        $( "#actuales" ).disableSelection();

 
			
			
			//forma
			
jQuery.ajaxSetup({
  beforeSend: function() {
 $('#load').show();
   //$('#contenidoAqui').hide();
  
  $('.botonEnviar').hide();
  },

  complete: function(){

  $('#load').hide();
   //$('#contenidoAqui').show();
    $('.botonEnviar').show();
  },

  success: function() {}
		});
		
		
	  

 
});

function eliminarE(mata){
 var e=$('#e').val();
	$('#elemento_'+mata).hide();
	$('#'+mata).hide();
	var seccion=$('#seccion').val();	
	var tab=$('#tab').val();	
	$('#cont_'+seccion).hide();
	$('.g'+seccion).hide();
	$.ajax({
    type: "POST",
    url: "mata.php",
     data: "e="+e+"&seccion="+seccion+"&elemento="+mata,
    success: 
    function(msg){
	//$("#contenidoAqui").html(msg);
 	 }
     	 });
         	}




 
/* acordeon */
 
function cambiaTitulo(cual){
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
	'<div class="formaT">Título Esp</div>'+
    '<div class="formaC">'+
    '<textarea id="titulo'+id+'_es" name="acordeon'+id+'_titulo_es" class="textoEdit"> </textarea>'+
	'</div>'+
'</div>'+

 '<div class="formaB">'+
	'<div class="formaT">Título Eng</div>'+
    '<div class="formaC">'+
    '<textarea id="titulo'+id+'_en" name="acordeon'+id+'_titulo_en" class="textoEdit"> </textarea>'+
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
	'<div class="formaT">Texto Esp</div>'+
    '<div class="formaC">'+
    '<textarea id="texto'+id+'_es" name="acordeon'+id+'_texto_es" class="textoEdit"></textarea>'+
	'</div>'+
'</div>'+

'<div class="formaB">'+
	'<div class="formaT">Texto Eng</div>'+
    '<div class="formaC">'+
    '<textarea id="texto'+id+'_en" name="acordeon'+id+'_texto_en" class="textoEdit"></textarea>'+
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
	CKEDITOR.replace( 'titulo'+id+'_es' );
	CKEDITOR.replace( 'texto'+id+'_es' );
	CKEDITOR.replace( 'titulo'+id+'_en' );
	CKEDITOR.replace( 'texto'+id+'_en' );
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
 
