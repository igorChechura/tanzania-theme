<?php
add_action('acf/init', 'my_register_blocks');
function my_register_blocks()
{
    // check function exists.
    if (function_exists('acf_register_block_type')) {

        // register a slider block.
        acf_register_block_type(array(
            'name'              => 'slider',
            'title'             => __('Slider'),
            'description'       => __('A custom slider block.'),
            'render_template'   => 'template-parts/blocks/slider/slider.php',
            'category'          => 'formatting',
            'icon'                 => 'images-alt2',
            'align'           => 'full',
            'enqueue_assets'     => function () {
                wp_enqueue_style('slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1');
                wp_enqueue_style('slick-theme', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.8.1');
                wp_enqueue_script('slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true);

                wp_enqueue_style('block-slider', get_template_directory_uri() . '/template-parts/blocks/slider/slider.min.css', array(), filemtime(get_stylesheet_directory() . '/template-parts/blocks/slider/slider.min.css'));
                wp_enqueue_script('block-slider', get_template_directory_uri() . '/template-parts/blocks/slider/slider.min.js', array(), filemtime(get_stylesheet_directory() . '/template-parts/blocks/slider/slider.min.js'), true);
            },
        ));
        
        // register a accordion block.
        acf_register_block_type(array(
            'name'              => 'accordion',
            'title'             => __('Accordion'),
            'description'       => __('A custom accordion block.'),
            'render_template'   => 'template-parts/blocks/accordion/accordion.php',
            'category'          => 'formatting',
            'icon'                 => 'list-view',
            'align'           => 'full',
            'enqueue_assets'     => function () {
                wp_enqueue_style('block-accordion', get_template_directory_uri() . '/template-parts/blocks/accordion/accordion.min.css', array(), filemtime(get_stylesheet_directory() . '/template-parts/blocks/accordion/accordion.min.css'));
                wp_enqueue_script('block-accordion', get_template_directory_uri() . '/template-parts/blocks/accordion/accordion.min.js', array('jquery'), filemtime(get_stylesheet_directory() . '/template-parts/blocks/accordion/accordion.min.js'), true);
            },
        ));
        
        // register a text-image block.
        acf_register_block_type(array(
            'name'              => 'text-image',
            'title'             => __('Text + Image'),
            'description'       => __('A custom text-image block.'),
            'render_template'   => 'template-parts/blocks/text-image/text-image.php',
            'category'          => 'formatting',
            'icon'                 => 'analytics',
            'align'           => 'full',
            'enqueue_assets'     => function () {
                wp_enqueue_style('block-text-image', get_template_directory_uri() . '/template-parts/blocks/text-image/text-image.min.css', array(), filemtime(get_stylesheet_directory() . '/template-parts/blocks/text-image/text-image.min.css'));
            },
        ));
    }
}
