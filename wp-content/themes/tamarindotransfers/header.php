<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tamarindotransfers
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,900" rel="stylesheet">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
 <div class="preloader">
	    <div class="img">
	      <img src="<?php echo get_template_directory_uri();  ?>/img/logo.jpg" alt="Preloader image">
	      <span>Loading...</span>
	    </div>
	    
	</div>
	<div class="shadow"></div>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="home-logo"><img src="<?php echo get_template_directory_uri();  ?>/img/logo.png" alt=" Tamarindo transfers" /></a>
	<div class="home-social">
		<ul class="home-social-container">
			<li><a href="https://www.facebook.com/Tamarindo-Transfers-Tours-419250951497312/" class="social-item" target="_blank"><i class="icon-facebook"></i></a></li>
			<li><a href="https://www.youtube.com/channel/UCZ_Fmu8GZ3te5enJW8n-m_Q" class="social-item" target="_blank"><i class="icon-youtube"></i></a></li>
			<li><a href="#" class="social-item"><i class="fa fa-google-plus"></i></a></li>
			<!-- <li><a href="#" class="social-item"><i class="fa fa-instagram"></i></a></li> -->
			<li><a href="https://www.tripadvisor.ca/Attraction_Review-g309253-d7211918-Reviews-Tamarindo_Transfers_Tours-Tamarindo_Province_of_Guanacaste.html" class="social-item" target="_blank"><i class="fa fa-tripadvisor"></i></a></li>
			<li><a href="https://www.youtube.com/channel/UCZ_Fmu8GZ3te5enJW8n-m_Q"><i class="fa fa-youtube"></i></a></li>
		</ul>
				
	</div>
	<button id="btn-menu" class="btn-menu">
	     <i class="fa fa-bars"></i>
	 </button>
	<div class="nav-container">

		 	<nav class="nav-menu">
		 		<!-- <h1 class="nav-menu-title">#1 Transport Experts in Costa Rica</h1> -->
		 		<p class="nav-menu-title">#1 Transport Experts in Costa Rica</p>
		 		<!-- <p class="nav-menu-subtitle">Select one service</p> -->
				<!-- <ul class="nav-menu-ul"> -->
						 <?php wp_nav_menu( array(
				             'theme_location' => 'primary',
				             'menu_id' => 'primary-menu',
				             'container'       => '',
				            'container_class' => 'nav-menu',
				            'container_id'    => '',
				            'menu_class'      => 'nav-menu-ul',
				              ) 
				          ); 
				          ?>
			            
			        <!-- </ul> -->
			</nav>
		</div>
	
