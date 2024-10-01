<div class="formaB">
<div class="formaT"><?=$tFontSize?></div>
<div class="formaC ">
<div class="table">
<div class="tableCell padd5">
<input type="range" min="6" max="80"  data-prop="font-size"  id="font-sizeR" class="estils font-size "  value="<?=$fontSize?>">
</div>
<div class="tableCell padd5 unidades px" style="width: 80px;">
<input type="text" name="font-size" data-prop="font-size"  style=" text-align: right;" id="font-size" class="estils font-size  entero " value="<?=$fontSize?>">
</div>

</div>
</div>
</div>

<div class="div"></div>


<div class="left padd5">
<?=$tFontFamily?>
<div class="clear5"></div>
<select name="font-family" id="font-family" style="width: auto;" class="estils font-family validate[required]"  data-prop="font-family">
<option value="">Fuente</option>


<?
if($fuentes!=""){
?>
<optgroup label="Google Fonts">
<?
foreach($fuentes as $fonts=>$pesos){
if($fonts!=""){
$fontsU=str_replace(' ','+',$fonts);
  ?>
<option value="<?=$fonts?>"><?=$fonts?></option>
<script>
	 $("head").append("<link href=\"https://fonts.googleapis.com/css?family=<?=$fontsU?>\" rel=\"stylesheet\">");
</script>

<? }


}
	?>
	
		</optgroup>
<? }	?>

<optgroup label="Standard Fonts">
<option value="Helvetica, sans-serif">Helvetica, sans-serif	</option>
<option value="Verdana, sans-serif">Verdana, sans-serif</option>
<option value="Trebuchet MS, sans-serif	">Trebuchet MS, sans-serif	</option>
<option value="Gill Sans, sans-serif	">Gill Sans, sans-serif	</option>
<option value="Arial Narrow, sans-serif">Arial Narrow, sans-serif	</option>
<option value="Times, Times New Roman, serif	">Times, Times New Roman, serif	</option>
<option value="Georgia, serif	">Georgia, serif	</option>
<option value="Andale Mono, monospace	">Andale Mono, monospace	</option>
<option value="Courier New, monospace	">Courier New, monospace	</option>
<option value="FreeMono, monospace	">FreeMono, monospace	</option>
<option value="Brush Script MT, Brush Script Std, cursive	">Brush Script MT, Brush Script Std, cursive	</option>
<option value="Impact, fantasy	">Impact, fantasy	</option>
</optgroup>
</select>
</div>



<div class="left padd5">
<?=$tColor?>
<div class="clear5"></div>
<input type="text" id="color" data-prop="color" class="estils" name="color" value="<?=$color?>">
</div>



<div class="left padd5">
<?=$tFontWeight?>
<div class="clear5"></div>
<select  id="font-weight" data-prop="font-weight" class="estils widthAuto" name="font-weight" value="<?=$textDecoration?>">
<option value="normal">Normal</option>
<option value="100">100</option>
<option value="300">300</option>
<option value="500">500</option>
<option value="700">700</option>
<option value="900">900</option>
</select>
 
</div>

<div class="left padd5">
<?=$tStyle?>
<div class="clear5"></div>
<select  id="font-style" data-prop="font-style" class="estils widthAuto" name="font-style" value="<?=$textDecoration?>">
<option value="">Normal</option>
<option value="italic">Itálica</option>
</select>
 
</div>



<div class="left padd5">
<?=$tAlinea?>
<div class="clear5"></div>
<select  id="text-align" data-prop="text-align" class="estils widthAuto" name="text-align" value="<?=$textAlign?>">
<option value="left"><?=$tAlineaL?></option>
<option value="right"><?=$tAlineaR?></option>
<option value="center"><?=$tAlineaC?></option>
<option value="justify"><?=$tAlineaJ?></option>
</select>
</div>



<div class="left padd5">
<?=$tDecora?>
<div class="clear5"></div>
<select  id="text-decoration" data-prop="text-decoration" class="estils widthAuto" name="text-decoration" value="<?=$textDecoration?>">
<option value="">Sin decoración</option>
<option value="underline">Subrayado</option>
<option value="overline">Línea sobre</option>
<option value="line-through	">Tachado</option>

</select>
</div>


<div class="left padd5">
<?=$tTransforma?>
<div class="clear5"></div>
<select  id="text-transform" data-prop="text-transform" class="estils widthAuto" name="text-transform" value="<?=$textTransform?>">
<option value="">Sin tranformación</option>
<option value="capitalize">Primera mayúsculas</option>
<option value="uppercase">Todas mayúsculas</option>
<option value="lowercase">Todas minúsculas</option>
</select>
</div>

<div class="div"></div>

<div class="formaB">
<div class="formaT"><?=$tlineHeight?></div>
<div class="formaC ">
<div class="table">
<div class="tableCell padd5">
<input type="range" min="0" max="300"  data-prop="line-height"  id="line-heightR" class="estils line-height "  value="<?=$lineHeight?>">
</div>
<div class="tableCell padd5 unidades porce" style="width: 80px;">
<input type="text" name="line-height" data-prop="line-height"  style=" text-align: right;" id="line-height" class="estils line-height  entero " value="<?=$lineHeight?>">
</div>

</div>
</div>
</div>

<div class="div"></div>

<div class="formaB">
<div class="formaT"><?=$tLetterSpacing?></div>
<div class="formaC ">

<select class="widthAuto" name="letter-spacingV" onChange="muestraOpciones('letter-spacing',this.value);" id="letter-spacingV">
<option value="">Interlineado Normal</option>
<option value="1">Ajustar espacio</option>
</select>
<div class="clear"></div>

<div class="div100 displayNone" id="letter-spacingDiv">
<div class="table">
<div class="tableCell padd5">
<input type="range" min="-5" max="30"  data-prop="letter-spacing"  id="letter-spacingR" class="estils letter-spacing "  value="<?=$letterSpacing?>">
</div>
<div class="tableCell padd5 unidades px" style="width: 80px;">
<input type="text" name="letter-spacing" data-prop="line-height"  style=" text-align: right;" id="letter-spacing" class="estils letter-spacing  entero " value="<?=$letterSpacing?>">
</div>

</div>
</div>

</div>
</div>

<div class="div"></div>


<div class="formaB">
<div class="formaT"><?=$tShadow?></div>
<div class="formaC">



<select class="widthAuto" name="text-shadowV" onChange="muestraOpciones('text-shadow',this.value);" id="shadowO">
<option value="">Sin sombra</option>
<option value="1">Ajustar sombra</option>
</select>
<div class="clear"></div>

<div class="div100 displayNone" id="text-shadowDiv">

<div class="div25 padd5">
<input type="range" min="0" max="30"  id="shadowH" name="shadowH" class="text-shadow "  value="<?=$shadowH?>">
</div>
<div class="div25 padd5">
<input type="range" min="0" max="30"  id="shadowV" name="shadowV" class="text-shadow"  value="<?=$shadowV?>">
</div>
<div class="div25 padd5">
<input type="range" min="0" max="30"  id="shadowB" name="shadowB" class="text-shadow"  value="<?=$shadowB?>">
</div>
<div class="div25 padd5">
<input type="text" id="shadowC"   class="text-shadow" name="shadowC" value="<?=$shadowC?>">
</div>
</div>

</div>

</div>

<div class="div"></div>