<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>    
</head>
<body>
<header class="header">
    <div class="container">
        <div class="header__wrapper">        
            <?php
            $logo = get_field('header_logo_image', 'option');
            if(!empty( $logo ) || get_field('header_logo_text', 'option')):
                $logo_text_color = get_field('header_logo_text_color', 'option');
            ?>
            <div class="header__logo logo"<?php echo $logo_text_color ? 'style="color:'.$logo_text_color.'"' : ''; ?>>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo__link">
                    <div class="logo__wrapper">
                        <?php if( !empty( $logo ) ): ?>
                        <img class="logo__image" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>">
                        <?php endif; ?>
                        <?php if( get_field('logo_text', 'option') ): ?>
                        <div class="logo__text"><?php the_field('header_logo_text', 'option'); ?></div>
                        <?php endif; ?>
                    </div>                    
                </a>
            </div>
            <?php endif; ?>
            <div class="header__nav-overlay">
                <div class="header__nav-wrap">
                    <button class="header__nav-close"></button>
                    <?php if(has_nav_menu('header_menu')): ?>
                    <nav class="header__nav">
                        <?php 
                        draw_menu_single_level('header_menu', 'header__nav-list', 'header__nav-item', 'header__nav-link');
                        ?>
                    </nav>
                    <?php endif; ?>
                    <?php if(get_field('header_button_text', 'option') && get_field('header_button_link', 'option')): ?>
                    <a href="<?php the_field('header_button_link', 'option'); ?>" class="header__button button"><?php the_field('header_button_text', 'option'); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <button class="header__menu-button menu-button">
                <span class="menu-button__inner"></span>
            </button>
        </div>
    </div>
</header>