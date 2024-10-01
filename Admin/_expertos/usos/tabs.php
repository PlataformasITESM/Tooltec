 

<div class="blanco10T" >

<div class="blanco10TI">
  
	
		
<a href="<?=$url?>/_quesos/quesos/quesosAdd?u=<?=$valor?>"> 
 <div class="seccionMenuI" id="c_info">
        <div class="material-icons ">info</div>
       	<div class="seccionMenuC ">Información</div>
</div> 
</a>	





<? if ($valor!=""){ ?>

<a href="<?=$url?>/quesos/quesos/recomendaciones?u=<?=$valor?>"> 
 <div class="seccionMenuI" id="c_Tags">
        <div class="material-icons ">tag</div>
       	<div class="seccionMenuC ">Recomendaciones</div>
</div> 
</a>
<a href="<?=$url?>/_contenido/contenido?u=<?=$valor?>&tipo=quesos" target="_blank" > 
 <div class="seccionMenuI" id="c_cont">
        <div class="material-icons ">add_to_queue</div>
       	<div class="seccionMenuC ">contenido</div>
</div> 
</a>
 
<?} ?>
</div>
</div>