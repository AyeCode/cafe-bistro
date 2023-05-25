<?php
$page_id  = absint( get_theme_mod( 'cafebistro_theme_main_dish_page', '' ) );
$subtitle = get_theme_mod( 'cafebistro_main_dish_subtitle', '' );
?>
<?php if ( $page_id != '' && $page_id != 0 ): ?>
	<div class="full-section-60" id="main-dish">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<?php $page = get_post( $page_id ); ?>
					<h2 class="features-title">
						<?php echo esc_html($page->post_title); ?>
					</h2>
					<?php if ( $subtitle != '' ): ?>
						<h3 class="features-subtitle">
							<?php echo esc_html( $subtitle ); ?>
						</h3>
					<?php endif; ?>

				</div><!-- col-md-12 -->
			</div>

			<div class="row">
				<div class="col-lg-6">
					<div class="main-dish-text">
						<?php echo wpautop(wp_kses_post($page->post_content)); ?>
					</div>

				</div>
				<div class="col-lg-6">
				<?php
				$thumb_id = get_post_thumbnail_id( $page );
				$thumb_src = wp_get_attachment_image_src( $thumb_id, 'full' ); ?>
						<img src="<?php echo esc_url( $thumb_src[0] ); ?>" class="img-responsive"/>

				</div>
			</div>
		</div>
	</div>
<?php endif; ?>