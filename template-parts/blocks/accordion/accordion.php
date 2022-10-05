<?php

/**
 * Accordion Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'accordion-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'accordion';
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
        <div class="accordion__wrapper">
            <div class="accordion__header">
                <?php if( get_field('title') ): ?>
                <h2 class="accordion__title"><?php the_field('title'); ?></h2>
                <?php endif; ?>
                <?php if( get_field('description') ): ?>
                <p class="accordion__desc"><?php the_field('description'); ?></p>
                <?php endif; ?>
            </div>
            <?php if( have_rows('faq') ): ?>
            <div class="accordion__content">
                <ul class="accordion__list">
                    <?php while( have_rows('faq') ): the_row(); ?>
                    <li class="accordion__item">
                        <h3 class="accordion__question"><?php the_sub_field('question'); ?></h3>
                        <div class="accordion__answer"><?php the_sub_field('answer'); ?></div>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>