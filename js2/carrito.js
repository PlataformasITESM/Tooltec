function cambioCP(este, puesto){
if(!puesto){puesto="";}
var url=$('#urlSite').val();
var cp=este.length;
	 if(cp>=4){
	 $.ajax({
    type: "POST",
    url: url+"/_sitio/_register/codigosPostales.php",
    data: "cp="+este+"&puesto="+puesto,
    success: 
    function(msg){
	 $("#aqui").html(msg);
	   $('.botonEnviar ').show();
		$('.load').hide();		
		 
				
 	 }
   
			});

		}
}

function precioI(){
var cual=$('.presentacionesPrecios').first().data('pres');
var precio=$('.presentacionesPrecios').first().data('prec');
prodPres(cual, precio)

}

function prodPres(cual, precio){
$('.presentacionesPreciosP').removeClass('presentacionesPreciosP').addClass('presentacionesPrecios');
$('#pres'+cual).removeClass('presentacionesPrecios').addClass('presentacionesPreciosP');
$('.precios').html('$'+precio);
$('#presProd').val(cual)
}


/* carrito */

function carritoProducto(codigo,cuantos,recarga, titulo, presentacion){
 $('#agr'+codigo).css({'opacity':'.5'}).html(' ✔ Producto Agregado')
	if(cuantos){} else{cuantos=$('#cuantos'+codigo).val();}

 $('.load').show();
	$.ajax({
    type: "POST",
    url: $('#urlSite').val()+"/cartP",
    data: "que=producto&codigo="+codigo+"&cuantos="+cuantos+"&cliente="+$('#comprador').val()+"&idioma="+$('#idioma').val()+"&recarga="+recarga+"&usuario="+$('#US').val()+"&presentacion="+presentacion,
    success: 
    function(msg){

	if(recarga){	
	$("#carritoDiv").html(msg); 
	}
	else{
	$('#tituloProd').html(titulo);
	$("#agregado").fadeIn() ;
	$("#aqui").html(msg);
	
	}

	
 	 }
	})
}


function cantidadCarrito(codigo,donde,presentacion){
var hay=$('#cuantos'+codigo).val();
hay=parseInt(hay);

var max=$('#linea'+codigo).attr("data-max") 

if(donde=="mas"){
hay=hay+1;
}

if(donde=="menos"){
hay=hay-1;
}
if(hay<1){hay=1;}
if(hay>max){hay=hay-1;}

carritoProducto(codigo,hay,'recarga','',presentacion)

}


function addP(){
var cu=$('#productosCuantos').val();
carritoProducto($('#idProdu').val(),cu,'','',$('#presProd').val())
}


function productoCuantos(donde){
var hay=$('#productosCuantos').val();
hay=parseInt(hay);

if(donde=="mas"){
hay=hay+1;
}
if(donde=="menos"){
hay=hay-1;
}
if(hay<1){hay=1;}
$('#productosCuantos').val(hay)
}

function buscarProductos(produs){

if(produs.length>2){
	$.ajax({
    type: "POST",
    url: $('#urlSite').val()+"/search",
    data: "busca="+produs+"&idioma="+$('#idioma').val(),
    success: 
    function(msg){
        $('#resultadosProductos').html(msg);
	 }
	})
	}else{$('#resultadosProductos').html('').fadeOut(); $('.load').hide();}
}

function cambiaMoneda(monia){
localStorage['moneda']=monia;
	$.ajax({
    type: "POST",
    url: $('#urlSite').val()+"/cartP",
    data: "que=moneda&mone="+monia,
    success: 
    function(msg){
    top.location.reload();
	
 	 }
	})
}


function borraCarrito(cual, presentacion){
	$('#linea'+cual).slideToggle();
	$('#cuantos'+cual).val('0');
	carritoProducto(cual,0,'recarga','',presentacion)
}

function nuevaDireccion(cual){
$('#alertaBox').show();

    $.ajax({
    type: "POST",
    url: $('#urlSite').val()+"/direccion",
    data: "id="+cual,
    success: 
    function(msg){
	$('#alertaContent').html(msg);
 	 }
	})
}
	
function pedidoFactura(){

$('#rfc','#uso').css('borderColor','');
$("#rfcRespuesta").html('');
$('#completa').hide();

if($('input[name=factura]').is(':checked')){
      $('#siFactura').show();
    } else {
      $('#siFactura').hide();
      $('#rfc').val('');
      $('#uso').val('');
    }
}

function guardaForma(){




var datastring = JSON.stringify($("#forma").serializeArray());

$('.load').hide();

	$.ajax({
    type: "POST",
    url: $('#urlSite').val()+"/cartSave",
    data: "info="+datastring,
    success: 
    function(msg){
	$('#aqui').html(msg);
 	 }
	})
	
	valida();
	
}

function valida(){
var puedo=1;

    $( ".requeridoF" ).each(function() {
	
	este=$(this).val();
 
	if(!este){
	puedo=0;
	$(this).css('border','1px solid red');
	}
	})
	if($('input[name=factura]').is(':checked')){
	
	$( ".requeridoFac" ).each(function() {
	
	este=$(this).val();
 
	if(!este){
	puedo=0;
	$(this).css('border','1px solid red');
	}
	})
	}
	
 
if(puedo=="0"){$('#completa').show();}
setTimeout(function() {
	$('.requeridoF, .requeridoFac').css('border','1px solid #FFF');
	$('#completa').hide();
	
}, 3000);
	
if(puedo==1){
manda()
}
	
	

return puedo;
}

function pagar(){
$('#completa').hide();

var puedoF=valida();
if(puedoF==0){
$('#completa').show();
}

if(puedoF==1){
$('.load').show();
$('.botonAmarillo').fadeOut();
top.location.href=$('#urlSite').val()+"/tarjeta";
}


}

function metodoPago(){
$('#completa').hide();

var selecto=$("input[name='metodoPago']:checked").val();

if(!selecto) {
    	$('.radioCheck').css("border","1px solid #F00");
    	$('#completa').show();
	}else{
	    $('.radioCheck').css("border","1px solid #CDCDCD"); 
	    $('#completa').hide();
	    
	    $('.load').show();
	    $('.botonAmarillo').fadeOut();
	    
        top.location.href=$('#urlSite').val()+"/pago/"+selecto;
	}

}

//alturas

function productoTab(cual){
$('.productoTabsTab').hide();
$('.productoTabs').removeClass('productoTabsP');
$('#t'+cual).show();
$('#'+cual).addClass('productoTabsP');
}

function productoAltura(){
var altoI=$('.productoIz').height();
var altoD=$('.productoInfo').height();

if(altoI>altoD){alto=altoI}else {alto=altoD}

$('.productoIz').css('height',alto+'px');
$('.productoInfo').css('height',alto+'px');

}
//

$(function() {

//pon las tabs en el producto
$('.productoTabs').first().addClass('productoTabsP');
$('.productoTabsTab').first().show();


$("#rfc").change(function() {
	
$("#rfcRespuesta").html('');

	var este = this.value;

	var pasa='';
	var moral = new RegExp('^[A-Za-z]{3}[ |\-]{0,1}[0-9]{6}[ |\-]{0,1}[0-9A-Za-z]{3}$');
	var fisica = new RegExp('^[A-Za-z]{4}[ |\-]{0,1}[0-9]{6}[ |\-]{0,1}[0-9A-Za-z]{3}$');
		
	if (moral.test(este)){
		pasa=1;
	}
								
	if (fisica.test(este)){
		pasa=1;
    }
				
if(!pasa){

var alerta='<div class="table" id="rfcYaNo" style="display:block;">'+
    '<div class="material-icons" style="width:30px;">warning</div>'+
    '<div class="tableCell">El RFC '+este+' no es válido</div>'+
    '</div>';

$("#rfcRespuesta").html(alerta);
$('#rfc').val('');			
	}
});	

});	