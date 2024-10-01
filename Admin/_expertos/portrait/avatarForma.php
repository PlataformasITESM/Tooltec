<div class="blanco10"  >
<div class="formaB">
	<div class="formaT requerido">imagen</div>
    <div class="formaC">
   	<img src="/expertos/<?=$valor?>/<?=$img?>" width="200" />
	</div>
</div>

<div id="avatar" style="margin-top:0px; float:left; display:table;  ">
        <div class="clear10"></div>
        <form action="avatarImg.php" method="post" enctype="multipart/form-data" id="formaAvatar">
        <input type="hidden" name="exp" value="<?=$valor?>">
        <input type="file" name="avatarin" id="imagenAvatar" class="validate[required] field" accept="image/jpeg">
          
             <div class="divi15"></div>
            
    
</form>
        
        </div>

        
        <div id="avatarImgDiv"></div>
        
     </div>
 
  
<script>
$(document).ready(function(){$(".cerrar").click(function(a){$("#fondo").fadeOut(),$(".menuPerfil").hide(),a.stopPropagation()});var a={target:"#avatarImgDiv",success:function(){$("#formaAvatar").clearForm()}};$("#formaAvatar").ajaxForm(a)}),$("#imagenAvatar").bind("change",function(){var a=$("#imagenAvatar").val().split(".").pop().toLowerCase(),r="ok";-1==$.inArray(a,["gif","png","jpg","jpeg"])&&(alert("Invalid photo!"),$("#imagenAvatar").val(""),r="");var t=5242880;this.files[0].size>t&&(alert("5MB Máx"),$("#imagenAvatar").val(""),r=""),"ok"==r&&$("#formaAvatar").submit()});
<? /*
		
$(document).ready(function(){	
$( ".cerrar" ).click(function(e) {
   $('#fondo').fadeOut();
   $('.menuPerfil').hide();
     e.stopPropagation();
});
	
 
 var optionss2 = { 
        
		target:        '#avatarImgDiv', 
      	success: function(){
				$('#formaAvatar').clearForm();
				 }	
    }; 	
 $('#formaAvatar').ajaxForm(optionss2);
})
$('#imagenAvatar').bind('change', function() {
  var ext = $('#imagenAvatar').val().split('.').pop().toLowerCase();
	var ok="ok";
	if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
    alert('Extensión inválida!');
	$('#imagenAvatar').val('');
	ok="";
	}
	var size =5*1024*1024;
  if(this.files[0].size>size){
	   alert('5MB Máx');
	 $('#imagenAvatar').val(''); 
	 ok="";
  }
	if(ok=="ok"){
		$('#formaAvatar').submit();
	}
}); 
*/ ?>
		 
		</script>