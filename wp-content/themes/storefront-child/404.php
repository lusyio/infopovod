<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package storefront
 */

get_header(); ?>

    <div id="primary" class="content-area error-404 col-12">

        <main id="main" class="site-main" role="main">

            <div class="not-found">

                <div class="page-content">

                    <header class="page-header">
                        <h1 class="page-title">Упс! Такая странице не найдена :(</h1>
                    </header><!-- .page-header -->

                    <p><?php esc_html_e('Тут ничего не найдено. Попробуйте другие ссылки или вернитесь на ', 'storefront'); ?>
                        <a href="/">главную</a></p>

                </div><!-- .page-content -->
            </div><!-- .error-404 -->

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
