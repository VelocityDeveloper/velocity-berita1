<?php

/**
 * The template for displaying all single posts
 *
 * @package justg
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container  = velocitytheme_option('justg_container_type', 'container');
$full_url   = get_the_post_thumbnail_url(get_the_ID(), 'full');
$format     = get_post_format() ?: 'standard';
?>

<div class="wrapper" id="single-wrapper">

    <div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">

        <div class="card-breadcrumbs pt-2 px-3 mb-3">
            <?php echo justg_breadcrumb(); ?>
        </div>

        <div class="row">

            <!-- Do the left sidebar check -->
            <?php do_action('justg_before_content'); ?>

            <main class="site-main col order-2" id="main">

                <?php

                while (have_posts()) {
                    the_post();
                    $author_id = get_post_field('post_author', get_the_ID());
                    $author_link = get_author_posts_url($author_id);
                ?>

                    <?php the_title('<h1 class="entry-title h4 fw-bold">', '</h1>'); ?>

                    <div class="d-flex mt-2 justify-content-between align-items-center py-1 pb-2 px-2 border-bottom text-muted mb-3">
                        <div>
                            <small>
                                <a href="<?php echo $author_link; ?>"><?php echo get_the_author(); ?></a>
                            </small>
                            <span> | </span>
                            <small>
                                <?php echo get_the_date('j F Y, H:i a'); ?>
                            </small>
                            <span> | </span>
                            <small><?php echo do_shortcode('[vdhit]'); ?></small>
                        </div>
                    </div>

                    <div class="entry-content">
                        <div class="row m-0">
                            <div class="col-sm-9 pe-sm-0">
                                <div class="mb-2">
                                    <div class="mb-3">
                                        <?php get_berita_iklan('iklan_content'); ?>
                                    </div>
                                    <?php
                                    if ($full_url && $format !== 'video') {
                                        echo '<img class="img-fluid w-100 mb-2" src="' . $full_url . '" loading="lazy">';
                                    }
                                    ?>
                                </div>
                                <?php the_content(); ?>
                                <div class="pb-3">
                                    <?php edit_post_link(__('Edit', 'justg'), '<span class="edit-link"><i class="bi bi-pencil-square" aria-hidden="true"></i> ', '</span>'); ?>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="d-none d-sm-block">
                                    <?php get_berita_iklan('iklan_content_2'); ?>
                                </div>
                            </div>
                        </div>

                        <?php
                        wp_link_pages(
                            array(
                                'before' => '<div class="page-links">' . __('Pages:', 'justg'),
                                'after'  => '</div>',
                            )
                        );
                        ?>
                    </div><!-- .entry-content -->

                    <div class="share-post mb-2">
                        Share : <?php echo justg_share(); ?>
                    </div>

                    <div class="related-post">
                        <div class="related-post-title my-3">
                            <h5 class="fw-bold">Berita Terkait</h5>
                        </div>
                        <div class="related-post">
                            <?php
                            module_vdposts(array(
                                'post_type'         => 'post',
                                'posts_per_page'    => 4,
                                'post__not_in'      => [get_the_ID()],
                                'category__in'      => wp_get_post_categories(get_the_ID()),
                            ), 'posts7');
                            ?>
                        </div>
                    </div>

                    <div class="single-post-nav my-3">
                        <div class="nav-post">
                            <div class="d-md-flex justify-content-between pt-1 btn-group" role="group" aria-label="Navigation Post">
                                <?php
                                $prev_post = get_adjacent_post(false, '', true);
                                if (!empty($prev_post)) {
                                    echo '<a class="text-start" href="' . get_permalink($prev_post->ID) . '" class="btn btn-sm" title="' . $prev_post->post_title . '"><i class="bi bi-chevron-left me-2" aria-hidden="true"></i>' . $prev_post->post_title . '</a>';
                                }
                                $next_post = get_adjacent_post(false, '', false);
                                if (!empty($next_post)) {
                                    echo '<a class="text-end" href="' . get_permalink($next_post->ID) . '" class="btn btn-sm" title="' . $next_post->post_title . '">' . $next_post->post_title . '<i class="bi bi-chevron-right ms-2" aria-hidden="true"></i></a>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                <?php

                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) {
                        do_action('justg_before_comments');
                        comments_template();
                        do_action('justg_after_comments');
                    }
                }
                ?>

            </main><!-- #main -->

            <!-- Do the right sidebar check. -->
            <?php do_action('justg_after_content'); ?>

        </div><!-- .row -->

    </div><!-- #content -->

</div><!-- #single-wrapper -->

<?php
get_footer();
