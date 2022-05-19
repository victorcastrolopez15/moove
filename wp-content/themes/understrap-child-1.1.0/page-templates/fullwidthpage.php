<?php
/**
 * Template Name: HomePage
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<?php get_header();?>
<main>
    <div id="div1_home">
        <div id="titles" class="row">
            <p class="font-size-20px tipografia-blanco mayuscula"><?php the_field('pretitulo');?></p>
            <h1 class="font-size-45px tipografia-blanco separacion"><strong><?php the_field('titulo');?></strong></h1>
        </div>
        <div id="info_head" class="row">
            <form id="form_destinos" action="#" class="d-flex">
                <label for="search" class="visually-hidden"></label>
                <input type="text" class="form-control font-size-18px text-center" id="search" placeholder="<?php _e("Selecciona un destino");?>">

                <button id="input_viajes" class="fondo-azul font-size-18px tipografia-blanco d-flex align-items-center px-3"><?php _e("Empezar mi viaje");?></button>
            </form>
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h2 class="font-size-35px"><strong><?php the_field('titulo_campo_1');?></strong></h2>
            </div>
        </div>
        <div class="row">
            <?php 
                    $args = array(  
                        'post_type' => 'post_type_travels',
                        'post_status' => 'publish',
                        'posts_per_page' => 4
                    );
                
                    $loop = new WP_Query( $args ); 
                        
                    while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <div class="col-lg-3 cards_destinos">
                            <div class="size-cards center_image border_radius" style="background-image: url('<?php echo get_the_post_thumbnail_url()?>');">
                                <div class="difuminado border_radius p-3">
                                    <p class="font-size-20px tipografia-blanco" style="padding-top: 215px;margin-bottom: 0;"><?php _e(the_title());?></p>
                                    <p class="font-size-14px tipografia-azul-claro" style="margin-bottom: 0;">
                                        <?php 
                                            foreach ( get_the_terms( get_the_ID(), 'add_taxonomies_location' ) as $tax ) {
                                                echo  __( $tax->name ) ;
                                            }
                                        ?>
                                    </p>
                                    <button type="button" id="button_destinos" class="fondo-azul-claro font-size-10px tipografia-blanco" disabled>
                                        <?php 
                                            foreach ( get_the_terms( get_the_ID(), 'add_taxonomies_modality' ) as $tax ) {
                                                echo  __( $tax->name ) ;
                                            }
                                        ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                <?php endwhile;
                
                    wp_reset_postdata(); 
            ?>
        </div>
    </div>
    <div class="fondo_explora pt-2" style="background-color: #183886;">
        <div class="container">
            <div class="row my-4">
                <div class="col-12">
                    <div class="text-center">
                        <p class="font-size-16px tipografia-azul-claro"><?php the_field('pretitulo_campo_2');?></p>
                        <h2 class="font-size-45px"><strong><?php the_field('titulo_campo_2');?></strong></h2>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-12">
                    <a href="#" class="tipografia-negro enlace_blog">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="<?php echo get_stylesheet_directory_uri();?>/assets/img1_explora.jpg" id="img1_card1" class="img-fluid w-100 rounded-start" alt="Image">
                                </div>
                                <div class="col-md-9 d-flex flex-column justify-content-center">
                                    <div class="card-body d-flex flex-column justify-content-center">
                                        <h3 class="card-title font-size-24px"><strong><?php the_field( 'titulo1_carta_campo_2');?></strong></h3>
                                        <p class="card-text font-size-14px tipografia-azul-claro"><small><?php _e(the_field('postitulo_titulo1_carta_campo_2'));?></small></p>
                                        <p class="card-text font-size-16px"><?php the_field('texto_carta_campo2');?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            </div>
        </div>
    </div>
   <div class="container">
        <div class="row container_noticias">
            <div class="col-md-4 noticias_blog" style="height: 160px;">
                <a href="#" class="enlace_blog">
                    <div class="img2_card2 size-cards border_radius">
                        <div class="fondo-negro-trans border_radius d-flex flex-column align-items-center justify-content-center" style="height: 160px;">
                            <p class="font-size-16px tipografia-azul-claro"><?php the_field('pretitulo2_card2_campo_2');?></p>
                            <h3 class="font-size-24px tipografia-blanco text-center"><strong><?php the_field('titulo2_card2_campo_2');?></strong></h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 noticias_blog" style="height: 160px;">
                <a href="#" class="enlace_blog">
                    <div class="img3_card3 size-cards border_radius">
                        <div class="fondo-negro-trans border_radius d-flex flex-column align-items-center justify-content-center" style="height: 160px;">
                            <p class="font-size-16px tipografia-azul-claro"><?php the_field('pretitulo2_card2_campo_2');?></p>
                            <h3 class="font-size-24px tipografia-blanco text-center"><strong><?php the_field('titulo2_card2_campo_2');?></strong></h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 noticias_blog" style="height: 160px;">
                <a href="#" class="enlace_blog">
                    <div class="img4_card4 size-cards border_radius">
                        <div class="fondo-negro-trans border_radius d-flex flex-column align-items-center justify-content-center" style="height: 160px;">
                            <p class="font-size-16px tipografia-azul-claro"><?php the_field('pretitulo2_card2_campo_2');?></p>
                            <h3 class="font-size-24px tipografia-blanco text-center"><strong><?php the_field('titulo2_card2_campo_2');?></strong></h3>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <h2 class="font-size-35px"><strong><?php the_field('titulo_campo_3');?></strong></h2>
            </div>
        </div>
        <div class="row">
            <?php 
                    $args = array(  
                        'post_type' => 'post_type_travels',
                        'post_status' => 'publish',
                        'posts_per_page' => 4
                    );
                
                    $loop = new WP_Query( $args ); 
                        
                    while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <div class="col-lg-3 cards_destinos">
                        <div class="size-cards center_image border_radius" style="background-image: url('<?php echo get_the_post_thumbnail_url()?>');">
                            <div class="difuminado border_radius p-3">
                                <p class="font-size-20px tipografia-blanco" style="padding-top: 215px;margin-bottom: 0;"><?php _e(the_title());?></p>
                                <p class="font-size-14px tipografia-azul-claro" style="margin-bottom: 0;">
                                    <?php 
                                        foreach ( get_the_terms( get_the_ID(), 'add_taxonomies_location' ) as $tax ) {
                                            echo  __( $tax->name ) ;
                                        }
                                    ?>
                                </p>
                                <button type="button" id="button_destinos" class="fondo-azul-claro font-size-10px tipografia-blanco" disabled>
                                    <?php 
                                        foreach ( get_the_terms( get_the_ID(), 'add_taxonomies_modality' ) as $tax ) {
                                            echo  __( $tax->name ) ;
                                        }
                                    ?>
                                </button>
                            </div>
                        </div>
                    </div>
            <?php endwhile;
            
            wp_reset_postdata(); 
        ?>
            
        </div>
    </div> 
</main>
<?php
get_footer();
?>
