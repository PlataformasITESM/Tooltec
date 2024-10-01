<? 
header("Content-Type: text/javascript");
include_once "../sesion/arriba.php";
if ($fasd==433){?><script><? }?>

$('input:file').change(function() {
	
	  var input = $("input[type='file']")[0];

	
	 for (var i = 0; i < input.files.length; i++) {
			var tamaño=5*1024*1024;
			 var size=input.files[i].size;
			 var file = input.files[i].name;
			 var ext = file.split('.').pop();
			 ext=ext.toLowerCase();
			 	
				var valor=0;
			   //if(ext=='pdf'){ valor=1;}
			    if(ext=='jpg'){ valor=1;}
				if(ext=='jpeg'){ valor=1;}
				if(ext=='png'){ valor=1;}
			   //if(ext=='doc'){ valor=1;}
			   //if(ext=='docx'){valor=1;}
			   //if(ext=='xls'){ valor=1;}
			   //if(ext=='xlsx'){ valor=1;}
			   //if(ext=='ppt'){ valor=1;}
			   //if(ext=='pptx'){ valor=1;}
			   //if(ext=='txt'){ valor=1;}
			   //if(ext=='rar'){ valor=1;}
			   //if(ext=='zip'){ valor=1;}
			   
	
			 if(valor!=1){
			//alert('Sólo imagenes jpg, jpeg o png');	
			$('#img').val('');
			$('#img').validationEngine('showPrompt', 'JPG, PNG', 'error', true);
			
			}
			 if(size>tamaño && valor==1){
  		     $('#img').val('');
			$('#img').validationEngine('showPrompt', '5MB max', 'error', true);
			
			 }
	}
	
			
});

$('.botonEnviar').show();


$(function() {
	
$( "#aquiFotos" ).sortable({
	delay:300,
		 cursor: 'move',
		 placeholder: "placeholder",
  		
		     update : function(event, ui){
          var orden=$('#aquiFotos').sortable('toArray').toString();
		 
		  $('#orden').val(orden);
  			var seccion=$('#seccion').val();
			var tab=$('#tab').val();
		 	$.ajax({
				
				type: "POST",
				url: "<?=$url?>/_contenido/reordenSlider.php",
				data: "orden="+orden,
				success: 
				function(msg){				
				//$("#aqui").html(msg);
			  }
	 		});
		 
        }
		
		
		});
        $( "#actuales" ).disableSelection();
 
});

function eliminaImgS(mata){
	var seccion=$('#seccion').val();	
	$('#slider_'+mata).hide();
	$.ajax({
    type: "POST",
    url: "<?=$url?>/_contenido/sliderImgMata.php",
      data: "seccion="+seccion+"&elemento="+mata,
    success: 
    function(msg){
	//$("#sub").html(msg);
 	 }
     	 });
         	}
 	
<? if ($fasd==433){?></script><? }?>