 <div class="blanco10T" >

<div class="blanco10TI">
 
 
 		
<a href="<?=$url?>/_expertos/expertos" title="Volver a expertos"> 
 <div class="seccionMenuI">
        <div class="material-icons ">arrow_back_ios_new</div>
 
</div> 
</a>	

 
	
		
<a href="<?=$url?>/_expertos/expertos/expertosAdd?u=<?=$valor?>"> 
 <div class="seccionMenuI" id="c_info">
        <div class="material-icons ">info</div>
       	<div class="seccionMenuC ">Información</div>
</div> 
</a>	




<? if ($valor!=""){ ?>
<a href="<?=$url?>/_expertos/portrait/?u=<?=$valor?>"> 
 <div class="seccionMenuI" id="c_port">
        <div class="material-icons ">portrait</div>
       	<div class="seccionMenuC ">Imagen</div>
</div> 
</a>

<a href="<?=$url?>/_expertos/expertos/cualificaciones?u=<?=$valor?>"> 
 <div class="seccionMenuI" id="c_cualificaciones">
        <div class="material-icons ">school</div>
       	<div class="seccionMenuC ">Cualificaciones</div>
</div> 
</a>


<a href="<?=$url?>/_expertos/estadisticas/?u=<?=$valor?>"> 
 <div class="seccionMenuI" id="c_estadisticas">
        <div class="material-icons ">show_chart</div>
       	<div class="seccionMenuC ">Estadísticas</div>
</div> 
</a>
	

<a href="<?=$url?>/_contenido/contenido?u=<?=$valor?>&tipo=expertos" target="_blank" > 
 <div class="seccionMenuI" id="c_cont">
        <div class="material-icons ">add_to_queue</div>
       	<div class="seccionMenuC ">Contenido</div>
</div> 
</a>
 
<?} ?>
</div>
</div>