

function closeAlertElement(){
	 $('.alertas').fadeOut();
	 $('#elementosAqui').html('');
  }

function columnasShow(colas){
	$('.columnasDivs').hide();
	$('.columnasDivs').each(function() {
		var este=$(this).data('id');
	    
		if(este<=colas){
			
			$(this).show();
		}
		
		 anchos=100/colas;
		 anchos=anchos.toFixed(4);
		 anchosO=Math.floor(anchos);
		 
		if(anchos>33){ anchos=33;}
		$('.columnasDivs').css('width',anchos+'%');
		
		
		
	});
	$('.anchines').val(anchosO);
}

function ajusteImg(este){

if(este=='px'){
$('.ajustePx').show();
$('#ancho').append('<option value="fijoPx" selected>Ancho Fijo Px</option>');
}else{
$('.ajustePx').hide();
$('#altoFijoPx').val('');
$('#anchoFijoPx').val('');
$("#ancho option[value='fijoPx']").remove();
}

};


function clasesPre(tips){
if(tips=="titulo"){arre="arregloClasesTits";}
if(tips=="texto"){arre="arregloClasesTexto";}
var arrepre=$('#'+arre).val().split(',');

for (const element of arrepre) {
$('#'+tips+'_pre').append('<label class="div100 '+element+'"><input id="'+tips+'_'+element+'" type="checkbox" name="'+tips+'Pre[]" value="'+element+'">'+element+'</label>');
}

}

function anchos(){

$('#ancho').append('<option value="100">100%</option>');
$('#ancho').append('<option value="85">85%</option>');
$('#ancho').append('<option value="80">80%</option>');
$('#ancho').append('<option value="75">75%</option>');
$('#ancho').append('<option value="70">70%</option>');
$('#ancho').append('<option value="66">66.66% 2/3</option>');
$('#ancho').append('<option value="50">50% 1/2</option>');
$('#ancho').append('<option value="33">33.33% 1/3</option>');
$('#ancho').append('<option value="30">30% </option>');
$('#ancho').append('<option value="25">25% 1/4</option>');
$('#ancho').append('<option value="20">20% 1/5</option>');
$('#ancho').append('<option value="16">16.66% 1/6</option>');
$('#ancho').append('<option value="15">15%</option>');
$('#ancho').append('<option value="10">10%</option>');
$('#ancho').append('<option value="Auto">Automático</option>');

}

 $(".botonEnviar").click(function() {
       
   CKupdate();

});


function CKupdate(){
    for ( instance in CKEDITOR.instances )
        CKEDITOR.instances[instance].updateElement();
}

$(function() {

 


$(".colores").spectrum({
 showAlpha: true,
 preferredFormat: "rgb",
  allowEmpty:true,
  clickoutFiresChange: true,
   showInput: true,
   move: function(color){
               
               $(this).val(color.toRgbString());

            }

});


$( ".cke" ).each(function() {
var edits=$(this).id;

 CKEDITOR.replace( this.id );

});

 


$("#forma").validationEngine({scroll: false,
autoHidePrompt: true,
    // Delay before auto-hide
    autoHideDelay: 1000,
    // Fade out duration while hiding the validations
    fadeDuration: 0.3,
	promptPosition : "topRight:-100,-30"
}); 
 var optionss = { 
        target:        '#sub', 
		beforeSend: function(){
				$('.load').show();
				
				 },
      	success: function(){
				$('.elementosFooter').hide();
				$
				 }	
    }; 	
 $('#forma').ajaxForm(optionss);




$(document).keyup(function(e) {
     if (e.keyCode == 27) { // escape key maps to keycode `27`
       closeAlertElement();
    }
});



//no espacios

$('.clases').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z0-9 ]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    e.preventDefault();
    return false;
});




$('.noEspacio').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z0-9]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    e.preventDefault();
    return false;
});


 $('.entero').number( true, 0 );
 $('.decimal').number( true, 2 );

}); 





$(document).on('click', '.decimal', function(){ $(this).select(); }); 
$(document).on('click', '.entero', function(){ $(this).select(); }); 


function eleTabs(cual){
$('.tabsDivs').hide();
$('#ele-'+cual).fadeIn();
$('.elementoTabs').removeClass('elementoTabsP');
$('#tab-'+cual).addClass('elementoTabsP');

}
 