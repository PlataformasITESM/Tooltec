(function ( $ ) {
 
    $.fn.filtrones = function( options ) {
 
        // Default options
        var settings = $.extend({
            
        }, options );

var tipo=settings.tipo;
var columna=settings.columna;
var sort=settings.sort;
var arreglo=settings.arreglo;
        // Apply options
		
		if(sort!==false){
		$('#tableHead').append('<th onclick="sorta(\''+columna+'\')">'+settings.titulo+'<div id="th-'+columna+'" class="sorti material-icons"></div></th>');
		}
		else{
		$('#tableHead').append('<th style="cursor:default;">'+settings.titulo+'<div id="th-'+columna+'" class="sorti material-icons" ></div></th>');
		}
		var apenda='<div class="filtro" data-tipo="'+tipo+'" data-columna="'+columna+'" >';
		
		if(tipo=="texto"){ 
		apenda +='<div class="filtroTitulo">'+settings.titulo+'</div>';
		apenda +='<div class="filtroSearch"><input type="search" id="search-'+columna+'"></div>';
		}
		
		if(tipo=="numerico"){ 
		apenda +='<div class="filtroTitulo">'+settings.titulo+'</div>';
		apenda += '<div class="filtroSelect">';
		apenda +='<select onchange="filtroSel(\''+columna+'\',this.value);" id="select-'+columna+'">';
		apenda +='<option value=""></option>';
		apenda +='<option value="igual">Igual</option>';
		apenda +='<option value="menor">Menor</option>';
		apenda +='<option value="mayor">Mayor</option>';
		apenda +='<option value="entre">Entre</option>';
		apenda +='</select>';
		apenda +='</div>';
		
		apenda += '<div class="filtroValor">';
		apenda +='<input type="number" step="0.01" id="v1-'+columna+'" style="display:none;">';
		apenda +='</div>';
		
		apenda += '<div class="filtroValor" style="margin-top:10px;">';
		apenda +='<input type="number" step="0.01" id="v2-'+columna+'" style="display:none;" >';
		apenda +='</div>';
		
		apenda +='</div>';
		}
		
		
		if(tipo=="fecha"){ 
		apenda +='<div  class="filtroTitulo">';
		apenda +=settings.titulo;
		apenda +='</div>';
		
		apenda += '<div class="div100">';
		apenda += '<div class="filtroSelect">';
		apenda +='<select onchange="filtroSel(\''+columna+'\',this.value);" id="select-'+columna+'">';
		apenda +='<option value=""></option>';
		apenda +='<option value="igual">Igual</option>';
		apenda +='<option value="menor">Menor</option>';
		apenda +='<option value="mayor">Mayor</option>';
		apenda +='<option value="entre">Entre</option>';
		apenda +='</select>';
		apenda +='</div>';
		
		apenda += '<div class="filtroValor">';
		apenda +='<input type="date" id="v1-'+columna+'" style="display:none;">';
		apenda +='</div>';
		
		apenda += '<div class="filtroValor" style="margin-top:10px;">';
		apenda +='<input type="date" id="v2-'+columna+'" style="display:none;" style="display:none;">';
		apenda +='</div>';
		
		apenda +='</div>';
		}
		
		if(tipo=="radio"){ 
		apenda +='<div class="filtroTitulo" >'+settings.titulo+'</div>';

		$.each(arreglo,function(key, vals) {
		apenda +='<label style="font-size:12px"><input name="'+columna+'" id="'+columna+'-'+key+'" type="radio" value="'+key+'">'+vals.titulo+'</label>';
		});
		
		}
		
		
		
		apenda +='</div><div class="clear"></div>';
        return this.append(apenda);
 
    };
 
}( jQuery ));

function filtroSel(cual,que){

$('#v1-'+cual).show();
$('#v2-'+cual).show();

if(que==""){
$('#v1-'+cual).val('').hide();
$('#v2-'+cual).val('').hide();
}

if(que!="entre"){
$('#v2-'+cual).val('').hide();
}else{
$('#v2-'+cual).show();
}
}


function buscarFiltros(donde){
var consultaFiltro={};
var buscarSi;
$( ".filtro" ).each(function() {

 columna=$(this).data('columna');
 tipo=$(this).data('tipo');
 var este={}
 
 este.busqueda=$('#search-'+columna).val();
 este.select=$('#select-'+columna).val();
 este.v1=$('#v1-'+columna).val();
 este.v2=$('#v2-'+columna).val();
 este.radio=$("input[name='"+columna+"']:checked").val();
 
 if(este.busqueda || este.v1 || este.radio){buscarSi=1;}
 
 consultaFiltro[columna]=este;
 
 
});

if(buscarSi==1){
busca=btoa(JSON.stringify(consultaFiltro));
console.log(busca);
top.location.href="?search="+busca;
}

}

function busquedaLlena(){
if($('#searchO').val()){
$('#filtrosMuestra').addClass('verde');
	var busq=JSON.parse(atob($('#searchO').val()));
	$.each(busq, function(key, val) {
   		$('#search-'+key).val(val.busqueda);
		$('#select-'+key).val(val.select);
		$('#v1-'+key).val(val.v1);
		
		if(val.select){
		$('#v1-'+key).val(val.v1).show();
		
		}
		
		if(val.select=="entre"){
		$('#v2-'+key).val(val.v2).show();
		}
		
		$("#"+key+"-"+val.radio).prop("checked", true);

		
		
   
   });
   }
   tablasFlechas();
}


function borraFiltros(){
top.location.href="?";
}

function muestraFiltros(){
$('#filtrosDiv').animate({ left: "0"  }, "fast" );
  event.stopPropagation();
}

function cierraFiltros(){
	$('#filtrosDiv').animate({ left: "-400px"  }, 100 );
	}


function sorta(cual){
//ordena
var hayLiga=$('#sortaLink').val();

var sors=$('#th-'+cual).text();
var searchO=$('#searchO').val();
var busq="";
var sorsS="ASC";
	if (sors=="arrow_drop_up"){
	sorsS="DESC";
}
	if(sors=="arrow_drop_down"){
	sorsS="ASC";
	}
	
	if(searchO){
	 busq="&search="+searchO;
	}
	
	if(hayLiga){
	top.location.href=hayLiga+"&c="+cual+"&o="+sorsS+busq;
	}else{
	top.location.href="?c="+cual+"&o="+sorsS+busq;
	}
}


function tablasFlechas(){
var camps=$('#campo').val();
var campsO=$('#campoOrden').val();

var ponT="arrow_drop_up";
if(campsO=="DESC"){
 var ponT="arrow_drop_down";
 }
 $('#th-'+camps).text(ponT);
}

function tablaAlto (){
if($(".tablas").length){
var alto=$( window ).height()-$(".tablas").offset().top-50;
if(alto<400){alto=400;}
$('.tablaPadre').height(alto+'px');
}
}
 
 $(function() {
// crea el div
var apenda='<div class="filtrosDiv" id="filtrosDiv">'+
'<div class="filtrosBottom" onclick="buscarFiltros();" id="filtrosDivBoton">Filtrar</div>'+
'</div>';
$('body').prepend(apenda);
$('#filtrosDiv').prepend('<div class="left titulos padd10">Filtros</div><div onclick="cierraFiltros()" class="close material-icons">clear</div><div class="clear"></div><div class="right cursor padd5" onclick="borraFiltros()">Borrar filtros</div>');

// pon las flechitas


//alto
tablaAlto()

 $(window).on('resize', function(){
  tablaAlto()
}); 

 });
 
 
 // reordenes

 function reordena(base){ 
	closeAlert();
	 
	 $('body').prepend('<div id="alerta" class="alerta" style="max-width:300px; height:100%; overflow-y: auto; text-align: left;"></div>');
	 $('#alerta').prepend('<div id="alertaBox" class="alertaBox" style="margin: auto;  "><div class="right material-icons cursor" onClick="$(\'#alerta\').fadeOut().html(\'\'); $(\'.contenido\').css(\'filter\',\'\'); ">clear</div><div class="" id="sortaReorden"></div></div>'); 
	 
	 $( "tr" ).each(function() {
		 
		 var tits=$(this).data('titulo');
		
		 apendita='<div id="'+this.id+'" class="div100 ordenaMabo" style="position:relative; cursor:ns-resize;">'+
		 '<div class="material-icons" style=" position:absolute; left:0;">drag_indicator</div>'+
		 '<div class="div100" style=" padding:5px 5px 5px 20px">'+tits+'</div>'+
		 '</div>';
		  if(tits){
		 $('#sortaReorden').append(apendita);
			}
	 });
	 
	  $('#sortaReorden').append('<input type="hidden" id="inputReordena"><div class="clear10"></div><div onclick="reordenaMabo(\''+base+'\');" class="boton" id="botonReorden" style="display:none; font-size:12px;">Guardar</div>');
  	 $('#alerta').fadeIn();
	 
	 $( "#sortaReorden" ).sortable({
	 	update: function () {
               reordenaYa()
            } 
			}).disableSelection();
		
 }
 
 function reordenaYa(){
 $('#botonReorden').show();
 var arregloReorden=[];
 $( ".ordenaMabo" ).each(function() {
arregloReorden.push(this.id);
 });
 arregloReorden=arregloReorden.join(',');
 $('#inputReordena').val(arregloReorden);
 
 }
 
 function reordenaMabo(base){
var ordenito= $('#inputReordena').val();

$.ajax({
    type: "POST",
    url: $('#url').val()+"/_api/procesos/reorden.php",
    data: "base="+base+"&ordenito="+ordenito,
    success: 
    function(msg){
		closeAlert();
		//$("#aqui").html(msg);
		location.reload();

		
 	 }
   	});

 }