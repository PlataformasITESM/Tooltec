function guardado(){
if(localStorage.guardado==1){
	$('#guardado').animate({ opacity: 1, top: "30px" }, 'medium').delay(1000).animate({ opacity: 0, top: "-100px" }, 'medium');
	}
	localStorage.removeItem("guardado");
}
 
$(function() {
 
  $(".choseado").chosen({width: "100%",no_results_text: "No se encontraron resultados"}); 	
guardado();


$("#tablesorter").dataTable();

	//forma
			
// ajax			
jQuery.ajaxSetup({
  beforeSend: function() {
 $('.load').show();
	$('input[type="submit"]').prop('disabled', true);
  },

  complete: function(){

  $('.load').hide();
	$('input[type="submit"]').prop('disabled', false);
  },

  success: function() {}
});
//ajax


 var optionss = { 
        target:        '#sub', 
      	success: function(){
				$('#forma').clearForm();
				 }	
    }; 	
 $('#forma').ajaxForm(optionss);
 
});

function agregaAtributo(este){
	
var id='v'+aleatorio();

if(este){id=este;}

var apenda='<div id="elemento'+id+'" style="width:100%; float:left;" class="elementoElemento coment" data-id="elemento'+id+'">'+
	'<div  class="elementoTitulo">'+
'<div class="tableCell padd">'+
'<input  id="imagen'+id+'"  name="imagen'+id+'"  type="file" class="validate[required] field archivos"  /><br>'+
'<div id="existeimagen'+id+'"></div>'+
'</div>'+
'<div id="elemento'+id+'_flecha" data-id="elemento'+id+'" class="tableCell padd  material-icons borra" style="width:30px; cursor:pointer;">clear</div>'+
	'</div>'+


 '</div>';
	
	
	$('#nuevosAtributos').before(apenda);
	 
	recargaSelects();

}


$( ".selectrones" ).live("change", function() {
recargaSelects();
});
$( ".borra" ).live("click", function() {
	var borra=$(this).data("id")
	$('#'+borra).remove();
recargaSelects();

var borradosO=$('#borrados').val();
var arrayB = borradosO.split(",");
				arrayB.push(borra);
var borradosN=arrayB.join(",");			
				$('#borrados').val(borradosN);
				

});



function recargaSelects() {
	
	var opcionesOrdenes = new Array();
	$(".elementoElemento").each(function() {
		
		var este=$(this).data("id")
			opcionesOrdenes.push(este);
		
		var nuevo=opcionesOrdenes.join(',');
		$('#orden').val(nuevo);
    	
	});
	
}

 

 $(function() {
 
 
  $( "#actuales" ).sortable({
	 	update: function () {
               $('#imgOrden').val( $(this).sortable('toArray'));
            } 
			}).disableSelection();
 
$('#actuales').sortable( "refresh" )

$('.logos').bind('change', function() {
	error=0;
	var maxFile=3;
	var max=maxFile*1024*1024;
	  var ext = $(this).val().split('.').pop().toLowerCase();
	  var size=this.files[0].size
		var ok="ok";
		if(ext!=''){
		if($.inArray(ext, ['png','jpg','jpeg','mp4','mov']) == -1) {
		error=1;
		alert('Extensión inválida! Sólo imágenes');
		$(this).val('');
		ok="";
		}
		 
		if(size>max && error==0){
		$(this).val('');
		error=1;
		alert('Peso máximo '+maxFile+'MB');
		}
		}
		
		if(error==0){
		divo=$(this).data('imgdiv');
		
		muestraImg(this,divo);
		}
		 
	});
	


});

