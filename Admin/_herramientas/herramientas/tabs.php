 

<div class="blanco10T" >

<div class="blanco10TI">
  
	
		
<a href="<?=$url?>/_herramientas/herramientas/herramientasAdd?u=<?=$valor?>"> 
 <div class="seccionMenuI" id="c_info">
        <div class="material-icons ">info</div>
       	<div class="seccionMenuC ">Información</div>
</div> 
</a>	


<? if ($valor!=""){ ?>

<a href="<?=$url?>/_herramientas/herramientas/expertos?u=<?=$valor?>"> 
 <div class="seccionMenuI" id="c_expertos">
        <div class="material-icons ">people</div>
       	<div class="seccionMenuC ">Expertos</div>
</div> 
</a>


<a href="<?=$url?>/_herramientas/herramientas/materiales?u=<?=$valor?>"> 
 <div class="seccionMenuI" id="c_materiales">
        <div class="material-icons ">list</div>
       	<div class="seccionMenuC ">Materiales</div>
</div> 
</a>


<a href="<?=$url?>/_herramientas/herramientas/pasos?u=<?=$valor?>"> 
 <div class="seccionMenuI" id="c_pasos">
        <div class="material-icons ">format_list_numbered</div>
       	<div class="seccionMenuC ">Pasos</div>
</div> 
</a>
	
	
	<a href="<?=$url?>/_herramientas/herramientas/descargas?u=<?=$valor?>"> 
 <div class="seccionMenuI" id="c_descargas">
        <div class="material-icons ">file_download</div>
       	<div class="seccionMenuC ">Descargas</div>
</div> 
</a>
	
	
	<a href="<?=$url?>/_herramientas/herramientas/categorias?u=<?=$valor?>"> 
 <div class="seccionMenuI" id="c_categorias">
        <div class="material-icons ">category</div>
       	<div class="seccionMenuC ">Categorias</div>
</div> 
</a>
	

<a href="<?=$url?>/_herramientas/herramientas/tags?u=<?=$valor?>"> 
 <div class="seccionMenuI" id="c_tags">
        <div class="material-icons ">bookmark</div>
       	<div class="seccionMenuC ">Aplicaciones</div>
</div> 
</a>

	<a href="<?=$url?>/_herramientas/estadisticas/?u=<?=$valor?>"> 
 <div class="seccionMenuI" id="c_estadisticas">
        <div class="material-icons ">show_chart</div>
       	<div class="seccionMenuC ">Estadísticas</div>
</div> 
</a>
<a href="<?=$url?>/_herramientas/herramientas/comentarios?u=<?=$valor?>"> 
 <div class="seccionMenuI" id="c_comentarios">
        <div class="material-icons ">forum</div>
       	<div class="seccionMenuC ">Comentarios</div>
</div> 
</a>

<a href="<?=$url?>/_contenido/contenido?u=<?=$valor?>&tipo=herramientas" target="_blank" > 
 <div class="seccionMenuI" id="c_cont">
        <div class="material-icons ">add_to_queue</div>
       	<div class="seccionMenuC ">Contenido</div>
</div> 
</a>
 
<?} ?>
</div>
</div>