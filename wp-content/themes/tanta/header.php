<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="google-site-verification" content="xTCxX19YjdDm59dnuT3xLykCyJFnmzXu6g1aeOmYDLE" />
<title><?php
    /*
     * Print the <title> tag based on what is being viewed.
     */
    global $page, $paged;

    wp_title( '|', true, 'right' );

    // Add the blog name.
    bloginfo( 'name' );

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        echo " | $site_description";


    // Add a page number if necessary:
    if ( $paged >= 2 || $page >= 2 )
        echo ' | ' . sprintf( __( 'Page %s', 'tanta' ), max( $paged, $page ) );

    ?></title>

    <?php
    if ( is_category()  ){
        global $post;
        $categories = get_the_category($post->ID);
        $des =  "Publicamos artículos en profundidad sobre ".$categories[0]->cat_name."...Consúltalos"; ?>
        <meta name="description" content="<? echo $des; ?>" />
    <?php
    }else if(is_date()){ ?>

        <meta name="description" content="Publicamos artículos en profundidad sobre temas de actualidad Internet y entornos móviles: Usabilidad, creatividad, desarrollo frontend y accesibilidad web, desarrollo backend y cms, promoción on y offpage, tendencias... Consúltalos" />

    <?php } ?>


<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_directory' ); ?>/css/tanta.css" />

<!--[if lt IE 9]><script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->

<!--[if lte IE 6]><link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/ie6.css" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/ie7.css" /><![endif]-->
<!--[if IE 8]><link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/ie8.css" /><![endif]-->
<!--[if IE 9]><link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/ie9.css" /><![endif]-->

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
    /* We add some JavaScript to pages with the comment form
     * to support sites with threaded comments (when in use).
     */
    if ( is_singular() && get_option( 'thread_comments' ) )
        wp_enqueue_script( 'comment-reply' );

    /* Always have wp_head() just before the closing </head>
     * tag of your theme, or you will break many plugins, which
     * generally use this hook to add elements to <head> such
     * as styles, scripts, and meta tags.
     */
    wp_head();
?>



</head>

<body <?php body_class(); ?> <?php echo get_body_id (); ?>>
    <script type="application/ld+json">
    {
      "@context" : "http://schema.org",
      "@type" : "Organization",
      "name" : "Tanta",
      "url" : "https://tantacom.com",
      "sameAs" : [
        "https://twitter.com/tantacom",
        "https://www.linkedin.com/company/tantacomm"
      ]
    }
    </script>
    <div id="wrapper">
        <aside class="navLateral">
          <header>
            <a href="/" title="Ir a la portada" class="logo">tanta_</a>
          </header>
          <nav>
            <?php wp_nav_menu (array ('menu'=>'primary', 'menu_id'=>'nav', 'depth'=>1)); ?>
          </nav>
          <footer>
            <?php dynamic_sidebar ('first-footer-widget-area'); ?>
          </footer>
        </aside>
        <div class="body">
