jQuery.extend({createUploadIframe:function(e,t){var n="jUploadFrame"+e;if(window.ActiveXObject){var o=document.createElement('<iframe id="'+n+'" name="'+n+'" />');"boolean"==typeof t?o.src="javascript:false":"string"==typeof t&&(o.src=t)}else{var o=document.createElement("iframe");o.id=n,o.name=n}return o.style.position="absolute",o.style.top="-1000px",o.style.left="-1000px",document.body.appendChild(o),o},createUploadForm:function(e,t){var n="jUploadForm"+e,o="jUploadFile"+e,r=$('<form  action="" method="POST" name="'+n+'" id="'+n+'" enctype="multipart/form-data"></form>'),a=$("#"+t),c=$(a).clone();return $(a).attr("id",o),$(a).before(c),$(a).appendTo(r),$(r).css("position","absolute"),$(r).css("top","-1200px"),$(r).css("left","-1200px"),$(r).appendTo("body"),r},ajaxFileUpload:function(e){e=jQuery.extend({},jQuery.ajaxSettings,e);var t=(new Date).getTime(),n=jQuery.createUploadForm(t,e.fileElementId),o=(jQuery.createUploadIframe(t,e.secureuri),"jUploadFrame"+t),r="jUploadForm"+t;e.global&&!jQuery.active++&&jQuery.event.trigger("ajaxStart");var a=!1,c={};e.global&&jQuery.event.trigger("ajaxSend",[c,e]);var u=function(t){var r=document.getElementById(o);try{r.contentWindow?(c.responseText=r.contentWindow.document.body?r.contentWindow.document.body.innerHTML:null,c.responseXML=r.contentWindow.document.XMLDocument?r.contentWindow.document.XMLDocument:r.contentWindow.document):r.contentDocument&&(c.responseText=r.contentDocument.document.body?r.contentDocument.document.body.innerHTML:null,c.responseXML=r.contentDocument.document.XMLDocument?r.contentDocument.document.XMLDocument:r.contentDocument.document)}catch(u){jQuery.handleError(e,c,null,u)}if(c||"timeout"==t){a=!0;var d;try{if(d="timeout"!=t?"success":"error","error"!=d){var l=jQuery.uploadHttpData(c,e.dataType);e.success&&e.success(l,d),e.global&&jQuery.event.trigger("ajaxSuccess",[c,e])}else jQuery.handleError(e,c,d)}catch(u){d="error",jQuery.handleError(e,c,d,u)}e.global&&jQuery.event.trigger("ajaxComplete",[c,e]),e.global&&!--jQuery.active&&jQuery.event.trigger("ajaxStop"),e.complete&&e.complete(c,d),jQuery(r).unbind(),setTimeout(function(){try{$(r).remove(),$(n).remove()}catch(t){jQuery.handleError(e,c,null,t)}},100),c=null}};e.timeout>0&&setTimeout(function(){a||u("timeout")},e.timeout);try{var n=$("#"+r);$(n).attr("action",e.url),$(n).attr("method","POST"),$(n).attr("target",o),n.encoding?n.encoding="multipart/form-data":n.enctype="multipart/form-data",$(n).submit()}catch(d){jQuery.handleError(e,c,null,d)}return window.attachEvent?document.getElementById(o).attachEvent("onload",u):document.getElementById(o).addEventListener("load",u,!1),{abort:function(){}}},uploadHttpData:function(r,type){var data=!type;return data="xml"==type||data?r.responseXML:r.responseText,"script"==type&&jQuery.globalEval(data),"json"==type&&eval("data = "+data),"html"==type&&jQuery("<div>").html(data),data}});