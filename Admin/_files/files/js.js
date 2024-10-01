
function guardado(){
if(localStorage.guardado==1){
	$('#guardado').animate({ opacity: 1, top: "30px" }, 'medium').delay(1000).animate({ opacity: 0, top: "-100px" }, 'medium');
	}
	localStorage.removeItem("guardado");
}
$(document).ready(function(){
	
guardado();	
	
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
   var e=$('#e').val();
	  if(folder!=""){
			$.ajax({
			type: "POST",
			url: "folderAdd.php",
			data: "s="+s+"&folder="+folder+"&e="+e,
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
  
if( confirm('¿Deseas eliminar permanentemente los archivos?\n Esto afectará a todas las secciones donde estén presentes, y no puede deshacerse ')) {
eliminarArchivos();
}
	  
  }
  function eliminarCarpetaAlert(){

	if( confirm('¿Deseas eliminar permanentemente los carpeta?\n Esto eliminará permanentemente todos sus archivos y afectará a todas las secciones donde estén presentes, y no puede deshacerse ')) {
	 eliminarFolder()
	 }
  }
  
   function closeAlert(){
  
	 $('.fondoMensaje').hide(); 
	   $('.boton, .botonEnviar').show();
  }
  
  function tablita(){
	  
	$("#tablesorter").DataTable();
  
  }
  
  function archivos(folder) {
	  
	  $('.lineaControl').css('paddingLeft','0');
	  $('.lineaControl').css('color','#666');
	  $('#f'+folder).css('paddingLeft','10px');
	  $('#f'+folder).css('color','#000');
	  
	  $('.iconoFolder').text('folder');
	  $('#icono'+folder).text('folder_open');
	 var e=$('#e').val();
	
	
			$.ajax({
			type: "POST",
			url: "folderArchivos.php",
			data: "c="+folder+"&e="+e,
			success: 
			function(msg){
			$("#carpeta").html(msg);
			} });
			
 
     
        window.history.pushState('', 'x', './#'+folder);
  
 
 
 
		} 
		
		
function modArchivo(folder,archivo) {
 var e=$('#e').val();
			$.ajax({
			type: "POST",
			url: "folderArchivosArchivo.php",
			data: "c="+folder+"&a="+archivo+"&e="+e,
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
	
	var registro=$('#valor').val();
	
	var eliminados=$('#eliminarListado').val();
	var eliminadosN=$('#eliminarListadoN').val();
	eliminados = eliminados.replace(/\s/g,'');  
	var esteArreglo=eliminados.split(",");
    
	var c=$('#c').val();
	var p=$('#p').val();
	var e=$('#e').val();
	$.each(esteArreglo, function(index, value) {
      $('#linea'+value).hide();
	 
   });
   $('#eliminar').hide();
 
  tablita();
	$.ajax({
    type: "POST",
    url: "archivoDelete.php",
    data: "c="+c+"&eliminados="+eliminadosN+"&p="+p+"&eliminadosL="+eliminados+"&e="+e,
    success: 
    function(msg){
	 //$("#aqui").html(msg);
	$('.fondoMensaje').hide(); 
	
	
 	 }
     	 });
   }	
   
   		
function eliminarFolder(){
	
    
	var c=$('#c').val();
	
	 var e=$('#e').val();
	$('#folder'+c).hide();
 $("#carpeta").html('');
	$.ajax({
    type: "POST",
    url: "folderDelete.php",
    data: "c="+c+"&e="+e,
    success: 
    function(msg){
	 $("#folderes").html(msg);
	$('.fondoMensaje').hide(); 
	
	
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
 var e=$('#e').val();
	   
		   if(tituloFolder!=""){
		   $('#tituloOriginal').val(tituloFolder);
		   
				   $('#titulosControl').hide();
					$('.edit').show();
					 $('#tituloFolder').prop('contentEditable',false).text(tituloFolder); 
					 $('#nombre'+c).text(tituloFolder);
				   
				$.ajax({
					type: "POST",
					url: "titulo.php",
					data: "c="+c+"&nombre="+tituloFolder+"&e="+e,
					success: 
					function(msg){
					  //$("#aqui").html(msg);
					 }
				});
		   
		   }
		 
   }
