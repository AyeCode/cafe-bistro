<?php
$show_breadcrumb = cafebistro_breadcrumb();
get_header(); ?>
<?php
if (have_posts()):while (have_posts()):the_post(); ?>

    <!-- This section contains the full item content+ sidebars -->
    <article id="full-container-<?php the_ID(); ?>" <?php post_class();?>>

 
            <!-- Title -->

            <section id="single-title-container">

                <?php get_template_part('/framework/partials/common-partials/title'); ?>

            </section>

        <!-- Content , differs when the layout is full or boxed. -->
        <?php
           get_template_part('/framework/partials/main-content/boxed-9-content');
        ?>
    </article>
    <!-- Full section ends here -->
<?php endwhile; endif;

get_footer();