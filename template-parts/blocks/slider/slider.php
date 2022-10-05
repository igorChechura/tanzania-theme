<?php

/**
 * Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'slider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'slider';
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
    <?php if( have_rows('slides') ): ?>
		<div class="slides">
			<?php while( have_rows('slides') ): the_row(); 
				$image = get_sub_field('image');
				?>
				<div class="slider__slide">                    
					<?php echo wp_get_attachment_image( $image['id'], 'full' ); ?>
                    <div class="slider__content">
                        <div class="container slider__container">
                            <div class="slider__content-wrap">
                            <?php if( get_sub_field('title') ): ?>
                                <h2 class="slider__title"><?php the_sub_field('title'); ?></h2>
                            <?php endif; ?>
                            <?php if( get_sub_field('description') ): ?>
                                <div class="slider__desc"><?php the_sub_field('description'); ?></div>
                            <?php endif; ?>
                            <?php if(get_sub_field('button_text') && get_sub_field('button_link')): ?>
                                <div class="slider__button-wrap">
                                    <a href="<?php the_sub_field('button_link'); ?>" class="slider__button button button--light"><?php the_sub_field('button_text'); ?></a>
                                </div>                                
                            <?php endif; ?>
                            <?php if( have_rows('list_of_benefits')): ?>
                                <ul class="slider__benefits">
                                <?php while( have_rows('list_of_benefits') ): the_row(); ?>
                                    <li class="slider__benefits-item"><?php the_sub_field('item_text') ?></li>
                                <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                            </div>                        
                        </div>
                    </div>
				</div>
			<?php endwhile; ?>
		</div>
        <div class="progressbar">
            <div class="progressbar__current"></div>
            <div class="progressbar__line"></div>
            <div class="progressbar__all"></div>
        </div>
	<?php else: ?>
		<p>Please add some slides.</p>
	<?php endif; ?>
    </section>