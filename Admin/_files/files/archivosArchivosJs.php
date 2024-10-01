<script>
 function refresca(){setTimeout(function(){$.ajax({type:"POST",url:"<?=$url?>/_files/files/folderArchivos.php",data:"e=<?=$e?>&u=<?=$u?>&c=<?=$idFolder?>",success:function(e){$("#carpeta").html(e)}})},1500)}$(function(){function e(e){return"number"!=typeof e?"":e>=1e9?(e/1e9).toFixed(2)+" GB":e>=1e6?(e/1e6).toFixed(2)+" MB":(e/1e3).toFixed(2)+" KB"}var o=0,i=0,t=0,a="<?=$fileTipo?>",n=104857600,r=100,p=$("#upload ul");$("#drop a").click(function(){$(this).parent().find("input").click()}),$("#upload").fileupload({dropZone:$("#drop"),add:function(d,s){var l=$('<li class="working"><input type="text" value="0" data-width="48" data-height="48" data-fgColor="#0788a5" data-readOnly="1" data-bgColor="#3e4043" /><p></p><span></span></li>');l.find("p").text(s.files[0].name).append("<i>"+e(s.files[0].size)+"</i>");var c=s.files[0].size,f=s.files[0].name,u=f.split(".").pop();n>=c&&(i=1),"img"==a&&("jpg"==u||"png"==u||"gif"==u||"jpeg"==u||"svg"==u)&&(o=1),"doc"==a&&("txt"==u||"doc"==u||"docx"==u||"pdf"==u||"ppt"==u||"pptx"==u||"xls"==u||"xlsx"==u)&&(o=1),"zip"==a&&("rar"==u||"zip"==u)&&(o=1),"audio"==a&&("wav"==u||"mp3"==u)&&(o=1),"video"==a&&("mp4"==u||"webm"==u||"ogg"==u)&&(o=1),1==i&&1==o&&(t=1),1!=t&&(l=$('<li class="working"><p class="error"></p><span></span></li>'),0==i&&(errorMsg=""+r+"MB Max"),0==o&&(errorMsg="Only <?=$fileTipo?>"),l.find("p").text(s.files[0].name).append("<i>"+e(s.files[0].size)+" <br>"+errorMsg+"</i>")),s.context=l.appendTo(p),l.find("input").knob(),l.find("span").click(function(){l.hasClass("working")&&g.abort(),l.fadeOut(function(){l.remove()})});var g=s.submit();1!=t&&(g.abort(),s.context.addClass("error"))},progress:function(e,o){var i=parseInt(o.loaded/o.total*100,10);o.context.find("input").val(i).change(),100==i&&(o.context.removeClass("working"),o.context.fadeOut(function(){}),refresca())},fail:function(e,o){o.context.addClass("error")}}),$(document).on("drop dragover",function(e){e.preventDefault()})});
 
 <? /*

$(function(){


	
	var extBien=0;
	var pesoBien=0;
	var todoBien=0;
	
 	var fileTipo="<?=$fileTipo?>";
	
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
			  if ( fileTipo=="img"){  
			if(ext=="jpg" || ext=="png" || ext=="gif" || ext=="jpeg" ){
			extBien=1;	
			}
			 } 
			
			
			//docs
			  if (fileTipo=="doc"){  
			if(ext=="txt" || ext=="doc" || ext=="docx" || ext=="pdf" || ext=="ppt" || ext=="pptx" || ext=="xls" || ext=="xlsx" ){
			extBien=1;	
			}
			  }  
			
			//comprimidos
			
			 if (fileTipo=="zip"){ 
			if(ext=="rar" || ext=="zip"   ){
			extBien=1;	
			}
			 } 
			
			//audio
			
			 if (fileTipo=="audio"){ 
			if(ext=="wav" || ext=="mp3"   ){
			extBien=1;	
			}
			 } 
			
			
			//video
			 if (fileTipo=="video"){ 
			if(ext=="mp4" || ext=="webm" || ext=="ogg"   ){
			extBien=1;	
			}
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
				errorMsg="Only <?=$fileTipo?>";	
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
			 url: "<?=$url?>/_files/files/folderArchivos.php",
			 data: "e=<?=$e?>&u=lau&c=idFolder",
			 success: 
			 function(msg){
			$("#carpeta").html(msg);
			 }

	 });
	   
    }, 1500);
	
		
	}	
	
 */ ?>

</script>