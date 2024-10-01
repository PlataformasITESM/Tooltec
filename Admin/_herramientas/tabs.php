 
<div class="clear10"></div>
<div class="blanco10T" >

<div class="blanco10TI">
  
 
		
<a href="<?=$url?>/_herramientas/herramientas/"> 
 <div class="seccionMenuI" id="q_herramientas">
        <div class="material-icons ">menu_book</div>
       	<div class="seccionMenuC ">Herramientas</div>
</div> 
</a>	



<a href="<?=$url?>/_herramientas/estadisticasT/"> 
 <div class="seccionMenuI" id="q_estadisticas">
        <div class="material-icons ">show_chart</div>
       	<div class="seccionMenuC ">Estádisticas</div>
</div> 
</a>	


<a href="<?=$url?>/_herramientas/categorias/"> 
 <div class="seccionMenuI" id="q_categorias">
        <div class="material-icons ">category</div>
       	<div class="seccionMenuC ">Categorias</div>
</div> 
</a>	
 
	
	<a href="<?=$url?>/_herramientas/tags/"> 
 <div class="seccionMenuI" id="q_tags">
        <div class="material-icons ">bookmark</div>
       	<div class="seccionMenuC ">Aplicaciones</div>
</div> 
</a>	
	
</div>
</div>
<div class="clear10"></div>


<?
file_get_contents($urlA.'/_api/codigos/expertos.php');
?>