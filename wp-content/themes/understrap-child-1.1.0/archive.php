<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<!-- CATEGORIA -->

<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row mt-5">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

			<div class="container">
				<div class="row">
					<div class="col-12 text-center">
						<h2 class="font-size-45px separacion"><strong>Viajes</strong></h2>
					</div>
				</div>
				<div class="row">
					<div class="col-4"></div>
					<div class="col-8">
						<div class="container">
							<?php
								$args = array(  
									'post_type' => 'post_type_travels',
									'post_status' => 'publish',
								);

								$loop = new WP_Query( $args ); 
								
								// echo get_permalink();

								while ( $loop->have_posts() ) : $loop->the_post(); ?>
									<!-- <?php echo get_permalink( $post->ID ); ?>
									<?php ?>
									<div class="row my-3">
										<div class="col-12">
											<div class="card mb-3">
												<div class="row g-0">
													<div class="col-md-5">
														<img src="<?php echo get_the_post_thumbnail_url()?>" class="img-fluid rounded-start" alt="...">
													</div>
													<div class="col-md-7">
														<div class="card-body">
															<h5 class="card-title mb-3"><?php the_title();?></h5>
															<p class="card-text">
																<small class="">
																	<i class="fa-solid fa-location-dot"></i>
																	<?php 
																		foreach ( get_the_terms( get_the_ID(), 'add_taxonomies_location' ) as $tax ) {
																			echo  __( $tax->name ) ;
																		}
																	?>
																</small>
															</p>
															<div class="d-flex justify-content-between padding_right">
																<p class="card-text"><small><i class="fa-solid fa-calendar-days"></i> Todo el año</small></p>
																<p class="card-text">
																	<small>
																		<i class="fa-solid fa-mountain"></i>
																		<?php 
																			foreach ( get_the_terms( get_the_ID(), 'add_taxonomies_modality' ) as $tax ) {
																				echo  __( $tax->name ) ;
																			}
																		?>
																	</small>
																</p>
															</div>
															<div class="d-flex justify-content-center padding_top">	
																	<?php 
																		echo get_permalink( get_the_ID() );
																	?>
																<a href="<?php get_permalink( get_page_by_path( 'map' ) )?>" class="enlace_viaje">
																	<button type="button" class="fondo-azul-claro tipografia-blanco button_viaje">
																		Ver detalles
																	</button>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div> -->
									<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

									<header class="entry-header">

										<?php
										the_title(
											sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
											'</a></h2>'
										);
										?>

										<?php if ( 'post' === get_post_type() ) : ?>

											<div class="entry-meta">
												<?php understrap_posted_on(); ?>
											</div><!-- .entry-meta -->

										<?php endif; ?>

									</header><!-- .entry-header -->

									<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

								<?php endwhile;
												
									wp_reset_postdata(); 
							?>

							



						</div>
					</div>
				</div>
			</div>

			</main><!-- #main -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #archive-wrapper -->

<?php
get_footer();
?>