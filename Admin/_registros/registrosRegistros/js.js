	
$(function() {


	
	

	
	
	$( "#busquedon" ).click(function() {
	
	var valor=$('#valor').val();
	var fechaI=$('#fechaI').val();
	var fechaF=$('#fechaF').val();
	var referesSelect=$('#referesSelect').val();
	$.ajax({
type: "POST",
url: "registrosTodos.php",
data: "valor="+valor+"&fechaI="+fechaI+"&fechaF="+fechaF+"&referesSelect="+referesSelect,
success: 
function(msg){
$("#sub").html(msg);
} });
	
        });



});
function eliminarCapturas(){
	var registro=$('#valor').val();
	
	var eliminados=$('#eliminarListado').val();
	eliminados = eliminados.replace(/\s/g,'');  
	
	var esteArreglo=eliminados.split(",");
	
	var cuantos=parseInt($('#cuantos').text());
	var hay=parseInt(esteArreglo.length);
	cuantos=cuantos-hay;
	
	$('#cuantos').text(cuantos);
	

	
	$.each(esteArreglo, function( index, value ) {
  $('#linea'+value).hide();
});

$.each(esteArreglo, function(index, value) {
      $('#linea'+value).hide();
	 
   });
	

	$.ajax({
    type: "POST",
    url: "registrosMata.php",
    data: "registro="+registro+"&eliminados="+eliminados,
    success: 
    function(msg){
	$(".load").hide();
 	 }
     	 });

   }


	
function eliminas(){

	 var arreglo = [];
	
         $('#eliminar').hide();
		 
		    $.each($("input[name='eliminas']:checked"), function(){            
                arreglo.push($(this).val());
				 $('#eliminar').show();
            });
          $('#eliminarListado').val( arreglo.join(", "));
        }