<div class=" first-head-part bg-white">
    <div class="row m-0 align-items-center">
        <div class="col-sm-2 d-none d-sm-flex bn-title">
            <div class="text-center w-100"><i class="fa fa-bolt" aria-hidden="true"></i> Breaking News</div>
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

<div class="head-part-top bg-light">
    <div class="row m-0 py-2 align-items-center">
        <div class="col-md-4">
            <div class="text-center p-1">
                <?php echo the_custom_logo(); ?>
            </div>
        </div>
        <div class="col-md-8">
            <?php echo get_berita_iklan('iklan_header'); ?>
        </div>
    </div>
</div>

<div class="scrollHeader">
    <div class="velocity-navbar bg-black">
        <div class="container bg-transparent">
            <nav id="main-nav" class="navbar navbar-expand-md d-block navbar-dark shadow-sm p-0" aria-labelledby="main-nav-label">

                <h2 id="main-nav-label" class="screen-reader-text">
                    <?php esc_html_e('Main Navigation', 'justg'); ?>
                </h2>

                <div class="head-part-menu navbar-dark">
                    <div class="menu-header">
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNavOffcanvas" aria-controls="navbarNavOffcanvas" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'justg'); ?>">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="offcanvas offcanvas-start bg-black" tabindex="-1" id="navbarNavOffcanvas">

                            <div class="offcanvas-header justify-content-end">
                                <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div><!-- .offcancas-header -->

                            <!-- The WordPress Menu goes here -->
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location'  => 'primary',
                                    'container_class' => 'offcanvas-body',
                                    'container_id'    => '',
                                    'menu_class'      => 'navbar-nav justify-content-start flex-grow-1 pe-3 text-uppercase fw-bold',
                                    'fallback_cb'     => '',
                                    'menu_id'         => 'main-menu',
                                    'depth'           => 4,
                                    'walker'          => new justg_WP_Bootstrap_Navwalker(),
                                )
                            );
                            ?>
                        </div><!-- .offcanvas -->
                    </div>
                </div>

            </nav><!-- .site-navigation -->
        </div>
    </div>

    <div class="third-head-part bg-dark">
        <div class="container bg-transparent">
            <div class="row m-0 align-items-center">
                <div class="col-md-9 col-3 p-0 align-items-center">
                    <nav id="main-nav" class="navbar navbar-expand-md d-block navbar-dark p-0" aria-labelledby="main-nav-label">
                        <div class="secondary-menu position-relative">

                            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNavOffcanvas2" aria-controls="navbarNavOffcanvas2" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'justg'); ?>">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="offcanvas offcanvas-start bg-dark" tabindex="-1" id="navbarNavOffcanvas2">
                                <div class="offcanvas-header justify-content-end">
                                    <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div><!-- .offcancas-header -->

                                <!-- The WordPress Menu goes here -->
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location'  => 'secondary',
                                        'container_class' => 'secondary-menu-body offcanvas-body',
                                        'container_id'    => '',
                                        'menu_class'      => 'navbar-nav justify-content-start flex-grow-1',
                                        'fallback_cb'     => '',
                                        'menu_id'         => 'secondary-menu',
                                        'depth'           => 1,
                                        'walker'          => new justg_WP_Bootstrap_Navwalker(),
                                    )
                                );
                                ?>
                            </div><!-- .offcanvas -->
                        </div>
                    </nav>
                </div>
                <div class="col-md-3 col-9 p-0">
                    <div class="search-header float-end">
                        <form action="" method="get" id="search" class="d-flex overflow-hidden">
                            <input type="text" name="s" placeholder="Search" class="form-control-sm bg-transparent border-0 rounded-0 py-0">
                            <button type="submit" class="btn btn-link text-secondary py-0 px-2">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>