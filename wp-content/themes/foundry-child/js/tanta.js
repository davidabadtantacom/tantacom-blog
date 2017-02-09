// Metodo que retorna el nombre de un fichero a partir de una ruta
String.prototype.filename=function(extension){var s= this.replace(/\\/g, '/');s= s.substring(s.lastIndexOf('/')+ 1);return extension? s.replace(/[?#].+$/, ''): s.split('.')[0];}
// Parche para el comportamiento del menu en Firefox al abrir la portada con un ancla en la URL
if (jQuery.browser.mozilla && location.hash) {setTimeout(function() {window.scrollTo(0, 0);}, 1);}
jQuery(document).ready(function(){
	// Parche para el comportamiento del menu en Firefox al abrir la portada con un ancla en la URL
	if (jQuery.browser.mozilla && window.location.hash) {var anchor = jQuery(window.location.hash);if (anchor.length){jQuery('body .nav-container nav:first').addClass('fixed');setTimeout(function() {jQuery('html, body').animate({scrollTop:anchor.offset().top});}, 100);}}
	// Animacion para la opacidad de la bombilla en la pagina de contenido no encontrado
	var redireccionNotFound;function luzEncendida () {redireccionNotFound = setTimeout(function(){ location.href = '/'; }, 3000);}function luzApagada () {clearTimeout(redireccionNotFound);}jQuery('.notFoundZone').on ('click', '.interruptor', function (){if (jQuery(this).attr('src').filename() == 'interruptor-off'){jQuery(this).attr('src', jQuery(this).attr('src').replace('interruptor-off', 'interruptor-on'));jQuery('.notFoundZone').find('.background-image-holder').css ('background-image', jQuery('.notFoundZone').find('.background-image-holder').css ('background-image').replace ('lamp-off', 'lamp-on'));luzEncendida ();}else if (jQuery(this).attr('src').filename() == 'interruptor-on'){jQuery(this).attr('src', jQuery(this).attr('src').replace('interruptor-on', 'interruptor-off'));jQuery('.notFoundZone').find('.background-image-holder').css ('background-image', jQuery('.notFoundZone').find('.background-image-holder').css ('background-image').replace ('lamp-on', 'lamp-off'));luzApagada ();}});
	// Parche para hacer la navegacion mediante anclas más atractiva
	jQuery('a[href*="#"]:not([href="#"])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = jQuery(this.hash);
			target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				// Realizamos la accion del boton del menu
				if (jQuery (this).parents ('.menu').length){
					jQuery('.mobile-toggle').trigger ('click');
				}
				jQuery('html, body').animate({
					scrollTop: target.offset().top
				}, 1000);
				return false;
			}
		}
	});
});