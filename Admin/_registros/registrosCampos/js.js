 

$(function() {
         $( "#actuales" ).sortable({
		 cursor: 'move',
		 placeholder: "placeholder",
  		
		     update : function(event, ui){
          var orden=$('#actuales').sortable('toArray').toString();
		 
		 
		;
		  $('#orden').val(orden);
  			var registro=$('#registro').val();
		 	$.ajax({
				
				type: "POST",
				url: "reorden.php",
				data: "registro="+registro+"&orden="+orden,
				success: 
				function(msg){				
				//$("#aqui").html(msg);
				
			  }
	 		});
		 
        }
		
		
		});
        $( "#actuales" ).disableSelection();
        });



function eliminarCampo(registro,campo){
	
	$('#'+campo).hide();
	$.ajax({
    type: "POST",
    url: "camposMata.php",
    data: "registro="+registro+"&mata="+campo,
    success: 
    function(msg){
	//$("#sub").html(msg);
 	 }
     	 });
         	}
  function cambiaTipo(este){

	$('.tiposResultados').hide();
 
	  if(este=="productos_Productos"){$('#productines').show();}
	  if(este=="select_Listado" || este=="radio_Radio"){$('#listadoSelect').show();}
	  if(este=="titulo_Título" ){$('#titulotipo').show();}
	  if(este=="date_Fecha" ){$('#laFecha').show();}
	  
  }

$(function() {		
$('#tablesorter').DataTable();
	});	
	
