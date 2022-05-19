<?php
/**
 * Template Name: Detalle de viaje
 * 
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

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
			<?php if( function_exists('photo_gallery') ) { photo_gallery(2); } ?>
			<!-- /wp:imagely/nextgen-gallery -->
		</div>
	</div>
	<script>
		jQuery( document ).ready(function() {
			console.log( "ready2!" );
			jQuery(".popup").on('click', function (e) {
				e.stopPropagation();
			});

			jQuery("#btn-popup").on('click', function (e) {
				e.preventDefault();
				jQuery(".overlay").addClass('active');
			});

			jQuery("#btn-cerrar-popup").on('click', function (e) {
				jQuery(".overlay").removeClass('active');
			});

			jQuery(".overlay").on('click', function (e) {
				jQuery(".overlay").removeClass('active');
			});
		});
	</script>
	<!-- <?php echo get_permalink();?> -->
	<div class="container">
		<div class="row row_responsive">
			<div class="col-lg-7 p-0">
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

					<div class="row mb-3">
						<div class="col-12 p-0">
							<div class="accordion" id="accordionExample">
								<div class="accordion-item">
									<h2 class="accordion-header" id="headingOne">
										<button class="accordion-button separacion mayuscula" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											<?php _e("DIA 1");?>&nbsp;&nbsp;<?php the_field("acordeon_dia_1_titulo");?>
										</button>
									</h2>
									<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
										<div class="accordion-body">
											<?php the_field("acordeon_dia_1_descripcion");?>
										</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header" id="headingTwo">
										<button class="accordion-button collapsed separacion mayuscula" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
											<?php _e("DIA 2");?>&nbsp;&nbsp;<?php the_field("acordeon_dia_2_titulo");?>
										</button>
									</h2>
									<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
										<div class="accordion-body">
											<?php the_field("acordeon_dia_2_descripcion");?>
										</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header" id="headingThree">
										<button class="accordion-button collapsed separacion mayuscula" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
											<?php _e("DIA 3");?>&nbsp;&nbsp;<?php the_field("acordeon_dia_3_titulo");?>
										</button>
									</h2>
									<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
										<div class="accordion-body">
											<?php the_field("acordeon_dia_3_descripcion");?>
										</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header" id="headingFour">
										<button class="accordion-button collapsed separacion" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
											<?php _e("DIA 4");?>&nbsp;&nbsp;<?php the_field("acordeon_dia_4_titulo");?>
										</button>
									</h2>
									<div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
										<div class="accordion-body">
											<?php the_field("acordeon_dia_4_descripcion");?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row mb-4">
						<div class="col-12 p-0">
							<hr>
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-12 p-0">
							<p class="tipografia-azul-claro font-size-16px separacion"><?php _e("¿QUÉ INCLUYE?");?></p>
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
					<div class="row mb-2">
						<div class="col-12 p-0">
							<p class="tipografia-azul-claro font-size-16px separacion"><?php _e("TAMBIEN PUEDES CONTRATAR");?></p>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-12 p-0">
							<p class="font-size-16px"><i class="fa-solid fa-check tipografia-azul-claro"></i>&nbsp;&nbsp;<?php _e("Alquiler de bicicleta de gama media");?></p>
							<p class="font-size-16px"><i class="fa-solid fa-check tipografia-azul-claro"></i>&nbsp;&nbsp;<?php _e("Habitación individual");?></p>
							<p class="font-size-16px"><i class="fa-solid fa-check tipografia-azul-claro"></i>&nbsp;&nbsp;<?php _e("Seguro de cancelación (opcional)");?></p>
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-12 p-0">
							<p class="tipografia-azul-claro font-size-16px separacion"><?php _e("NO INCLUYE");?></p>
						</div>
					</div>
					<div class="row mb-4">
						<div class="col-12 p-0">
							<p class="font-size-16px"><i class="fa-solid fa-xmark"></i>&nbsp;&nbsp;<?php _e("Comidas no especificadas");?></p>
							<p class="font-size-16px"><i class="fa-solid fa-xmark"></i>&nbsp;&nbsp;<?php _e("Extras de hotel");?></p>
							<p class="font-size-16px"><i class="fa-solid fa-xmark"></i>&nbsp;&nbsp;<?php _e("Bebidas adicionales");?></p>
						</div>
					</div>
					<div class="row mb-4">
						<div class="col-12 p-0">
							<hr>
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-12 p-0">
							<p class="tipografia-azul-claro font-size-16px separacion"><?php _e("PREGUNTAS FRECUENTES");?></p>
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-12 p-0">
							<p class="font-size-16px"><strong><?php _e("¿Cómo confirmar mi reserva?");?></strong></p>
							<p class="font-size-16px">
								<?php 
									_e("Al realizar su reserva, nuestro operador se pondrá en contacto con usted para confirmar la reserva. Para hacerla efectiva, se debe realizar una 
									reserva de 200€ y el resto del viaje abonarlo durante el mes de Enero.");
								?>
							</p>
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-12 p-0">
							<p class="font-size-16px"><strong><?php _e("¿Qué ocurre en caso de no poder viajar?");?></strong></p>
							<p class="font-size-16px">
								<?php 
									_e("Debes consultar la política de cancelación situada en el pie de página.");
								?>
							</p>
						</div>
					</div>
					<div class="row mb-5">
						<div class="col-12 p-0">
							<p class="font-size-16px"><strong><?php _e("¿Puedo llevar mi bicicleta?");?></strong></p>
							<p class="font-size-16px">
								<?php 
									_e("Por supuesto, puedes transportar tu bicicleta en avión sin ningún problema. A pesar de ello, te recordamos que esta marcha cicloturista discurre 
									por caminos de tierra. Aunque por regla general están en buen estado, el material puede sufrir un gran desgaste.");
								?>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="container">
					<div class="row mt-5 mb-2">
						<div class="col-12 d-flex">
							<div class="margin_right_1rem">
								<img id="img_ruta" src="<?php the_field("imagen_empresa_organizadora")?>" alt="Empresa">
							</div>
							<div>
								<p class="font-size-12px tipografia-gris mb-0">Viaje operado por</p>
								<p class="font-size-16px tipografia-negro"><?php the_field("nombre_empresa_organizadora")?></p>
							</div>
						</div>
					</div>
					<div class="row mb-4">
						<div class="col-12">
							<div id="fondo_ruta" class="altura_div_ruta relative">
								<p class="tipografia-negro font-size-30px margin_left_1rem"><strong><?php the_field("destino")?></strong></p>
								<p class="tipografia-negro font-size-14px margin_left_1rem"><?php the_field("fecha_viaje")?></p>
								<p class="tipografia-negro font-size-10px margin_left_1rem">Dificultad</p>
								<?php 
									foreach ( get_the_terms( get_the_ID(), 'add_taxonomies_difficulty' ) as $tax ) {
										if($tax->name==1){?>
											<div class="margin_left_1rem">
												<i class="fa-solid fa-star"></i>
											</div>
									<?php }elseif($tax->name==2){?>
											<div class="margin_left_1rem">
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
											</div>
									<?php }elseif($tax->name==3){?>
											<div class="margin_left_1rem">
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
											</div>
									<?php }elseif($tax->name==4){?>
											<div class="margin_left_1rem">
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
											</div>
									<?php }elseif($tax->name==5){?>
											<div class="margin_left_1rem">
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
												<i class="fa-solid fa-star"></i>
											</div>
									<?php }
									}
								?>
								
							</div>
							<div class="absolute recorrido">
								<p class="font-size-10px distancia">Distancia<br><strong><span class="font-size-20px"><?php the_field("distancia")?></span><span class="font-size-12px">km</span></strong></p>
								<img class="posicion_img_recorrido" src="<?php echo get_stylesheet_directory_uri();?>/assets/recorrido.png" alt="Recorrido">
								<p class="font-size-10px desnivel">Desnivel<br><strong><span class="font-size-20px"><?php the_field("desnivel")?></span><span class="font-size-12px">m</span></strong></p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12 text-center">
							<p class="tipografia-azul-claro separacion mayuscula font-size-16px"><?php _e("reserva tu viaje con moovetours");?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-12 text-center">
							<h2 class="font-size-25px"><strong><?php _e("Strade Bianche 2021");?></strong></h2>
						</div>
					</div>
					<div class="row">
						<div class="col-12 text-center">
							<p class="tipografia-negro font-size-16px">Para realizar la reserva de tu viaje necesitaremos que nos indiques estos datos.</p>
						</div>
					</div>
					<div class="row mb-4">
						<div class="col-12">
							<?php echo do_shortcode('[gravityform id="2" title="false"]')?>
						</div>
					</div>


					<div class="row">
						<div class="col-12">
							<div>
								<div class="container p-0">
									<div class="row">
										<div class="col-12 d-flex justify-content-between">
											<p class="separacion mayuscula font-size-16px"><?php _e("asistentes");?></p>
											<p class="tipografia-azul-claro"><?php _e("Quedan 3 plazas");?></p>
										</div>
									</div>
									<div class="row mb-3 mostrar">
										<div class="col-3">
											<img class="" src="<?php echo get_stylesheet_directory_uri();?>/assets/carlos.jpg" alt="Carlos">
										</div>
										<div class="col-9 d-flex flex-column justify-content-center">
											<p class="font-size-16px m-0"><?php _e("Carlos Javier Rodríguez");?></p>
											<p class="font-size-16px m-0 text-muted"><?php _e("Granada  ·  Seguir en Strava");?></p>
										</div>
									</div>
									<div class="row mb-3 mostrar">
										<div class="col-3">
											<img class="" src="<?php echo get_stylesheet_directory_uri();?>/assets/carlos.jpg" alt="Carlos">
										</div>
										<div class="col-9 d-flex flex-column justify-content-center">
											<p class="font-size-16px m-0"><?php _e("Carlos Javier Rodríguez");?></p>
											<p class="font-size-16px m-0 text-muted"><?php _e("Granada  ·  Seguir en Strava");?></p>
										</div>
									</div>
									<div class="row mb-3 mostrar">
										<div class="col-3">
											<img class="" src="<?php echo get_stylesheet_directory_uri();?>/assets/carlos.jpg" alt="Carlos">
										</div>
										<div class="col-9 d-flex flex-column justify-content-center">
											<p class="font-size-16px m-0"><?php _e("Carlos Javier Rodríguez");?></p>
											<p class="font-size-16px m-0 text-muted"><?php _e("Granada  ·  Seguir en Strava");?></p>
										</div>
									</div>
									<div class="row mb-3 mostrar">
										<div class="col-3">
											<img class="" src="<?php echo get_stylesheet_directory_uri();?>/assets/carlos.jpg" alt="Carlos">
										</div>
										<div class="col-9 d-flex flex-column justify-content-center">
											<p class="font-size-16px m-0"><?php _e("Carlos Javier Rodríguez");?></p>
											<p class="font-size-16px m-0 text-muted"><?php _e("Granada  ·  Seguir en Strava");?></p>
										</div>
									</div>
									<div class="row mb-3 mostrar">
										<div class="col-3">
											<img class="" src="<?php echo get_stylesheet_directory_uri();?>/assets/carlos.jpg" alt="Carlos">
										</div>
										<div class="col-9 d-flex flex-column justify-content-center">
											<p class="font-size-16px m-0"><?php _e("Carlos Javier Rodríguez");?></p>
											<p class="font-size-16px m-0 text-muted"><?php _e("Granada  ·  Seguir en Strava");?></p>
										</div>
									</div>
									<div class="row mb-3 mostrar">
										<div class="col-3">
											<img class="" src="<?php echo get_stylesheet_directory_uri();?>/assets/carlos.jpg" alt="Carlos">
										</div>
										<div class="col-9 d-flex flex-column justify-content-center">
											<p class="font-size-16px m-0"><?php _e("Carlos Javier Rodríguez");?></p>
											<p class="font-size-16px m-0 text-muted"><?php _e("Granada  ·  Seguir en Strava");?></p>
										</div>
									</div>
									<div class="row mb-3 mostrar">
										<div class="col-3">
											<img class="" src="<?php echo get_stylesheet_directory_uri();?>/assets/carlos.jpg" alt="Carlos">
										</div>
										<div class="col-9 d-flex flex-column justify-content-center">
											<p class="font-size-16px m-0"><?php _e("Carlos Javier Rodríguez");?></p>
											<p class="font-size-16px m-0 text-muted"><?php _e("Granada  ·  Seguir en Strava");?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-12 text-center">
											<button id="loadMore">
												<a class="tipografia-negro font-size-14px" href="#"><?php _e("Ver todos");?></a>
											</button>
											<script>
												jQuery( document ).ready(function() {
													console.log( "ready!" );
													jQuery(".mostrar").slice(0, 3).css("display","flex");
													jQuery("#loadMore").on('click', function (e) {
														e.preventDefault();
														jQuery(".mostrar:hidden").slice(0, 3).slideDown();
														jQuery(".mostrar").css("display","flex");
														if (jQuery(".mostrar:hidden").length == 0) {
															jQuery("#load").fadeOut('slow');
														}
														jQuery('html,body').animate({
															scrollTop: jQuery(this).offset().top
														}, 1500);
													});
												});
											</script>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row mt-5">
			<div class="col-12 text-center">
				<p class="tipografia-azul-claro separacion font-size-16px mb-0">NO TE LOS PUEDES PERDER</p>
			</div>
		</div>
		<div class="row">
			<div class="col-12 text-center">
				<p class="font-size-45px"><strong>Destinos destacados</strong></p>
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
