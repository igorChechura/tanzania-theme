<footer class="footer">
    <div class="container">
        <div class="footer__top">
            <?php
            $logo = get_field('footer_logo_image', 'option');
            if(!empty( $logo ) || get_field('footer_logo_text', 'option')):
                $logo_text_color = get_field('footer_logo_text_color', 'option');
            ?>
            <div class="footer__logo logo logo--white logo--footer"<?php echo $logo_text_color ? 'style="color:'.$logo_text_color.'"' : ''; ?>>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo__link">
                    <div class="logo__wrapper">
                        <?php if( !empty( $logo ) ): ?>
                        <img class="logo__image" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>">
                        <?php endif; ?>
                        <?php if( get_field('logo_text', 'option') ): ?>
                        <div class="logo__text"><?php the_field('footer_logo_text', 'option'); ?></div>
                        <?php endif; ?>
                    </div>                    
                </a>
            </div>
            <div class="footer__menus">
                <?php if(has_nav_menu('footer_left_menu')): ?>
                <nav class="footer__nav footer__nav--left">
                    <?php if(get_menu_title('footer_left_menu')): ?>
                    <h2 class="footer__nav-title"><?php echo get_menu_title('footer_left_menu') ?></h2>
                    <?php endif; ?>
                    <?php 
                    draw_menu_single_level('footer_left_menu', 'footer__nav-list', 'footer__nav-item', 'footer__nav-link');
                    ?>
                </nav>
                <?php endif; ?>
                <?php if(has_nav_menu('footer_right_menu')): ?>
                <nav class="footer__nav footer__nav--right">
                    <?php if(get_menu_title('footer_right_menu')): ?>
                    <h2 class="footer__nav-title"><?php echo get_menu_title('footer_right_menu'); ?></h2>
                    <?php endif; ?>
                    <?php 
                    draw_menu_single_level('footer_right_menu', 'footer__nav-list', 'footer__nav-item', 'footer__nav-link');
                    ?>
                </nav>
                <?php endif; ?>
                <div class="footer__button-wrap">
                    <?php if(get_field('footer_button_text', 'option') && get_field('footer_button_link', 'option')): ?>                
                    <a href="<?php the_field('footer_button_link', 'option'); ?>" class="footer__button button button--light"><?php the_field('footer_button_text', 'option'); ?></a>
                    <?php endif; ?>
                </div>                
            </div>
            <?php endif; ?>
        </div>
        <div class="footer__bottom">
            <div class="footer__copyright">
                <p class="footer__copy-text">&copy;&nbsp;<?php echo date("Y"); ?>&nbsp;<?php the_field('footer_copyright_text', 'option'); ?></p>
                <?php if(has_nav_menu('footer_bottom_menu')): ?>
                <nav class="footer__bottom-nav">
                    <?php 
                    draw_menu_single_level('footer_bottom_menu', 'footer__bottom-list', 'footer__bottom-item', 'footer__bottom-link');
                    ?>
                </nav>
                <?php endif; ?>
            </div>
            <?php if( have_rows('footer_social_media', 'option') ): ?>
                <nav class="footer__social">
                    <ul class="footer__soc-list">
                    <?php while( have_rows('footer_social_media', 'option') ): the_row();
                        $icon = get_sub_field('icon');
                    ?>
                        <li class="footer__soc-item">
                            <a href="<?php the_sub_field('link'); ?>" title="<?php the_sub_field('title'); ?>" target="_blank" class="footer__soc-link">
                                <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php the_sub_field('title'); ?>" class="footer__soc-image">
                            </a>
                        </li>
                    <?php endwhile; ?>
                    </ul>
                </nav>
            <?php endif; ?>
        </div>
    </div>       
</footer>
<?php wp_footer(); ?>
</body>
</html>