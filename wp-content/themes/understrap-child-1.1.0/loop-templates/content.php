<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php if ( 'post' === get_post_type() ) : ?>

			<div class="entry-meta">
				<?php understrap_posted_on(); ?>
			</div><!-- .entry-meta -->

		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="container">
		<div class="row">
			<div class="col-5"></div>
			<div class="col-7">

				<div class="card mb-3">
					<div class="row g-0">
						<div class="col-md-4">
						<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid rounded-start" alt="...">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title"><?php the_title();?></h5>
								<p class="card-text">
									<i class="fa-solid fa-location-dot"></i>
									<?php 
										foreach ( get_the_terms( get_the_ID(), 'add_taxonomies_location' ) as $tax ) {
											echo  __( $tax->name ) ;
										}
									?>
								</p>
								<div class="d-flex justify-content-between">
									<p class="card-text">
										<i class="fa-solid fa-calendar-days"></i>
										Todo el año
									</p>
									<p class="card-text">
										<i class="fa-solid fa-mountain"></i>
										<?php 
											foreach ( get_the_terms( get_the_ID(), 'add_taxonomies_modality' ) as $tax ) {
												echo  __( $tax->name ) ;
											}
										?>
									</p>
								</div>
								<div class="d-flex justify-content-center padding_top">
									<?php
										echo get_excerpt();
										understrap_link_pages();
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</article><!-- #post-## -->
