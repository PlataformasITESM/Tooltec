 <div class="blanco10T" >

<div class="blanco10TI">
  
	
		
<a href="<?=$url?>/_blogs/blogs/blogAdd?u=<?=$valor?>"> 
 <div class="seccionMenuI" id="c_info">
        <div class="material-icons ">info</div>
       	<div class="seccionMenuC ">Información</div>
</div> 
</a>	


<? if ($valor!=""){ ?>
	

<a href="<?=$url?>/_blogs/estadisticas/?u=<?=$valor?>"> 
 <div class="seccionMenuI" id="c_estadisticas">
        <div class="material-icons ">show_chart</div>
       	<div class="seccionMenuC ">Estadísticas</div>
</div> 
</a>


<a href="<?=$url?>/_blogs/blogs/comentarios?u=<?=$valor?>">
 <div class="seccionMenuI" id="c_com">
        <div class="material-icons ">forum</div>
       	<div class="seccionMenuC ">Comentarios</div>
</div> 
</a>
	
	<a href="<?=$url?>/_contenido/contenido?u=<?=$valor?>&tipo=blogs" target="_blank" > 
 <div class="seccionMenuI" id="c_cont">
        <div class="material-icons ">add_to_queue</div>
       	<div class="seccionMenuC ">Contenido</div>
</div> 
</a>
 
<?} ?>
</div>
</div>
