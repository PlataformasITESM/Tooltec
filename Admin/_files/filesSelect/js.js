(function ( $ ) {
 
    $.fn.archivos = function( options ) {
 
        // Default options
        var settings = $.extend({
            
        }, options );
 
        // Apply options
		var apenda='<div onClick="abreArchivos(\''+settings.campo+'\',\''+settings.cuantos+'\',\''+settings.tipo+'\',\''+settings.tipoContenido+'\'); return false;" style="cursor:pointer">'+
        '<div class="addFile" >'+
       	'<div class="material-icons absoluteV">attach_file</div>'+
       	'<div class="div100">Seleccionar archivo</div>'+
		'<div class="addFileInput">'+
		'<input id="'+settings.campo+'"  name="'+settings.campo+'"  type="text" class="validate[required]"  value="'+settings.valor+'"  /></div>'+
		'</div>'+
		'</div>'+
		'<div id="'+settings.campo+'_Div"></div>'+
		'<input id="'+settings.campo+'_tmp" name="'+settings.campo+'_tmp"    type="hidden" value="'+settings.valor+'"  />';
			
        return this.append(apenda);
 
    };
 
}( jQuery ));


 var info="";
  
  function closeAlert(contenedor){
  	$("#archivos_"+contenedor).html('');
	  $('#seleccion_'+contenedor).slideToggle(); 
	  
  }
  
  
  function showAddFolder(){
	$('#addFolderDiv').show();  
  }
  function cancelFolder(){
	$('#addFolderDiv').hide(); 
	$('#nombreFolder').val('');
  }
  
  function addFolder() {
   var rutaSistema=$('#rutaSistema').val();
	  var folder=$('#nombreFolder').val( );
	  var s=$('#s').val();
	  var cuantosArchivos=$('#cuantosArchivos').val();
	  if(folder!=""){
			$.ajax({
			type: "POST",
			url: rutaSistema+"/_files/files/folderAdd.php",
			data: "s="+s+"&folder="+folder+"&vieneFiles=Select&cuantosArchivos="+cuantosArchivos,
			success: 
			function(msg){
			$("#folderes").html(msg);
			} });
	  }
	  else{
		  
		  $('#nombreFolder').css('border', '#990000 solid 1px');  
			setTimeout(function(){ $('#nombreFolder').css("border", "");}, 1000);
	  }
	  
	  
		}
 
 
 function abreArchivos(contenedor,cuantosArchivos,tipo,) {
 var rutaSistema=$('#rutaSistema').val(); 
 var tipoContenido=$('#tipoContent').val();
 var tipoContentSeccion=$('#tipoContentSeccion').val();
  if(!tipoContenido){tipoContenido="";}
	  
	  $('body').prepend('<div id="archivosAqui" class="fondoMensaje"></div>');
	   $('#archivosAqui').fadeIn();
 
 $('html,body').animate({
        scrollTop: $("#archivosAqui").offset().top},
        'slow');
 
  $('.tabMenus').hide();
			$.ajax({
			type: "POST",
			url: rutaSistema+"/_files/filesSelect/archivos.php",
			data: "contenedor="+contenedor+"&cuantosArchivos="+cuantosArchivos+"&tipoArchivoSeleccion="+tipo+"&tipoContenido="+tipoContenido+"&tipoContentSeccion="+tipoContentSeccion,
			success: 
			function(msg){
			$("#archivosAqui").html(msg);
			} });
			
				} 
  function closeAlertFiles(){
  
	$('#archivosAqui').fadeOut().remove();
	 $('.tabMenus').show();
	  $('.botonEnviar').show();
  }
   function tablita(){
	  
	$("#tablesorter").DataTable({
	 "lengthChange": false,
            "pageLength": 50
	});
  
  }
  
  
  function selectFile(contenedor)	{
 
		 var arreglo = [];
		 var arregloInfo = [];
        $('#boton_'+contenedor).hide();
		 
		    $.each($("input[name='seleccionas']:checked"), function(){   
                arreglo.push($(this).val());
				 arregloInfo.push($(this).data('info'));
				 $('#boton_'+contenedor).show();
				 
				 
            });
		
         $('#'+contenedor+'_tmp').val( arreglo.join(","));
		 info=arregloInfo.join(" ");
   }
   
    
   
   
   
  function saveSelFile(contenedor)	{
	  
	  $("#archivos_"+contenedor).html('');
	  $('#seleccion_'+contenedor).slideToggle(); 
	 
	  
	 var seleccion= $('#'+contenedor+'_tmp').val();
	 $('#'+contenedor).val(seleccion);
	 $('#'+contenedor+'_tmp').val('');
	 $('#'+contenedor+'_Div').html(info);
	 
	  $('#archivosAqui').fadeOut().remove();
	  $('.botonEnviar').show();
	  $('.tabMenus').show();
  }
   
  
 
  
  function archivos(folder,contenedor,cuantosArchivos,tipo) {
	 var rutaSistema=$('#rutaSistema').val();  

	  
	  $('.lineaControl').css('paddingLeft','0');
	  $('.lineaControl').css('color','#666');
	  $('#f'+folder).css('paddingLeft','10px');
	  $('#f'+folder).css('color','#000');
	
			$.ajax({
			type: "POST",
			url: rutaSistema+"/_files/filesSelect/folderArchivos.php",
			data: "c="+folder+"&contenedor="+contenedor+"&cuantosArchivos="+cuantosArchivos+"&tipoArchivoSeleccion="+tipo,
			success: 
			function(msg){
			$("#carpeta").html(msg);
			} });
			
		
		} 
