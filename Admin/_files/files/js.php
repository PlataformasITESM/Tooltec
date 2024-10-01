<? 
header("Content-Type: text/javascript");
include_once "../sesion/arriba.php";
if ($fasd==433){?><script><? }?>
$(document).ready(function(){
	
	
	
jQuery("#forma").validationEngine({
	 autoHidePrompt: true,autoHideDelay: 1000,fadeDuration: 0.3
	});
var optionss = { 
        target:        '#sub' 
       			
			}; 	
$('#forma').ajaxForm(optionss);
 
 
		
		
 
  });
  
  
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
	  alert(s);
	  if(folder!=""){
			$.ajax({
			type: "POST",
			url: "<?=$url?>/_files/files/folderAdd.php",
			data: "s="+s+"&folder="+folder,
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
		
  
  
  function eliminarArchivosAlert(){
  $('.alertBoxR').hide(); 
	 $('.fondoMensaje, #eliminarArchivo').fadeIn(); 
	  
  }
  function eliminarCarpetaAlert(){
   $('.alertBoxR').hide(); 
	 $('.fondoMensaje, #eliminarFolder').fadeIn(); 
	  
  }
  
   function closeAlert(){
  
	 $('.fondoMensaje, .alertBoxR').hide(); 
	   $('.boton, .botonEnviar').show();
  }
  
  function tablita(){
	  
	$("#tablesorter").tablesorter({headers:{ 0: { sorter: false  },  1: { sorter: false  }  },widgets:["zebra"]});
  
  }
  
  function archivos(folder) {
	  
	  $('.lineaControl').css('paddingLeft','0');
	  $('.lineaControl').css('color','#666');
	  $('#f'+folder).css('paddingLeft','10px');
	  $('#f'+folder).css('color','#000');
	  
	  $('.iconoFolder').text('folder');
	  $('#icono'+folder).text('folder_open');
	
	
	
			$.ajax({
			type: "POST",
			url: "<?=$url?>/_files/files/folderArchivos.php",
			data: "c="+folder,
			success: 
			function(msg){
			$("#carpeta").html(msg);
			} });
			
		
		} 
		
		
function modArchivo(folder,archivo) {
			$.ajax({
			type: "POST",
			url: "<?=$url?>/_files/files/folderArchivosArchivo.php",
			data: "c="+folder+"&a="+archivo,
			success: 
			function(msg){
			$("#carpeta").html(msg);
			} });
			
		
		} 
			
		
  jQuery.ajaxSetup({
  beforeSend: function() {
 $('.load').show();
  
  
  $('.botonEnviar').hide();
  },
  complete: function(){
  $('.load').hide();
   $('.botonEnviar').show();
   
  },
  success: function() {}
		});
		
function eliminarArchivos(){
	$('.fondoMensaje').hide(); 
	var registro=$('#valor').val();
	
	var eliminados=$('#eliminarListado').val();
	var eliminadosN=$('#eliminarListadoN').val();
	eliminados = eliminados.replace(/\s/g,'');  
	var esteArreglo=eliminados.split(",");
    
	var c=$('#c').val();
	var p=$('#p').val();
	$.each(esteArreglo, function(index, value) {
      $('#linea'+value).hide();
	 
   });
   $('#eliminar').hide();
 
  tablita();
	$.ajax({
    type: "POST",
    url: "<?=$url?>/_files/files/archivoDelete.php",
    data: "c="+c+"&eliminados="+eliminadosN+"&p="+p+"&eliminadosL="+eliminados,
    success: 
    function(msg){
	 //$("#aqui").html(msg);
	
	
	
 	 }
     	 });
   }	
   
   		
function eliminarFolder(){
	$('.fondoMensaje').hide(); 
	
	
    
	var c=$('#c').val();
	
	
	$('#folder'+c).hide();
 $("#carpeta").html('');
	$.ajax({
    type: "POST",
    url: "<?=$url?>/_files/files/folderDelete.php",
    data: "c="+c ,
    success: 
    function(msg){
	 $("#folderes").html(msg);
	
	
	
 	 }
     	 });
		 
	
   }	
   
   
   function eliminas()	{
 
		 var arreglo = [];
		 var arregloN = [];
         $('#eliminar').hide();
		 
		 var peso=0;
	
		    $.each($("input[name='eliminas']:checked"), function(){            
                arreglo.push($(this).val());
				 arregloN.push($(this).data("nombre"));
				 $('#eliminar').show();
				 var pesoEste=parseInt($(this).data("peso"));
				 peso=peso+pesoEste;
				 
            });
          $('#eliminarListado').val( arreglo.join(","));
		   $('#eliminarListadoN').val( arregloN.join(","));
     	  $('#p').val(peso);
	   
   }
   
   
   function tituloEdit() {
	    $('.edit').hide();
		$('#titulosControl').show();
	   $('#tituloFolder').prop('contentEditable',true).focus(); 
	   
   }
   
   function tituloCancel(){
	   var tituloOriginal=$('#tituloOriginal').val();
	   $('#titulosControl').hide();
	    $('.edit').show();
		 $('#tituloFolder').prop('contentEditable',false).text(tituloOriginal); 
   }
   
function tituloSave(){
	   var tituloFolder=$('#tituloFolder').text();
		var c=$('#c').val();
	   
		   if(tituloFolder!=""){
		   $('#tituloOriginal').val(tituloFolder);
		   
				   $('#titulosControl').hide();
					$('.edit').show();
					 $('#tituloFolder').prop('contentEditable',false).text(tituloFolder); 
					 $('#nombre'+c).text(tituloFolder);
				   
				$.ajax({
					type: "POST",
					url: "<?=$url?>/_files/files/titulo.php",
					data: "c="+c+"&nombre="+tituloFolder,
					success: 
					function(msg){
					  $("#aqui").html(msg);
					 }
				});
		   
		   }
		 
   }
<? if ($fasd==433){?></script><? }?>