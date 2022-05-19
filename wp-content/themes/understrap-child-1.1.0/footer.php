<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<footer class="mt-5">
	<div class="container p-0">
        <div class="row mx-3" id="f_row" style="padding-left: 0;">
            <div class="col-xl-4 col-md-6 iphone" style="padding-left: 0;">
                <div>
                    <h3 class="font-size-24px">
                        <i class="fa-solid fa-map">&nbsp;</i><strong><?php _e("Destinos");?></strong>
                    </h3>
                </div>
                <div>
                    <?php
                        wp_nav_menu( array( 
                        'theme_location' => 'columna-uno', 
                        'container_class' => 'ul_footer' ) ); 
                    ?>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 iphone p-0" style="height: 170px;">
                <div>
                    <h3 class="font-size-24px">
                        <i class="fa-solid fa-bicycle"></i>&nbsp;<strong><?php _e("Actividades");?></strong>
                    </h3>
                </div>
                <div>
                    <?php
                        wp_nav_menu( array( 
                        'theme_location' => 'columna-dos', 
                        'container_class' => 'ul_footer' ) ); 
                    ?>
                </div>
            </div>
            <div class="col-4 d-flex align-items-center justify-content rrss my-3">
                <div id="div_40" class="mx-3">
                    <img src="<?php echo get_stylesheet_directory_uri();?>/assets/Moove_logo_negro.png" alt="Logo">
                </div>

                <div id="div_60" class="d-flex justify-content-around redes">
                    <a class=" mx-3" href="https://www.facebook.com/<?php ?>" target="blank" rel="nofollow">
                        <i class="fa-brands fa-facebook-f font-size-25px tipografia-negro"></i>
                    </a>

                    <a class=" mx-3" href="https://twitter.com/<?php ?>" target="blank" rel="nofollow">
                        <i class="fa-brands fa-twitter font-size-25px tipografia-negro"></i>
                    </a>

                    <a class=" mx-3" href="https://www.instagram.com/<?php ?>" target="blank" rel="nofollow">
                        <i class="fa-brands fa-instagram font-size-25px tipografia-negro"></i>
                    </a>
                </div>
            </div>
        </div>
        <div id="form_suscripcion" class="row">
            <div class="col-12">
                <div id="form_footer" class="w-75 d-flex align-items-center mb-4 ml-3">
                    <div id="suscripcion" class="mx-4">
                        <h4 class="tipografia-azul-claro font-size-16px separacion"><?php _e("SUSCRÍBETE");?></h4>
                        <h3 class="font-size-24px separacion" style="margin-bottom: 0;"><strong><?php _e("Newsletter");?></strong></h3>
                    </div>
                    <div class="w-100">
                        <?php echo do_shortcode('[gravityform id="1" title="false"]');?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="div_legal_notices" >
        <div class="container">
            <div class="row legal_notices">
                <div id="legal" class="col-9 tipografia-blanco d-flex justify-content-between">
                    <?php
                        wp_nav_menu( array( 
                        'theme_location' => 'my-custom-menu', 
                        'container_class' => 'custom-menu-class' ) ); 
                    ?>
                </div>
                <div id="code" class="col-3 tipografia-blanco">
                    <p id="drch" class="posicion_derecha">Code with <i class="fa-solid fa-heart"></i> & a lot of <i class="fa-solid fa-bicycle"></i></p>
                </div>
            </div>
        </div>
    </div>
</footer>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

