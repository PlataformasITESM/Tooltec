<?
	$idRegistro=$parametrosE['idRegistro'];
		$clases=$parametrosE['clases'];
		$crmVisibles=$parametrosE['crmVisibles'];
	$crmNivel=$parametrosE['crmNivel'];
	$crmPrograma=$parametrosE['crmPrograma'];
	$crmComo=$parametrosE['crmComo'];
?>
 <div class="div100 elemento <?=$clases?>" style="text-align: left;">
<? include $rutaServer."/Admin/procesamiento/forma.php";  ?>
 </div>
 
 <script>
  $(function() {
 <? if($crmNivel!=""){ ?>

 traeCRM();
  setTimeout(function(){
 $('#<?=$idRegistro?>_nivel').val('<?=$crmNivel?>');
 crm_nivel('<?=$idRegistro?>', '<?=$crmNivel?>' );
 },300)
 
 <? } ?>
 
 
  <? if($crmPrograma!=""){ ?>

  setTimeout(function(){
 $('#<?=$idRegistro?>_programa').val('<?=$crmPrograma?>');
 crm_programa('<?=$idRegistro?>', '<?=$crmPrograma?>' );
 
 
 var puestoF=$("#<?=$idRegistro?>_inicio option").eq(1).val();
  $("#<?=$idRegistro?>_inicio").val(puestoF);
  
  
  $("#<?=$idRegistro?>_como").val('<?=$crmComo?>');
 
 },300)
 
 

  


 
 <? } ?>
 
});
 </script>