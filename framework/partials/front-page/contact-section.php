<?php
$page_id       = absint( get_theme_mod( 'cafebistro_theme_contact_page', '' ) );
?>
<?php if ( $page_id != '' && $page_id != 0 ): $page = get_post( $page_id );
	$thumb_id  = get_post_thumbnail_id( $page );
	$thumb_src = wp_get_attachment_image_src( $thumb_id, 'full' );
	?>

	<div class="full-section-60" id="contact" style="background:url('<?php echo esc_url($thumb_src[0]);?>'); background-size:cover; background-position:center;">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">

						<h2 class="section-title">
							<?php echo esc_html($page->post_title); ?>
						</h2>

				</div><!-- col-md-12 -->

			</div>

				<div class="row">
					<div class="col-md-12">
						<div class="cb-contact-section-form-container">
							<?php $output =  apply_filters( 'the_content', $page->post_content );
							echo wp_kses($output,cafebistro_allowed_tags()); ?>
						</div>
					</div>
				</div>

		</div>
	</div>
<?php endif; ?>