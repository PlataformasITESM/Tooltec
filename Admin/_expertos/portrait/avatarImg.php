<? include "../../sesion/arriba.php"; 
$dondeSeccion="expertos";
include "../../sesion/mata.php"; 

ini_set('memory_limit','256M');
?>
<style type="text/css">
.jcrop-holder {
  direction: ltr;
  text-align: left;
}
/* Selection Border */
.jcrop-vline,
.jcrop-hline {
  background: #ffffff;
  font-size: 0;
  position: absolute;
}
.jcrop-vline {
  height: 100%;
  width: 1px !important;
}
.jcrop-vline.right {
  right: 0;
}
.jcrop-hline {
  height: 1px !important;
  width: 100%;
}
.jcrop-hline.bottom {
  bottom: 0;
}
/* Invisible click targets */
.jcrop-tracker {
  height: 100%;
  width: 100%;
  /* "turn off" link highlight */
  -webkit-tap-highlight-color: transparent;
  /* disable callout, image save panel */
  -webkit-touch-callout: none;
  /* disable cut copy paste */
  -webkit-user-select: none;
}
/* Selection Handles */
.jcrop-handle {
  background-color: #333333;
  border: 1px #eeeeee solid;
  width: 7px;
  height: 7px;
  font-size: 1px;
}
.jcrop-handle.ord-n {
  left: 50%;
  margin-left: -4px;
  margin-top: -4px;
  top: 0;
}
.jcrop-handle.ord-s {
  bottom: 0;
  left: 50%;
  margin-bottom: -4px;
  margin-left: -4px;
}
.jcrop-handle.ord-e {
  margin-right: -4px;
  margin-top: -4px;
  right: 0;
  top: 50%;
}
.jcrop-handle.ord-w {
  left: 0;
  margin-left: -4px;
  margin-top: -4px;
  top: 50%;
}
.jcrop-handle.ord-nw {
  left: 0;
  margin-left: -4px;
  margin-top: -4px;
  top: 0;
}
.jcrop-handle.ord-ne {
  margin-right: -4px;
  margin-top: -4px;
  right: 0;
  top: 0;
}
.jcrop-handle.ord-se {
  bottom: 0;
  margin-bottom: -4px;
  margin-right: -4px;
  right: 0;
}
.jcrop-handle.ord-sw {
  bottom: 0;
  left: 0;
  margin-bottom: -4px;
  margin-left: -4px;
}
/* Dragbars */
.jcrop-dragbar.ord-n,
.jcrop-dragbar.ord-s {
  height: 7px;
  width: 100%;
}
.jcrop-dragbar.ord-e,
.jcrop-dragbar.ord-w {
  height: 100%;
  width: 7px;
}
.jcrop-dragbar.ord-n {
  margin-top: -4px;
}
.jcrop-dragbar.ord-s {
  bottom: 0;
  margin-bottom: -4px;
}
.jcrop-dragbar.ord-e {
  margin-right: -4px;
  right: 0;
}
.jcrop-dragbar.ord-w {
  margin-left: -4px;
}
/* The "jcrop-light" class/extension */
.jcrop-light .jcrop-vline,
.jcrop-light .jcrop-hline {
  background: #ffffff;
  filter: alpha(opacity=70) !important;
  opacity: .70!important;
}
.jcrop-light .jcrop-handle {
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  background-color: #000000;
  border-color: #ffffff;
  border-radius: 3px;
}
/* The "jcrop-dark" class/extension */
.jcrop-dark .jcrop-vline,
.jcrop-dark .jcrop-hline {
  background: #000000;
  filter: alpha(opacity=70) !important;
  opacity: 0.7 !important;
}
.jcrop-dark .jcrop-handle {
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  background-color: #ffffff;
  border-color: #000000;
  border-radius: 3px;
}
/* Simple macro to turn off the antlines */
.solid-line .jcrop-vline,
.solid-line .jcrop-hline {
  background: #ffffff;
}
/* Fix for twitter bootstrap et al. */
.jcrop-holder img,
img.jcrop-preview {
  max-width: none;
}
/* Apply these styles only when #preview-pane has
   been placed within the Jcrop widget */
.jcrop-holder #preview-pane {
  display: block;
  position: absolute;
  z-index: 2000;
  top: 10px;
  right: -130px;
  background-color: #fff;
  padding: 6px;
  border: 1px solid #bcbcbc;
}
/* The Javascript code will set the aspect ratio of the crop
   area based on the size of the thumbnail preview,
   specified here */
#preview-pane .preview-container {
  width: 100px;
  height: 100px;
  overflow: hidden;
}
</style>
<?
$ruta=$_SERVER["DOCUMENT_ROOT"]."/expertos/".$exp;
if (!is_dir($ruta)) {
		mkdir($ruta, 0777);
		chmod($ruta, 0777);
}



	$cualFoto="avatarin"; 
	$tmp_name = $_FILES[$cualFoto]["tmp_name"];
	$name = $_FILES[$cualFoto]["name"];
	$ext = getExtension($name);
 	$ext = strtolower($ext);
	
	if (($ext == "jpg")  || ($ext == "png") ||( $ext == "jpeg") ){
	 
	$yosoy = $exp.".".$ext;
	$copia=$ruta."/".$yosoy;
	
	if(copy($tmp_name,$copia)){
	//imagen para impresion
		
			 
smart_resize_image( $copia, $width = 500, $height = 0, $proportional = true, $output = 'file', $delete_original = true, $use_linux_commands = false, $quality = 90) ;
			 
			
	$alea=aleatorio(3);
	?>
<div class="clear20"></div>
 <div class="jc-demo-box">
    <img src="/expertos/<?=$exp?>/<?=$yosoy?>?v=<?=$alea?>"  id="target">
 
 
   <div id="preview-pane">
    <div class="preview-container">
      <img width="500" src="/expertos/<?=$exp?>/<?=$yosoy?>?v=<?=$alea?>" class="jcrop-preview" alt="Vista previa" />
    </div>
  </div>
 
 
    <div id="formaCrop">
     
			 <input type="hidden" name="ava" id="ava" value="<?=$yosoy?>">
              <input type="hidden" id="x" name="x">
			  <input type="hidden" id="y" name="y">
			  <input type="hidden" id="w" name="w">
			  <input type="hidden" id="h" name="h">
			   <input type="hidden" id="exp"  value="<?=$exp?>">

			  <input type="submit" id="submit" onClick="mandaCropeado(); return false;" class="botonEnviar" value="Guardar">
       
</div>
<div id="aquiCropeamos"></div>
<script type="text/javascript">
<? /*
 function mandaCropeado(){var a=$("#ava").val(),e=$("#x").val(),n=$("#y").val(),t=$("#w").val(),i=$("#h").val();""!=e&&""!=n&&""!=a&&$.ajax({type:"POST",url:"avatarCrop.php",data:"ava="+a+"&x="+e+"&y="+n+"&w="+t+"&h="+i,success:function(a){location.reload()}})}$(function(a){function e(e){if(parseInt(e.w)>0){var n=v/e.w,r=h/e.h;a("#x").val(e.x),a("#y").val(e.y),a("#w").val(e.w),a("#h").val(e.h),p.css({width:Math.round(n*t)+"px",height:Math.round(r*i)+"px",marginLeft:"-"+Math.round(n*e.x)+"px",marginTop:"-"+Math.round(r*e.y)+"px"})}}var n,t,i,r=a("#preview-pane"),o=a("#preview-pane .preview-container"),p=a("#preview-pane .preview-container img"),v=o.width(),h=o.height();a("#target").Jcrop({setSelect:[0,0,100,100],onChange:e,onSelect:e,bgOpacity:.5,aspectRatio:v/h},function(){var a=this.getBounds();t=a[0],i=a[1],n=this,r.appendTo(n.ui.holder)})});
	   */ ?>
	 
function mandaCropeado(){
	var ava=$('#ava').val();
	var x=$('#x').val();
	var y=$('#y').val();
	var w=$('#w').val();
	var h=$('#h').val();
	var exp=$('#exp').val();
 
if(x !="" && y!="" && ava!="" ){
				$.ajax({
				type: "POST",
				url: "avatarCrop.php",
				data: "ava="+ava+"&x="+x+"&y="+y+"&w="+w+"&h="+h+"&exp="+exp,
				success: 
				function(msg){
				location.reload();
				
				//$("#aquiCropeamos").html(msg);
				} });	
	
}	
}
$(function($){
	
	
  // Create variables (in this scope) to hold the API and image size
  var jcrop_api,
      boundx,
      boundy,
      // Grab some information about the preview pane
      $preview = $('#preview-pane'),
      $pcnt = $('#preview-pane .preview-container'),
      $pimg = $('#preview-pane .preview-container img'),
      xsize = $pcnt.width(),
      ysize = $pcnt.height();
    
   
  $('#target').Jcrop({
	   setSelect: [0,0,100,100],
    onChange: updatePreview,
    onSelect: updatePreview,
    bgOpacity: 0.5,
    aspectRatio: xsize / ysize
  },function(){
    // Use the API to get the real image size
    var bounds = this.getBounds();
    boundx = bounds[0];
    boundy = bounds[1];
    jcrop_api = this; // Store the API in the jcrop_api variable
    // Move the preview into the jcrop container for css positioning
    $preview.appendTo(jcrop_api.ui.holder);
  });
  function updatePreview(c) {
    if (parseInt(c.w) > 0) {
      var rx = xsize / c.w;
      var ry = ysize / c.h;
        
      $('#x').val(c.x);
      $('#y').val(c.y);
      $('#w').val(c.w);
      $('#h').val(c.h);
      $pimg.css({
        width: Math.round(rx * boundx) + 'px',
        height: Math.round(ry * boundy) + 'px',
        marginLeft: '-' + Math.round(rx * c.x) + 'px',
        marginTop: '-' + Math.round(ry * c.y) + 'px'
      });
    }
  }
});
 
</script>
    <?
	}
	}
?>