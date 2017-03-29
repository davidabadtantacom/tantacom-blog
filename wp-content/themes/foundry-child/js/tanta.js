// Metodo que retorna una cadena de texto limpia de HTML
function stripHTML(dirtyString) {var rex = /(<([^>]+)>)/ig;return dirtyString.replace(rex , "");}
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
	jQuery('a[href*="#"]:not([href="#"])').click(function() {if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {var target = jQuery(this.hash);target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');if (target.length) {if (jQuery (this).parents ('.menu').length){jQuery('.mobile-toggle').trigger ('click');}jQuery('html, body').animate({scrollTop: target.offset().top}, 1000);return false;}}});
	// Parche para reproducir automaticamente el video de la home
	if (jQuery ('.videoBackground').find ('video').length){jQuery ('.videoBackground').find ('video').attr('loop','');jQuery ('.videoBackground').find ('video').attr('muted', '');jQuery ('.videoBackground').find ('video')[0].play();}
	// Parche para hacer que los tweets del widget sean un enlace al tweet
    jQuery('.tweets-feed').each(function(index) {jQuery(this).attr('id', 'tweets-' + index);}).each(function(index) {if(!( '' == jQuery('#tweets-' + index).attr('data-user-name') || undefined == jQuery('#tweets-' + index).attr('data-user-name') )){var TweetConfig = {"profile": {"screenName": jQuery('#tweets-' + index).attr('data-user-name')},"domId": '',"maxTweets": jQuery('#tweets-' + index).attr('data-amount'),"enableLinks": false,"showUser": true,"showTime": true,"dateFunction": '',"showRetweet": false,"dataOnly": true,"customCallback": handleTweets};} else {var TweetConfig = {"id": jQuery('#tweets-' + index).attr('data-widget-id'),"domId": '',"maxTweets": jQuery('#tweets-' + index).attr('data-amount'),"enableLinks": false,"showUser": true,"showTime": true,"dateFunction": '',"showRetweet": false,"dataOnly": true,"customCallback": handleTweets};}function handleTweets(tweets) {var x = tweets.length;var n = 0;var element = document.getElementById('tweets-' + index);var html = '<ul class="slides">';while (n < x) {html += '<li><p><a href="'+tweets[n]['permalinkURL']+'" target="_blank" title="Ver el tweet">' + stripHTML (tweets[n]['tweet']) + '</a></p></li>';n++;}html += '</ul>';element.innerHTML = html;return html;}twitterFetcher.fetch(TweetConfig);});
    // Parche para hacer que se envie un evento al enviar el formulario con un comentario
    jQuery('#commentform').on ('submit', function(e) {var postPath = window.location.pathname;var realPostPath = postPath.replace(/^\/+|\/+$/g, '');ga('send', 'event', 'Engagement', 'Comentario en post', realPostPath);});
});