<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$bootstrap_version = get_theme_mod( 'understrap_bootstrap_version', 'bootstrap4' );
$navbar_type       = get_theme_mod( 'understrap_navbar_type', 'collapse' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<?php wp_head(); ?>
		<script src="https://kit.fontawesome.com/2cf3e50dd7.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/css/estilos.css">
	</head>

	<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
		<?php do_action( 'wp_body_open' ); ?>
		<div class="site" id="page">
			<!-- ******************* The Navbar Area ******************* -->
			<?php 
				if(is_front_page()){ ?>
					<header id="header" class="pt-2">
						<div class="container">
							<div class="row">
								<div class="col-12">
									<nav id="main-nav" class="navbar navbar-expand-lg pt-4" aria-labelledby="main-nav-label">
										<div id="container_logo">
											<img id="logo"src="<?php echo get_stylesheet_directory_uri();?>/assets/Moove_logo_blanco.png" alt="Logo">
										</div>
										<button id="button-burger" class="navbar-toggler burger" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
											<i class="fa-solid fa-bars tipografia-blanco"></i>
										</button>
										<div class="collapse navbar-collapse w-50" id="navbarSupportedContent">
											<!-- The WordPress Menu goes here -->
											<?php
												wp_nav_menu(
													array(
														'theme_location'  => 'primary',
														'container_id'    => 'navbarNavDropdown',
														'menu_class'      => 'navbar-nav ml-auto',
														'fallback_cb'     => '',
														'menu_id'         => 'main-menu',
														'depth'           => 2,
														'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
													)
												);
											?>
										</div>
									</nav><!-- .site-navigation -->
								</div>
							</div>
						</div>
					</header><!-- #wrapper-navbar end -->
				<?php } else { ?>
					<header id="header" class="pt-2 fondo-negro">
						<div class="container">
							<div class="row">
								<div class="col-12">
									<nav id="main-nav" class="navbar navbar-expand-lg pt-4" aria-labelledby="main-nav-label">
										<div id="container_logo">
											<img id="logo"src="<?php echo get_stylesheet_directory_uri();?>/assets/Moove_logo_blanco.png" alt="Logo">
										</div>
										<button id="button-burger" class="navbar-toggler burger" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
											<i class="fa-solid fa-bars tipografia-blanco"></i>
										</button>
										<div class="collapse navbar-collapse w-50" id="navbarSupportedContent">
											<!-- The WordPress Menu goes here -->
											<?php
												wp_nav_menu(
													array(
														'theme_location'  => 'primary',
														'container_id'    => 'navbarNavDropdown',
														'menu_class'      => 'navbar-nav ml-auto',
														'fallback_cb'     => '',
														'menu_id'         => 'main-menu',
														'depth'           => 2,
														'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
													)
												);
											?>
										</div>
									</nav><!-- .site-navigation -->
								</div>
							</div>
						</div>
					</header><!-- #wrapper-navbar end -->
				<?php }
			?>
			<script>
				$(function() {
					var header = $("#main-nav");
					$(window).scroll(function() {
						if ($(this).scrollTop() >0 ) {
							//SCROLL
							header.addClass("fondo-negro");
						} else {
							//NO SCROLL
							header.removeClass("fondo-negro");
						}
					});
				});
				// $(function(){
				// 	if(jQuery("#button-burger").click() && ){
				// 		(
				// 		function(){
				// 			$("#navbarNavDropdown").toggleClass("fondo-negro");
				// 		}
				// 	);
				// 	}
				// });
			</script>
		</div>
	</body>
</html>

