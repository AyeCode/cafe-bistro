<?php
/*
 * Header Image partial partial.
 */

if (is_home()): ?>

    <h1 id="single-title"><?php echo get_the_title($id); ?></h1>

<?php elseif(is_tax()) : $term = get_term_by('slug',get_query_var('term'),get_query_var('taxonomy')); ?>
    <h1 id="single-title"><?php echo $term->name; ?></h1>

<?php elseif (is_category()): ?>
    <h1 id="single-title"><?php echo __('Posts in category: ', 'cafe-bistro'); ?><?php single_cat_title(); ?></h1>

<?php elseif (is_tag()): ?>
    <h1 id="single-title"><?php echo __('Posts tagged with: ', 'cafe-bistro'); ?><?php single_tag_title(); ?></h1>

<?php elseif (is_search()): ?>
    <h1 id="single-title"><?php echo __('Search results for:  ', 'cafe-bistro'). get_query_var('s'); ?></h1>

<?php elseif (is_archive()): ?>

    <?php
    $archive = get_the_archive_title();
    ?>

    <h1 id="single-title"><?php echo $archive; ?></h1>
<?php else: ?>
    <h1 id="single-title"><?php the_title(); ?></h1>
<?php endif; ?>