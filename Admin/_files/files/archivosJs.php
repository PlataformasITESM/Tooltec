<script>

function refresca(){setTimeout(function(){$.ajax({type:"POST",url:"<?=$url?>/_files/files<?=$vieneFiles?>/folderArchivos.php",data:"e=<?=$e?>&u=<?=$u?>&c=<?=$idFolder?>&tipoArchivoSeleccion=<?=$tipoArchivoSeleccion?>&contenedor=<?=$contenedor?>&cuantosArchivos=<?=$cuantosArchivos?>",success:function(e){$("#carpeta").html(e)}})},1500)}$(function(){function e(e){return"number"!=typeof e?"":e>=1e9?(e/1e9).toFixed(2)+" GB":e>=1e6?(e/1e6).toFixed(2)+" MB":(e/1e3).toFixed(2)+" KB"}var t=0,a=0,o=0,n=104857600,r=100,i=$("#upload ul");$("#drop a").click(function(){$(this).parent().find("input").click()}),$("#upload").fileupload({dropZone:$("#drop"),add:function(p,s){var d=$('<li class="working"><input type="text" value="0" data-width="48" data-height="48" data-fgColor="#0788a5" data-readOnly="1" data-bgColor="#3e4043" /><p></p><span></span></li>');d.find("p").text(s.files[0].name).append("<i>"+e(s.files[0].size)+"</i>");var l=s.files[0].size,c=s.files[0].name,f=c.split(".").pop();n>=l&&(a=1),("jpg"==f||"png"==f||"gif"==f||"jpeg"==f||"svg"==f)&&(t=1),("txt"==f||"doc"==f||"docx"==f||"pdf"==f||"ppt"==f||"pptx"==f||"xls"==f||"xlsx"==f)&&(t=1),("rar"==f||"zip"==f)&&(t=1),("wav"==f||"mp3"==f)&&(t=1),("mp4"==f||"webm"==f||"ogg"==f)&&(t=1),1==a&&1==t&&(o=1),1!=o&&(d=$('<li class="working"><p class="error"></p><span></span></li>'),0==a&&(errorMsg=""+r+"MB Max"),0==t&&(errorMsg="File extension not allowed"),d.find("p").text(s.files[0].name).append("<i>"+e(s.files[0].size)+" <br>"+errorMsg+"</i>")),s.context=d.appendTo(i),d.find("input").knob(),d.find("span").click(function(){d.hasClass("working")&&u.abort(),d.fadeOut(function(){d.remove()})});var u=s.submit();1!=o&&(u.abort(),s.context.addClass("error"))},progress:function(e,t){var a=parseInt(t.loaded/t.total*100,10);t.context.find("input").val(a).change(),100==a&&(t.context.removeClass("working"),t.context.fadeOut(function(){}),refresca())},fail:function(e,t){t.context.addClass("error")}}),$(document).on("drop dragover",function(e){e.preventDefault()})});

<? /*

$(function(){


	
	var extBien=0;
	var pesoBien=0;
	var todoBien=0;
	
	var limite=100*1024*1024;
	var limiteM=100;
	
    var ul = $('#upload ul');

    $('#drop a').click(function(){
        // Simulate a click on the file input button
        // to show the file browser dialog
        $(this).parent().find('input').click();
    });

    // Initialize the jQuery File Upload plugin
    $('#upload').fileupload({

        // This element will accept file drag/drop uploading
        dropZone: $('#drop'),

        // This function is called when a file is added to the queue;
        // either via the browse button, or via drag/drop:
        add: function (e, data) {
			
			 

            var tpl = $('<li class="working"><input type="text" value="0" data-width="48" data-height="48"'+
                ' data-fgColor="#0788a5" data-readOnly="1" data-bgColor="#3e4043" /><p></p><span></span></li>');

            // Append the file name and file size
            tpl.find('p').text(data.files[0].name)
                         .append('<i>' + formatFileSize(data.files[0].size) + '</i>');
			
			
			//encontrar la extension
			var size=data.files[0].size;
			var file = data.files[0].name;
			var ext = file.split('.').pop();
			 
			
			if(size<=limite){
				pesoBien=1;
			}
			//imgs
			if(ext=="jpg" || ext=="png" || ext=="gif" || ext=="jpeg" ){
			extBien=1;	
			}
			//docs
			if(ext=="txt" || ext=="doc" || ext=="docx" || ext=="pdf" || ext=="ppt" || ext=="pptx" || ext=="xls" || ext=="xlsx" ){
			extBien=1;	
			}
			//comprimidos
			if(ext=="rar" || ext=="zip"   ){
			extBien=1;	
			}
			
			//audio
			if(ext=="wav" || ext=="mp3"   ){
			extBien=1;	
			}
			//video
			if(ext=="mp4" || ext=="webm" || ext=="ogg"   ){
			extBien=1;	
			}
           
		   if(pesoBien==1 && extBien==1){
			todoBien=1;   
		   }
			
			//mensaje de error
			if(todoBien!=1){
			tpl = $('<li class="working"><p class="error"></p><span></span></li>');
				
				
				if(pesoBien==0){
				errorMsg=""+limiteM+"MB Max";	
				}
				if(extBien==0){
				errorMsg="File extension not allowed";	
				}
				
				 tpl.find('p').text(data.files[0].name)
                         .append('<i>' + formatFileSize(data.files[0].size) + ' <br>'+errorMsg+'</i>');
				
			} 
			
			// Add the HTML to the UL element
            data.context = tpl.appendTo(ul);
			
			
			

            // Initialize the knob plugin
            tpl.find('input').knob();

            // Listen for clicks on the cancel icon
            tpl.find('span').click(function(){

                
				
				
				if(tpl.hasClass('working')){
                    jqXHR.abort();
                }

                tpl.fadeOut(function(){
                    tpl.remove();
                });

            });

            // Automatically upload the file once it is added to the queue
         
			var jqXHR = data.submit();
		
		if(todoBien!=1){ 
			 jqXHR.abort();
			  data.context.addClass('error');
			}
		
		},

        progress: function(e, data){

            // Calculate the completion percentage of the upload
            var progress = parseInt(data.loaded / data.total * 100, 10);

            // Update the hidden input field and trigger a change
            // so that the jQuery knob plugin knows to update the dial
            data.context.find('input').val(progress).change();

            if(progress == 100){
                data.context.removeClass('working');
				
				//aqui va la restriccion para que borre cuando acabe
				data.context.fadeOut(function(){
                    //data.context.remove();
                });
				//
				
				
				refresca();
            }
        },

        fail:function(e, data){
            // Something has gone wrong!
            data.context.addClass('error');
        }

    });


    // Prevent the default action when a file is dropped on the window
    $(document).on('drop dragover', function (e) {
        e.preventDefault();
    });

    // Helper function that formats the file sizes
    function formatFileSize(bytes) {
        if (typeof bytes !== 'number') {
            return '';
        }

        if (bytes >= 1000000000) {
            return (bytes / 1000000000).toFixed(2) + ' GB';
        }

        if (bytes >= 1000000) {
            return (bytes / 1000000).toFixed(2) + ' MB';
        }

        return (bytes / 1000).toFixed(2) + ' KB';
    }

});




function refresca(){
	

	
	setTimeout(function(){
      		$.ajax({
			 type: "POST",
			 url: "<?=$url?>/_files/files<?=$vieneFiles?>/folderArchivos.php",
			 data: "e=<?=$e?>&u=lau&c=idFolder&tipoArchivoSeleccion=<?=$tipoArchivoSeleccion?>&contenedor=<?=$contenedor?>&cuantosArchivos=<?=$cuantosArchivos?>",
			 success: 
			 function(msg){
			$("#carpeta").html(msg);
			 }

	 });
	   
    }, 1500);
	
		
	}	
	
*/	 ?>

</script>