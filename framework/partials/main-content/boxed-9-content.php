<?php
/*
 * Boxed-9 content.
 * Contains both main content and sidebar.
 */
?>
<div class="full-section-60">
	<div class="container">
		<div class="row">
			<?php if ( is_single() || is_page() ): ?>
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<section class="blog-item-featured-image">
								<?php
								$attachment_id = get_post_thumbnail_id( get_the_ID() );
								$image_src     = wp_get_attachment_image_src( $attachment_id, 'cafebistro-boxed-12' );
								if ( $image_src[0] != '' ):
									echo '<img src="' . $image_src[0] . '" alt="' . __( 'featured image', 'cafe-bistro' ) . '" width="' . $image_src[1] . '" height="' . $image_src[2] . '" />';
								endif;
								?>
							</section>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<div class="col-lg-8">

				<?php if ( is_home() || is_category() || is_tag() || is_search() || is_archive() ): // is the blog index? ?>
					<?php if ( have_posts() ): ?>

						<section id="cb-blog-container">
							<?php while ( have_posts() ):the_post(); ?>
								<article id="<?php the_ID(); ?>" class="blog-item">

									<?php if ( has_post_thumbnail() ): ?>

										<section class="blog-item-featured-image">


											<?php get_template_part( '/framework/partials/common-partials/featured-image' ); ?>

										</section>
									<?php endif; ?>
									<section class="blog-item-title">
										<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									</section>
									<section class="blog-item-main-content">
										<?php the_excerpt(); ?>
									</section>

									<section class="blog-item-meta">
										<?php
										get_template_part( '/framework/partials/common-partials/meta' );
										?>
									</section>


									<a class="blog-item-read-more cb-btn" title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">
										<?php echo __( 'READ MORE', 'cafe-bistro' ); ?>
									</a>
									<hr/>
								</article>
							<?php endwhile; ?>


							<section class="pagination">
								<?php the_posts_pagination(); ?>
							</section>
                        

						</section>

					<?php else: ?>
						<p><?php echo __( 'There are not any posts available' . 'cafe-bistro' ); ?></p>
					<?php endif; ?>

				<?php else: // is not blog page ?>
					<!-- Main Item Content -->
					<section>
						<?php if ( is_single() ): ?>


							<section id="page-meta">

								<?php get_template_part( '/framework/partials/common-partials/meta' ); ?>

							</section>

						<?php endif; ?>


						<section id="main-entry-content">
							<?php the_content(); ?>
						</section>
						<section id="main-entry-link-pages">
							<?php wp_link_pages(); ?>
						</section>
					</section>

					<!-- Tags -->
					<?php if ( has_tag() ): ?>
						<section id="page-tags">
							<?php echo get_the_tag_list( ' ', ' ', ' ' ); ?>
						</section>
					<?php endif; ?>


				<?php endif;  // is home(blog) or single page/post ?>

				<section id="page-comments-area">
					<?php comments_template( '', true ); ?>
				</section>


			</div>
			<div class="col-lg-4">

				<!-- Sidebar -->
				<aside>
					<?php get_sidebar(); ?>
				</aside>

			</div>
		</div>
	</div>

</div>

