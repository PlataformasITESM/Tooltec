<? 
header("Content-Type: text/javascript");
include_once "../../sesion/arriba.php";
if ($fasd==433){?><script><? }?>
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
	  var folder=$('#nombreFolder').val( );
	  var s=$('#s').val();
	  var cuantosArchivos=$('#cuantosArchivos').val();
	  if(folder!=""){
			$.ajax({
			type: "POST",
			url: "<?=$url?>/_files/folderAdd.php",
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



 
 function abreArchivos(contenedor,cuantosArchivos,tipo,prod) {
	  
	   $('body').prepend('<div id="archivosAqui" class="fondoMensaje"></div>');
	   $('#archivosAqui').fadeIn();
 
  $('.tabMenus').hide();
			$.ajax({
			type: "POST",
			url: "<?=$url?>/_filesSelect/archivos.php",
			data: "contenedor="+contenedor+"&cuantosArchivos="+cuantosArchivos+"&tipoArchivoSeleccion="+tipo+"&prod="+prod,
			success: 
			function(msg){
			$("#archivosAqui").html(msg);
			} });
			
				} 


  function closeAlert(){
  
	 $('#archivosAqui').fadeOut().remove();
	 $('.tabMenus').show();
	  $('.botonEnviar').show();
  }



   function tablita(){
	  
	$("#tablesorter").tablesorter({headers:{ 0: { sorter: false  },  sortList:   [2,0],  1: { sorter: false  }  },widgets:["zebra"]});
  
  }
   var info="";
  
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
	  
	  $('.lineaControl').css('paddingLeft','0');
	  $('.lineaControl').css('color','#666');
	  $('#f'+folder).css('paddingLeft','10px');
	  $('#f'+folder).css('color','#000');
	
		
			$.ajax({
			type: "POST",
			url: "<?=$url?>/_filesSelect/folderArchivos.php",
			data: "c="+folder+"&contenedor="+contenedor+"&cuantosArchivos="+cuantosArchivos+"&tipoArchivoSeleccion="+tipo,
			success: 
			function(msg){
			$("#carpeta").html(msg);
			} });
			
		
		} 

  
<? if ($fasd==433){?></script><? }?>