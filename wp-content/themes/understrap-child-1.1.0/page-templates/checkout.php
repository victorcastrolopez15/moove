<?php
/**
 * Template Name: Checkout  
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
    <div class="container margin_top_7rem">
		<div class="row">
			<div class="col-12 text-center">
				<p class="tipografia-azul-claro font-size-16px separacion mayuscula"><?php the_field('pretitulo_campo_1')?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-12 text-center">
				<h1 class="tipografia-negro font-size-45px"><strong><?php the_field('titulo_campo_1')?></strong></h1>
			</div>
		</div>
		<div id="galeria_img" class="row fondo_galeria">
			<div class="col-12 my-3">
				<button id="btn-popup" class="font-size-12px tipografia-negro border_radius_50 fondo-blanco posicion_derecha px-3 py-2">
					<?php _e("Galería de fotos");?>
				</button>
			</div>
		</div>
	</div>
    <div class="overlay">
		<div class="popup">
			<a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fa-solid fa-x"></i></a>
			<h3>Galería de imágenes</h3>
			<!-- wp:imagely/nextgen-gallery -->
			<?php echo do_shortcode('[ngg src="galleries" ids="6" display="basic_thumbnail" thumbnail_crop="0"]'); ?>
			<!-- /wp:imagely/nextgen-gallery -->
		</div>
	</div>
	<script>
		jQuery( document ).ready(function() {
			console.log( "ready2!" );
			jQuery("#btn-popup").on('click', function (e) {
				e.preventDefault();
				jQuery(".overlay").addClass('active');
			});
			jQuery("#btn-cerrar-popup").on('click', function (e) {
				e.preventDefault();
				jQuery(".overlay").removeClass('active');
			});
		});
	</script>

    <div class="container">
        <div class="row d-flex flex-column align-items-center">
            <div class="col-lg-7">
                <div class="container">
                    <div class="row mt-5 mb-3">
						<div class="col-12 p-0">
							<p class="font-size-16px">
								<?php the_field("descripcion_viaje_1");?>
							</p>
						</div>
					</div>
					<div class="row mb-5">
						<div class="col-12 p-0 img_dv">
							<img class="tamaño_imagen_detalle_viaje" src="<?php the_field("imagen_viaje_1");?>" alt="Imagen 1">
						</div>
					</div>
					<div class="row margin_top_5rem">
						<div class="col-12 p-0">
							<p class="font-size-16px tipografia-azul-claro mayuscula"><?php the_field("pretitulo_itinerario");?></p>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-12 p-0">
							<p class="font-size-16px">
								<?php the_field("descripcion_itinerario_1");?>
							</p>
						</div>
					</div>
					<div class="row mb-5">
						<div class="col-12 p-0 img_dv">
							<img class="tamaño_imagen_detalle_viaje" src="<?php the_field("imagen_itinerario");?>" alt="Imagen 2">
						</div>
					</div>
					<div class="row mb-4 margin_top_5rem">
						<div class="col-12 p-0">
							<p class="font-size-16px">
								<?php the_field("descripcion_itinerario_2");?>
							</p>
						</div>
					</div>
                    <div class="row mb-2">
						<div class="col-12 p-0">
							<p class="tipografia-azul-claro font-size-16px separacion"><?php _e("RECOMENDACIONES");?></p>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-12 p-0">
							<p class="font-size-16px"><i class="fa-solid fa-check tipografia-azul-claro"></i>&nbsp;&nbsp;<?php _e("Habitación doble para 3 noches en hotel de 3 estrellas");?></p>
							<p class="font-size-16px"><i class="fa-solid fa-check tipografia-azul-claro"></i>&nbsp;&nbsp;<?php _e("Media pensión: desayuno y cena");?></p>
							<p class="font-size-16px"><i class="fa-solid fa-check tipografia-azul-claro"></i>&nbsp;&nbsp;<?php _e("Inscripción asegurada a la GF Strade Bianche 2020 con pack regalo incluido");?></p>
							<p class="font-size-16px"><i class="fa-solid fa-check tipografia-azul-claro"></i>&nbsp;&nbsp;<?php _e("Traslado del aeropuerto de Pisa a Siena y Siena a Aeropuerto de Pisa");?></p>
							<p class="font-size-16px"><i class="fa-solid fa-check tipografia-azul-claro"></i>&nbsp;&nbsp;<?php _e("Apoyo mecánico en ruta");?></p>
							<p class="font-size-16px"><i class="fa-solid fa-check tipografia-azul-claro"></i>&nbsp;&nbsp;<?php _e("Asesoramiento gratuito en la compra de los billetes de avión");?></p>
							<p class="font-size-16px"><i class="fa-solid fa-check tipografia-azul-claro"></i>&nbsp;&nbsp;<?php _e("Seguro de asistencia");?></p>
							<p class="font-size-16px"><i class="fa-solid fa-check tipografia-azul-claro"></i>&nbsp;&nbsp;<?php _e("Briefing explicativo de la GF Strade Bianche 2020");?></p>
						</div>
					</div>
                </div>
            </div>
            <div class="col-5"></div>
        </div>
    </div>

    <div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<p class="tipografia-azul-claro separacion font-size-16px"><?php the_field("pretitulo_campo_destinos");?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-12 text-center">
				<p class="font-size-45px"><strong><?php the_field("titulo_campo_destinos");?></strong></p>
			</div>
		</div>
		<div class="row mb-5">
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
