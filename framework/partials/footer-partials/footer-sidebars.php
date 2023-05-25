<?php if (cafebistro_active_footer() != false): ?>
    <section id="cb-footer-area" class="full-section-60">
        <?php 
        $cafebistro_footer_info = cafebistro_active_footer();
        $cafebistro_footer_class = $cafebistro_footer_info['class'];
        $cafebistro_sidebars_count = $cafebistro_footer_info['sidebars_count'];
        ?>

        <div class="container">
            <div class="row">

                <div id="cb-footer-sidebars">

                    <div class="col-lg-12">
                        <?php get_template_part('framework/partials/footer-partials/bottom-nav'); ?>
                    </div>

                    <?php for($i=1; $i<$cafebistro_sidebars_count+1; $i++): ?>

                        <div class="<?php echo $cafebistro_footer_class; ?> cb-footer-sidebar">
                            <?php if (!dynamic_sidebar('cb-footer-'.$i)): ?>
                                <div class="pre-widget">

                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
      </div>
    </section>
<?php endif; ?>