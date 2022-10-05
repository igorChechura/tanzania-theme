<?php

/**
 * Text-image Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'text-image-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'text-image';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview ) {
    $className .= ' is-admin';
}

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <?php 
        $image_location = get_field('image_location');
        ?>
        <div class="text-image__wrapper text-image__wrapper--<?php echo esc_attr($image_location); ?>">
        <?php
        $image = get_field('image');
        if( !empty( $image ) ): ?>
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="text-image__image" />
        <?php endif; ?>
            <div class="text-image__text">
                <?php if( get_field('title') ): ?>
                <h2 class="text-image__title"><?php the_field('title'); ?></h2>
                <?php endif; ?>
                <?php if( get_field('description') ): ?>
                <p class="text-image__desc"><?php the_field('description'); ?></p>
                <?php endif; ?>
                <?php if( have_rows('benefits') ): ?>
                <ul class="text-image__list">
                    <?php while( have_rows('benefits') ): the_row(); ?>
                    <li class="text-image__item">
                        <h3 class="text-image__item-title"><?php the_sub_field('title'); ?></h3>
                        <p class="text-image__item-text"><?php the_sub_field('text'); ?></p>
                    </li>
                    <?php endwhile; ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>