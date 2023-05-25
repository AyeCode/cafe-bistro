<?php
/*
 * This is the partial that contains the logo.
 */
?>
<section id="cb-logo">
	<?php
	if ( has_custom_logo() ) :

		the_custom_logo();
	else:
		$html             = '';
		$site_name        = get_bloginfo( 'name' );
		$site_description = get_bloginfo( 'description' );

		if ( ! empty( $site_name ) ):
			 $html .= '<h1><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( $site_name ) . '</a></h1>';
		endif;
		if ( ! empty( $site_description ) ):
			 $html .= '<h5>' . esc_html( $site_description ) . '</h5>';
		endif;

		echo $html;
	endif;

	?>
</section>
