
$(function() {


  $(".choseado").chosen({width: "100%",no_results_text: "No se encontraron resultados"}); 
		$("#forma").validationEngine({autoHidePrompt: true,autoHideDelay: 3000,fadeDuration: 0.3, validateNonVisibleFields: true, 
           prettySelect : true,
           useSuffix: "_chosen"});

guardado();
	//forma
 
		$("#tablesorter").dataTable();
	



});	

function copiarCategoria(cat){

	$.ajax({
    type: "POST",
    url: "productoCopia.php",
    data: "copia="+cat,
    success: 
    function(msg){
		$("#sub").html(msg);
 	 }
   	});
}