<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action('storefront_before_site'); ?>

<div id="page" class="hfeed site">
    <?php do_action('storefront_before_header'); ?>
    <?php if (is_front_page()) : ?>
    <header id="masthead" class="site-header black-header" role="banner" style="<?php storefront_header_styles(); ?>">
        <?php else: ?>
        <header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">
            <?php endif; ?>

            <div class="container p-0">
                <?php if (is_front_page()) : ?>
                <nav class="navbar navbar-dark navbar-expand-lg p-0 justify-content-between">
                    <?php else: ?>
                    <nav class="navbar navbar-light navbar-expand-lg p-0 justify-content-between">
                        <?php endif; ?>

                        <div class="navbar-brand">
                            <?php if (get_theme_mod('wp_bootstrap_starter_logo')): ?>
                                <div class="site-info">
                                    <a href="<?php echo esc_url(home_url('/')); ?>"><?= esc_url(get_bloginfo('name')); ?>
                                        <img src="<?= esc_url(get_theme_mod('wp_bootstrap_starter_logo')); ?>"
                                             alt="<?= esc_attr(get_bloginfo('name')); ?>">
                                    </a>
                                </div>
                            <?php else : ?>
                                <div class="site-info">
                                    <a class="site-title"
                                       href="<?php echo esc_url(home_url('/')); ?>"> PR-агентство <br
                                                class="d-lg-none d-block">
                                        <span>«<?php esc_url(bloginfo('name')); ?>»</span>
                                    </a>
                                    <p class="mb-0 site-description"><?php bloginfo('description'); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="d-flex">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'container' => 'div',
                                'container_id' => '',
                                'container_class' => 'collapse navbar-collapse justify-content-end mr-2',
                                'menu_id' => false,
                                'menu_class' => 'navbar-nav',
                                'depth' => 3,
                                'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                                'walker' => new wp_bootstrap_navwalker()
                            ));
                            ?>
                            <?php if (class_exists('WooCommerce')): ?>
                                <div
                                        class="s-header__basket-wr woocommerce mr-1 mr-sm-4 mt-auto mb-auto z-5 position-relative">
                                    <?php
                                    global $woocommerce; ?>
                                    <a href="<?php echo $woocommerce->cart->get_cart_url() ?>"
                                       class="basket-btn basket-btn_fixed-xs text-decoration-none position-relative">
                        <span class="basket-btn__label"><img src="/wp-content/themes/storefront-child/svg/cart.svg"
                                                             alt=""></span>
                                        <?php if (sprintf($woocommerce->cart->cart_contents_count) != 0): ?>
                                            <span
                                                    class="basket-btn__counter"><?php echo sprintf($woocommerce->cart->cart_contents_count); ?></span>
                                        <?php endif; ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <div class="outer-menu">
                                <button class="navbar-toggler position-relative" type="button" style="z-index: 1">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <input class="checkbox-toggle" data-toggle="collapse" data-target="#main-nav"
                                       aria-controls="" aria-expanded="false" aria-label="Toggle navigation"
                                       type="checkbox"/>
                                <div class="menu">
                                    <div>
                                        <div class="border-header">
                                            <?php
                                            wp_nav_menu(array(
                                                'theme_location' => 'primary',
                                                'container' => 'div',
                                                'container_id' => 'main-nav',
                                                'container_class' => 'collapse navbar-collapse justify-content-end',
                                                'menu_id' => false,
                                                'menu_class' => 'navbar-nav',
                                                'depth' => 3,
                                                'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                                                'walker' => new wp_bootstrap_navwalker()
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-lg-flex d-none">
                            <p class="site-phone"><a href="tel:+7 926 917-21-23">+7 (926) 917-21-23</a></p>
                        </div>
                    </nav>
            </div>

        </header><!-- #masthead -->

        <?php
        /**
         * Functions hooked in to storefront_before_content
         *
         * @hooked storefront_header_widget_region - 10
         * @hooked woocommerce_breadcrumb - 10
         */
        do_action('storefront_before_content');
        ?>

        <div id="content" class="site-content">
            <div class="container">
                <div class="row">

<?php
do_action('storefront_content_top');
