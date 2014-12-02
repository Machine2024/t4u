<?php
/**
 * The Header template for frontpage only
 *
 * Displays all of the header element
 *
 * @package WordPress
 * @subpackage Türgev/T4U
 * @since Türgev/T4U 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="og:image" content="http://www.turgev.org/wp-content/themes/t4u/images/logo-big.jpg"/>
<meta name="og:title" content="TÜRGEV" />
<meta name="og:url" content="http://www.turgev.org/"/>
<title>
<?php wp_title( '::', true, 'right' ); ?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
<![endif]-->
<link href='http://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="colored_strips"></div>
<div class="container" id="stickyNav">
  <div class="colored_strips navbar-fixed-top"></div>
  <nav class="navbar navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header ">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="background: #20b6d4"> <span class="sr-only">&nbsp;&nbsp;</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/images/turgev-logo.png" alt=""/></a> </div>
      <div class="fixmenu collapse navbar-collapse" id="bs-navbar-collapse-1">
        <?php
    wp_nav_menu( array(
        'menu'              => 'primary',
        'theme_location'    => 'primary',
        'depth'             => 2,
        'container'         => 'ul',
        'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
        'menu_class'        => 'nav navbar-nav',
        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
        'walker'            => new wp_bootstrap_navwalker())
    );
?>
      </div>
      <!-- /.navbar-collapse --> 
    </div>
    <!-- /.container-fluid --> 
  </nav>
</div>
<div class="visible-xs">
  <div class="colored_strips navbar-fixed-top"></div>
  <div class="container">
    <nav class="navbar navbar-fixed-top" role="navigation">
      <div class="container"> 
        <!-- Brand and toggle get grouped for better mobile display -->
        
        <div class="navbar-header">

          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="margin-top: 40px; background: #20b6d4"> <?php /*?><span class="sr-only">&nbsp;&nbsp;</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span><?php */?> <span>Menü</span> </button>
          <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/turgev-logo.png" alt=""/></a> </div>
        <div class="collapse navbar-collapse fixmenu" id="bs-example-navbar-collapse-1">
          <?php wp_nav_menu( array(
        'menu'              => 'primary',
        'theme_location'    => 'primary',
        'depth'             => 2,
        'container'         => 'ul',
        'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
        'menu_class'        => 'nav navbar-nav',
        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
        'walker'            => new wp_bootstrap_navwalker()) ); ?>
        </div>
        <!-- /.navbar-collapse --> 
      </div>
      
      <!-- /.container-fluid --> 
    </nav>
  </div>
  <div id="chak"></div>
</div>