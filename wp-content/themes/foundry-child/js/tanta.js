// Parche para el comportamiento del menu en Firefox al abrir la portada con un ancla en la URL
if (jQuery.browser.mozilla && location.hash) {setTimeout(function() {window.scrollTo(0, 0);}, 1);}
jQuery(document).ready(function(){
	// Parche para el comportamiento del menu en Firefox al abrir la portada con un ancla en la URL
	if (jQuery.browser.mozilla && window.location.hash) {var anchor = jQuery(window.location.hash);if (anchor.length){jQuery('body .nav-container nav:first').addClass('fixed');setTimeout(function() {jQuery('html, body').animate({scrollTop:anchor.offset().top});}, 100);}}
	// Animacion para la opacidad de la bombilla en la pagina de contenido no encontrado
	if (jQuery('.notFoundZone').length){jQuery('.notFoundZone').find('.imagen').animate ({opacity: 1}, {duration: 1000, queue: false});jQuery('.notFoundZone').find('.texto').animate ({opacity: 1}, {duration: 5000, queue: true});}
});