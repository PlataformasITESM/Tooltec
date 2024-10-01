
 $(function() {
 
	$('#tablesorter').DataTable({
	 "aaSorting": []
	});

$('.logos').bind('change', function() {
	error=0;
	var maxFile=3;
	var max=maxFile*1024*1024;
	  var ext = $(this).val().split('.').pop().toLowerCase();
	  var size=this.files[0].size
		var ok="ok";
		if(ext!=''){
		if($.inArray(ext, ['png']) == -1) {
		error=1;
		alert('Extensión inválida! Sólo imágenes png');
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


	
	function duplicaSeccion(secc){

	$.ajax({
    type: "POST",
    url: "copiaSeccion.php",
    data: "copia="+secc,
    success: 
    function(msg){
		$("#sub").html(msg);
 	 }
   	});
}
			
function reacomodoEnvia(cual){
	if(cual==null){cual="";}
	
	$('#botonReacomodo'+cual).hide();
	
	var ordensito=$('#orden'+cual).val();
	$.ajax({
    type: "POST",
    url: "reacomodoEnvia.php",
    data: "orden="+ordensito,
    success: 
    function(msg){
	//$("#sub").html(msg);
 
 	 }
     	 });

}

