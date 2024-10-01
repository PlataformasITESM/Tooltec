$(function() {


 

guardado();
//forma

$("#tablesorter").dataTable();

$('.logos').bind('change', function() {
error=0;
var maxFile=3;
var max=maxFile*1024*1024;
 var ext = $(this).val().split('.').pop().toLowerCase();
 var size=this.files[0].size
var ok="ok";
if(ext!=''){
if($.inArray(ext, ['png','jpg','jpeg']) == -1) {
error=1;
alert('Extensión inválida! Sólo imágenes');
$(this).val('');
ok="";
}

if(size>max && error==0){
$(this).val('');
error=1;
alert('Peso máximo '+maxFile+'MB');
}
}

if(error==0){
divo=$(this).data('imgdiv');

muestraImg(this,divo);
}

});


$('.logosD').bind('change', function() {
error=0;
var maxFile=10;
var max=maxFile*1024*1024;
 var ext = $(this).val().split('.').pop().toLowerCase();
 var size=this.files[0].size
var ok="ok";
if(ext!=''){
if($.inArray(ext, ['png','jpg','jpeg','zip','pdf']) == -1) {
error=1;
alert('Extensión inválida! );
$(this).val('');
ok="";
}

if(size>max && error==0){
$(this).val('');
error=1;
alert('Peso máximo '+maxFile+'MB');
}
}

if(error==0){
divo=$(this).data('imgdiv');

muestraImg(this,divo);
}

});


}); 

//descargas

 $(function() {

$('#filtrosDiv').filtrones({
"columna":'titulo',
"titulo":'Título',
"tipo":'texto',
"busqueda":'',
});



busquedaLlena();


$('.logos').bind('change', function() {
	error=0;
	var maxFile=10;
	var max=maxFile*1024*1024;
	  var ext = $(this).val().split('.').pop().toLowerCase();
	  var size=this.files[0].size
		var ok="ok";
		if(ext!=''){
		if($.inArray(ext, ['png','jpg','jpeg','pdf','zip']) == -1) {
		error=1;
		alert('Extensión inválida');
		$(this).val('');
		ok="";
		}
		 
		if(size>max && error==0){
		$(this).val('');
		error=1;
		alert('Peso máximo '+maxFile+'MB');
		}
		}
		
		if(error==0){
		divo=$(this).data('imgdiv');
		
		muestraImg(this,divo);
		}
		 
	});
	


});

