
$(function() {


  $(".choseado").chosen({width: "100%",no_results_text: "No se encontraron resultados"}); 
guardado();
	//forma
 
		$("#tablesorter").dataTable();
	
 	


$('.imagen').bind('change', function() {
  var ext = $(this).val().split('.').pop().toLowerCase();
	var ok="ok";
	if(ext!=''){
	if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
    alert('Extensión inválida!');
	$(this).val('');
	ok="";
	}
	}
});


});	


function copiarCategoria(cat){

	$.ajax({
    type: "POST",
    url: "categoriaCopia.php",
    data: "copia="+cat,
    success: 
    function(msg){
		$("#sub").html(msg);
 	 }
   	});
}