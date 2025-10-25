<footer class="site-footer container bg-light p-0" id="colophon">
    <div class="p-3">
        <?php echo get_berita_iklan('iklan_footer'); ?>
    </div>

    <div class="widget-footer p-3">
        <div class="velocity-footer">
            <div class="row footer-widget text-start m-0">
                <?php for ($x = 1; $x <= 4; $x++) {
                    if (is_active_sidebar('footer-widget' . $x)) : ?>
                        <div class="col-md">
                            <?php dynamic_sidebar('footer-widget' . $x); ?>
                        </div>
                    <?php endif; ?>
                <?php } ?>
            </div>
        </div>
    </div>

    <hr class="m-0">
    <div class="b-news">
        <div class="row m-0 align-items-center">
            <div class="col-sm-2 d-none d-sm-flex bn-title">
                <div class="text-center w-100"><i class="bi bi-lightning-charge" aria-hidden="true"></i> Breaking News</div>
            </div>
            <div class="col-12 col-sm-10 pe-0">
                <?php $breakingnews = get_theme_mod('breaking_news', '');
                $args = array(
                    'posts_per_page' => 5,
                );
                if ($breakingnews) {
                    $args['cat'] = $breakingnews;
                }
                $wp_query = new WP_Query($args);
                if ($wp_query->have_posts()) : ?>
                    <div class="breaking-news">
                        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                            <div class="iy-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </div>
        </div>
    </div>
    <hr class="m-0">

    <div class="site-info p-3 text-muted">
        <small>
            © <?php echo date("Y"); ?> <?php echo get_bloginfo('name'); ?>. All Rights Reserved.
            Design by <a class="text-secondary" href="https://velocitydeveloper.com" target="_blank" rel="noopener noreferrer"> Velocity Developer </a>
        </small>
    </div>
    <!-- .site-info -->
</footer>
