<?php
$page_id = get_theme_mod( 'cafebistro_theme_about_page', '' );
?>
<?php if ( absint( $page_id ) != '' ):
	$page = get_post( $page_id );
	?>
	<div class="full-section-60" id="about">
		<div class="container">
			<div class="row">
				<div class="col-md-7">

					<h2 class="section-title">
						<?php echo $page->post_title; ?>
					</h2>

					<div class="about-text">
						<?php echo $page->post_content; ?>
					</div>

				</div>

				<div class="col-md-5">
				<?php
				$thumb_id = get_post_thumbnail_id( $page );
				$thumb_src = wp_get_attachment_image_src( $thumb_id, 'full' ); ?>
					<div id="about-images">
						<img id="about-image-1" src="<?php echo esc_url( $thumb_src[0] ); ?>" class="img-responsive"/>
					</div>

				</div>

			</div> <!--.row -->

		</div>
		<!-- .container -->
	</div>
	<!-- .full-section-60-->
<?php endif; ?>