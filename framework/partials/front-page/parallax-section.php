<?php
$page_id =  absint(get_theme_mod('cafebistro_theme_reservations_page',''));
if($page_id != '' && $page_id != 0):
  $page = get_post($page_id);
  $thumb_id = get_post_thumbnail_id( $page );
  $thumb_src = wp_get_attachment_image_src( $thumb_id, 'full' ); ?>
<div class="full-section-60" id="reservations" data-stellar-background-ratio="0.4" style="background:url('<?php echo esc_url($thumb_src[0]);?>')">
    <div class="container">
      <div class="row">
        <div class="col-md-12">

          <h4 class="parallax-title">
            <?php echo esc_html($page->post_title); ?>
          </h4>
          <p class="parallax-text">
            <?php echo wp_kses_post($page->post_content); ?>
          </p>

        </div>
      </div>
    </div>
</div><!-- #parallax ends here -->
<?php endif; ?>