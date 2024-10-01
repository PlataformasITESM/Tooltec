<div class="formaB">
<div class="formaT"><?=$tBackgroundColor?></div>
<div class="formaC">
<input type="text" id="background-color" data-prop="background-color" class="estils" name="background-color" value="<?=$background-color?>">
</div>
</div>

<div class="div"></div>


<div class="formaB">
<div class="formaT"><?=$tBackgroundImage?></div>
<div class="formaC">

<select class="widthAuto" name="text-shadowV" onChange="muestraOpciones('text-shadow',this.value);" id="shadowO">
<option value="">Sin imagen</option>
<option value="1">Imagen de fondo</option>
</select>
<div class="clear10"></div>

<div class="estils" id="backsImgs"  ></div>


</div>
</div>

<div class="div"></div>

<script>
$('#backsImgs').archivox({
campo:'background-image'

})
</script>





