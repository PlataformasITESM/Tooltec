(function ( $ ) {
 
    $.fn.maboSelects = function( options ) {
 
        // Default options
        var settings = $.extend({
            
        }, options );

var tabla=settings.tabla;
var vacio=settings.vacio;
var cambio=settings.cambio;
var requerido=settings.requerido;

var apenda="";
        // Apply options
	apenda +='<input   type="hidden" id="searcHS'+tabla+'" name="searcHS'+tabla+'" >';
	apenda +='<input onclick="$(this).select();" onblur="maboSelectSeleccion(\''+tabla+'\',\'oculta\')" onkeyup="maboSearch(\''+tabla+'\',this.value,\''+cambio+'\',\''+requerido+'\');"  type="text" id="searcH'+tabla+'" placeholder="'+vacio+'" autocomplete="off"  />';
	apenda +='<div class="searchResults" id="searchR'+tabla+'"></div>';
	
	
if(requerido){
setTimeout(
  function() 
  {
maboSearchRequerido(tabla);
}, 200);

}
	
    return this.append(apenda);
	
		
 
    };
 
}( jQuery ));

function maboSearch(tabla,busq,cambio,requerido){

$('#searcHS'+tabla).val('');
$('#searchR'+tabla).html('').hide();
if(busq.length>1){
	$.ajax({
    type: "POST",
    url: "/_api/procesos/select.php",
    data: "tabla="+tabla+"&search="+busq+"&cambio="+cambio+"&requerido="+requerido,
    success: 
		function(msg){
		//alert(msg);
		$('#searchR'+tabla).html(msg).show();
		}
    });
	}
	
	if(cambio=='vendedor'){
	$('#vendedorAsignado').html('');
	agregaUsuarios();
	}

}

function addSelectMabo(tabs,cual,cambio,oculta,requerido){
var tit=$('#'+tabs+'_'+cual).text();
$('#searcHS'+tabs).val(cual);
$('#searcH'+tabs).val(tit).removeClass('errorForma');

if(requerido){
maboSearchRequerido(tabs);
}

if(oculta){
$('#searchR'+tabs).html('');
}
$('#searchR'+tabs).hide();

$('#campoTexto'+tabs).html($('#option'+cual).html());

if(cambio=='sucursales'){

var suc=$('#sucursalE').val();

		$.ajax({
					type: "POST",
					url: "/_agenda/evento/clienteSucursal.php",
					data: "tabla="+tabs+"&cual="+cual+"&suc="+suc,
					success: 
			function(msg){
			//alert(msg);
			$('#divSucursales').html(msg).show();
			}
					});
}

if(cambio=='vendedor'){
		$.ajax({
					type: "POST",
					url: "/_api/procesos/clienteVendedor.php",
					data: "tabla="+tabs+"&cual="+cual,
					success: 
			function(msg){
			//alert(msg);
			$('#vendedorAsignado').html(msg).show();
			agregaUsuarios();
			}
					});
}

}

function maboSelectSeleccion(tabs,oculta){
setTimeout(
  function() 
  {
var hay=$('#searcHS'+tabs).val();
if(!hay){
$('#searcH'+tabs).val('');
$('#searcHS'+tabs).val('');
if(oculta){
$('#searchR'+tabs).html('');
}
$('#searchR'+tabs).hide();
$('#divSucursales').html('').hide();
}
}, 200);
}

// listados creados

(function ( $ ) {
 
    $.fn.maboSelectsLista = function( options ) {
 
        // Default options
        var settings = $.extend({
            
        }, options );

var campo=settings.campo;
var listado=settings.listado;
var vacio=settings.vacio;
var requerido=settings.requerido;

if(requerido){ponRequ="validate[required]";}
var apenda="";
        // Apply options
	apenda +='<input   type="hidden" id="searcHS'+campo+'" name="searcHS'+campo+'" >';
	apenda +='<input class="'+ponRequ+'" onclick="$(this).select(); maboMuestraListado(\''+campo+'\')" onkeyup="maboSearchLista(this.value,\''+campo+'\');" onblur="maboSelectSeleccion(\''+campo+'\',\'\')" type="text" id="searcH'+campo+'" placeholder="'+vacio+'" autocomplete="off">';
	apenda +='<div class="clear"></div><div class="searchResults searchResultsMax" id="searchR'+campo+'">';
	$.each(listado, function(key, val) {
	apenda +=val;
	});
	apenda +='</div>';
	
    return this.append(apenda);
	

	
 
    };
 
}( jQuery ));


function maboMuestraListado(campo){
$('.listado_'+campo).show();
$('#searchR'+campo).fadeIn();
}

function maboSearchLista(text,campo){
$('#searcHS'+campo).val('');
query=buscaLimpia(text);
 $('.listado_'+campo).each(function(){
      var $this = $(this);
		var buscado=$this.text().toLowerCase();
		buscado=buscaLimpia(buscado);
         if(buscado.indexOf(query) === -1){
             $this.closest('.listado_'+campo).hide();
			 }
        else {$this.closest('.listado_'+campo).show();}
  });
}


function buscaLimpia(cadena){
cadena=cadena.replace('Ã¡','a');
cadena=cadena.replace('Ã©','e');
cadena=cadena.replace('Ã­','i');
cadena=cadena.replace('Ã³','o');
cadena=cadena.replace('Ãº','u');
cadena=cadena.replace('Ã±','n');

return cadena;
}


function maboSearchRequerido(tabla){

var selecto=$('#searcHS'+tabla).val();

if(selecto){
 $('#searcH'+tabla).css('border','');
	$('#botonEnviar').show();
}else{
 $('#searcH'+tabla).css('borderColor','red');
	$('#botonEnviar').hide();
}

}

// usuarios

(function ( $ ) {
 
    $.fn.maboUsuariosSelects = function( options ) {
 
        // Default options
        var settings = $.extend({
            
        }, options );

var permiso=settings.permiso;
var tabla="usuarios";
var apenda="";
        // Apply options
	apenda +='<input   type="hidden" id="usuarios" name="usuarios" >';
	apenda +='<input   type="hidden" id="usuariosMuerte" name="usuariosMuerte" >';
	
					
if(permiso){
	apenda +='<input onclick="$(this).select();" onblur="maboSelectSeleccion(\''+tabla+'\',\'\')"  onkeyup="maboSearch(\''+tabla+'\',this.value,\'\');" autocomplete="off" type="text" id="searcH'+tabla+'" placeholder="Buscar usuarios">';
}
	apenda +='<div class="searchResults" id="searchR'+tabla+'"></div>';
	
	
	setTimeout(
  function() 
  {
agregaUsuarios();
}, 200);
	
	
        return this.prepend(apenda);
		

    };
 
}( jQuery ));

function agregaUsuarios(){
var usas=[];
var cuenta=0;
$('#usuarios').val('');
$('#searcHusuarios').css('borderColor','red');

$( ".selectUsuariosP" ).each(function() {
cuenta=cuenta+1;
var este=$(this).data('id');
usas.push(este);
});

if(cuenta>0){
$('#searcHusuarios').css('border','');
$('#usuarios').val(usas.join(','));
$('#noUsuarios').hide();
$('#botonEnviar').show();
}else{
$('#noUsuarios').show();
$('#botonEnviar').hide();
}

borradosValida('usuarios');
}

function borraUs(cual){
$('#usuarios_'+cual).remove();
agregaUsuarios();

var matados=$('#usuariosMuerte').val();
if(matados){
matados=matados.split(',');
}else{
matados=[];
}

matados.push(cual);
$('#usuariosMuerte').val(matados.join(','));
}
// usuarios

function borradosValida(tabs){
var matados=$('#'+tabs+'Muerte').val();
if(matados){
  matados=matados.split(',');
var vivos=($('#'+tabs+'Input').val()).split(',');

matados = $.grep(matados, function(value) {
    return $.inArray(value, vivos) < 0;
});

$('#'+tabs+'Muerte').val( matados.join( ", " ) );

}
}

//productos
(function ( $ ) {
 
    $.fn.maboProductosSelect = function( options ) {

        // Default options
        var settings = $.extend({
            
        }, options );

var tabla="productos";
var apenda="";
        // Apply options
	apenda +='<input type="hidden" id="productos" name="productos" >';	
	apenda +='<input type="hidden" id="productosMuerte" name="productosMuerte" >';	
	apenda +='<input onclick="$(this).select();" onblur="maboSelectSeleccion(\''+tabla+'\',\'\')"  onkeyup="maboSearch(\''+tabla+'\',this.value,\'\');" autocomplete="off" type="text" id="searcH'+tabla+'" placeholder="Buscar productos">';
	apenda +='<div class="searchResults" id="searchR'+tabla+'"></div>';

	
	setTimeout(
  function() 
  {
agregaProducto();
}, 200);


  return this.prepend(apenda);
		

    };
 
}( jQuery ));

function agregaProducto(){
var usas=[];
$('#productos').val('');

$( ".selectProductosP" ).each(function() {
var este=$(this).data('id');
usas.push(este);
});

$('#productos').val(usas.join(','));

borradosValida('productos');
}

function borraProd(cual){
$('#productos_'+cual).remove();
agregaProducto();

var matados=$('#productosMuerte').val();
if(matados){
matados=matados.split(',');
}else{
matados=[];
}
matados.push(cual);
$('#productosMuerte').val(matados.join(','));
}



