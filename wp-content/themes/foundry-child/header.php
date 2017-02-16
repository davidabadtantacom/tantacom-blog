<?php if (is_404() && !is_page ('not-found')) { wp_redirect ('/not-found'); } ?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class( get_option('foundry_site_layout', 'normal-layout') . ' parallax-' . get_option('foundry_parallax_version', '3d') . ' ' . get_option('button_style', 'btn-regular') ); ?>>

    <script type="application/ld+json">
    {
      "@context" : "http://schema.org",
      "@type" : "Organization",
      "name" : "Tanta",
      "url" : "https://tantacom.com",
      "logo" : "https://tantacom.com/wp-content/uploads/2017/02/tanta_logo_azul-1.png",
      "sameAs" : [
        "https://twitter.com/tantacom",
        "https://es.linkedin.com/company/tanta-comunicacion",
        "https://www.facebook.com/tantacom/"
      ],
      "contactPoint" : [{
        "@type" : "ContactPoint",
        "telephone" : "+34 91 440 10 40",
        "contactType" : "customer support"
      }]
    }
    </script>
    <?php include_once("analyticstracking.php") ?>
<?php
	/**
	 * First, we need to check if we're going to override the header layout (with post meta)
	 * Or if we're going to display the global choice from the theme options.
	 * This is what ebor_get_header_layout is in charge of.
	 */
	get_template_part('inc/content-nav', ebor_get_header_layout());
?>

<div class="main-container">