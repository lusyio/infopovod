<?php
/*
Template Name: projects
Template Post Type: post, page, product
*/
?>

<?php get_header(); ?>


<div class="container projects">
    <div class="row">
        <div class="col-12">
            <p class="projects__header">Реализованные проекты</p>
        </div>

        <?php
        $posts = get_posts(array(
            'numberposts' => 10
        ));
        foreach ($posts as $post) :?>

            <?php
            $content = $post->post_content;
            $content_parts = preg_split('~:~', $content, 5);
            ?>

            <div class="col-lg-6 col-12">
                <div class="project-card">
                    <img class="project-card__img"
                         src="<?= get_the_post_thumbnail_url($post->ID, 'post-thumbnail') ? get_the_post_thumbnail_url($post->ID, 'post-thumbnail') : '/wp-content/themes/storefront-child/images/540x275.jpg' ?>"
                         alt="<?= $post->post_title ?>">
                    <div class="project-card__body">
                        <p class="project-card__header"><?= $post->post_title ?> </p>
                        <?= ($content_parts[2]) ? '<p class="project-card__content"><strong>Заказчик:</strong> ' . $content_parts[1] . '</p>' : '' ?>
                        <?= ($content_parts[2]) ? '<p class="project-card__content"><strong>Задача:</strong> ' . $content_parts[2] . '</p>' : '' ?>
                        <?= ($content_parts[3]) ? '<p class="project-card__content"><strong>Суть инфоповода:</strong> ' . $content_parts[3] . '</p>' : '' ?>
                        <?= ($content_parts[4]) ? '<p class="project-card__content"><strong>Результат:</strong> ' . $content_parts[4] . '</p>' : '' ?>
                        <div class="project-card__media">
                            <p>
                                <?php if (get_post_meta($post->ID, 'tv', true) !== ''): ?>
                                    <img src="/wp-content/themes/storefront-child/svg/checked.svg"
                                         alt=""><strong><?= get_post_meta($post->ID, 'tv', true) ?></strong> на тв
                                <?php endif; ?>
                                <?= get_post_meta($post->ID, 'additional-link', true) ? '<a class="additional-link" href="' . get_post_meta($post->ID, 'additional-link', true) . '">(см. пример)</a>' : '' ?>
                            </p>
                            <?php if (get_post_meta($post->ID, 'media', true) !== ''): ?>
                                <p><img src="/wp-content/themes/storefront-child/svg/checked.svg"
                                        alt=""><strong><?= get_post_meta($post->ID, 'media', true) ?></strong> в
                                    федеральных
                                    СМИ</p>
                            <?php endif; ?>
                        </div>
                        <?= get_post_meta($post->ID, 'main-link', true) ? '<a class="project-card__video-link" href="' . get_post_meta($post->ID, 'main-link', true) . '">Смотреть
                            видео</a>' : '' ?>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
        <div class="col-12 col-lg-8 offset-lg-2 offset-0">
            <p class="projects__footer"><strong>Еще более 350 кейсов</strong> мы не можем раскрывать по соображениям
                конфиденциальности.</p>
        </div>
    </div>
</div>

<?php get_footer(); ?>


