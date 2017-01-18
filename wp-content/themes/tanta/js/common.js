// JavaScript Document

var herramientas = {
	comentarios:function(){
		if($(".form-submit").length){			
			var obj = $(".form-submit input").clone();
			$(".form-submit input").remove();
			
			$('<span></span>').appendTo('p.form-submit');
			$(".form-submit span").append(obj);
		}	
	},
	imprimir:function(){
		if($('#print')){
			$('#print').append('<a href="" class="btn btn_dArrow btnType02"><span><span>Imprimir</span></span></a>');
			
			$('#print a').bind('click',function(e){
				window.print();
				
				e.preventDefault();
			});
		}
	}
}

var formsValidations = {
		setMsgError:function(txt, form){
		
			var parentForm = form.parent();
			var msgError = parentForm.find(".msgError");
			var divElement = (msgError.length != 0) ? msgError.eq(0) : document.createElement("div");		
			var ulElement = document.createElement("ul");
			var liElement = null;		
			var errors = txt.split("|");
			var msgConfirm = $(".msgConfirm");			
			jQuery(divElement).attr("class", "msgError");
			jQuery(divElement).attr("tabIndex","-1");				
			
			if(jQuery(divElement).find("ul").length != 0) jQuery(divElement).empty();
			
			for(var i = 0; i < errors.length - 1; i++){
				liElement = document.createElement("li");
				liElement.appendChild(document.createTextNode(errors[i]));
				ulElement.appendChild(liElement);
			}
			
			jQuery(divElement).append($("<span>La publicación del comentario no ha podido realizarse por estos motivos:</span>"));
			jQuery(divElement).append(ulElement);		
			if(msgError.length == 0) form.before(jQuery(divElement));			
			jQuery(divElement).focus();		
		
	},
	validaComentarios:function(obj){
		var errorTxt = "";
		var f = $(obj);			
		var author = f.find("input#author");
		var email = f.find("input#email");
		var comentario = f.find("textarea#comment");
		var acepto = f.find("input#acepto");
		var condiciones = f.find("input:checkbox");
		var parentt;
		if(author.length != 0){
			parentt = author.parent();
			if(!author.val()){
				errorTxt += "El campo 'Tu nombre' es obligatorio |";
				parentt.addClass("error");
			}else parentt.removeClass("error");
			
			parentt = email.parent();
			if(!email.val()){
				errorTxt += "El campo 'Tu email (no será publicado)' es obligatorio |";			
				parentt.addClass("error");
			}else{
				parentt.removeClass("error");
				if(!regularExpressions.isValidEmail(email.val())){
					errorTxt += "El formato del campo 'Tu email (no será publicado)' no es correcto |";			
					parentt.addClass("error");
				}else parentt.removeClass("error");
			}
		}
				
		parentt = comentario.parent();
		
		if(!comentario.val()){
			errorTxt += "El campo 'Tus comentarios' es obligatorio |";
			parentt.addClass("error");
		}else parentt.removeClass("error");
		
		
		parentt = condiciones.parent();
		
		if(!condiciones.is(":checked")){
			errorTxt += "Debes aceptar las condiciones legales |";
			parentt.addClass("error");
		}else parentt.removeClass("error");
		
				
		
		if(errorTxt != ""){				
			formsValidations.setMsgError(errorTxt, f);
			return false;
		}else{			
			return true;
		}
	}
		
}

/* expresiones regulares para validar formularios */
var regularExpressions = {	
	isValidEmail:function (str){
		var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		return (filter.test(str));
	}
}

var suscripcionNewsletter = {

	init:function(){
	
		var em = jQuery("#inp_newsletter").val();
		var obj = jQuery("#newsletterform");
		var acepto = obj.find(":checkbox");
		var action = obj.find("#template_directory").val() + "/suscripcion.php";
		var msg = "";
		
		obj.find(".msg").remove();
		if(!acepto.is(":checked")){			
			obj.append("<span class='msg both clear'>Debes aceptar las condiciones legales</span>");
			
		}else{
		
			if(em != ''){
				$.ajax({
					'url': action,			
					'dataType': 'json',
					'type': 'post',
					'data':'inp_newsletter='+em,
					'success': function(data){					
						if(typeof(data.Code) == "undefined"){
							msg = "Tu suscripción se ha realizado correctamente. En breve recibirás un correo electrónico para que confirmes la suscripción";
							jQuery("#inp_newsletter").val('');
							obj.find(":checkbox").prop ('checked', '');
						}else{
							switch(data.Code){
								case 1: // Invalid email address.Email Address passed in was invalid.
									msg = "El email no es correcto";
									break;
								case 204:// In Suppression List.Email Address exists in suppression list. Subscriber is not added.
								case 205:// Is Deleted.Email Address exists in deleted list. Subscriber is not added.
								case 206:// Is Unsubscribed.Email Address exists in unsubscribed list. Subscriber is not added.
								case 207: // Is Bounced.Email Address exists in bounced list. Subscriber is not added.
									msg = "Ha habido un problema con tu suscripción. Ponte en contacto con nosotros";
									break;
								case 208: //Is Unconfirmed.Email Address exists in unconfirmed list. Subscriber is not added.
									msg = "El correo electrónico proporcionado se encuentra en la lista de pendientes de confirmar la suscripción";
									break;
								default:
									msg = "Ha habido un problema con tu suscripción. Ponte en contacto con nosotros";
									break;
							}
						}
						obj.append("<span class='msg both clear ok'>"+msg+"</span>");
					}
				});
			}else{
				obj.append("<span class='msg both clear'>Debes rellenar el campo email</span>");
			}
		
		}
	
		return false;
	
	}


}

var fixes = {

	controlHeight:function(obj){

		var elems = obj.find("article");
		for(var i = 0; i < elems.length; i+=2) {
		  var divs = elems.slice(i, i+2), 
		  height = Math.max(divs.eq(0).height(), divs.eq(1).height());
		  divs.css('min-height', height);
		}

	},

	controlHeightLateral:function(){
		if ($(window).width () >= 1300){
			if ($('#wrapper').height () > $('#wrapper').find(".navLateral").height ()){
				$('#wrapper').find(".navLateral").css ('height', $('#wrapper').height ()+'px');
			}
		}
		else{
			$('#wrapper').find(".navLateral").css ('height', 'auto');
		}
	}

}

$( window ).resize(function() {
	fixes.controlHeightLateral ();
});

$(function () {	
	
	herramientas.comentarios();
	
	herramientas.imprimir();
	
	if($("#comments form").length != 0){
		jQuery("#comments form").submit(function(){return formsValidations.validaComentarios( jQuery(this)) })	
	}
	
	if($("#newsletterform").length != 0) {
		
		jQuery("#newsletterform").submit(function(){return suscripcionNewsletter.init() })	
	}
	
	// Igualamos el alto de lateral con el de la pagina
	fixes.controlHeightLateral();

	if($("section.quienesSomos").length != 0){fixes.controlHeight($("section.quienesSomos"));}
	if($("section.soluciones").length != 0){fixes.controlHeight($("section.soluciones"));}
	if($("section.partners").length != 0){fixes.controlHeight($("section.partners"));}


	
});