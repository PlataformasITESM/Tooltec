
$(function() {

 

guardado();
	//forma
 
		$("#tablesorter").dataTable();
	
$('.logos').bind('change', function() {
	error=0;
	var maxFile=3;
	var max=maxFile*1024*1024;
	  var ext = $(this).val().split('.').pop().toLowerCase();
	  var size=this.files[0].size
		var ok="ok";
		if(ext!=''){
		if($.inArray(ext, ['png','jpg','jpeg']) == -1) {
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

function copiarCategoria(cat){

	$.ajax({
    type: "POST",
    url: "blogCopia.php",
    data: "copia="+cat,
    success: 
    function(msg){
		$("#sub").html(msg);
 	 }
   	});
}