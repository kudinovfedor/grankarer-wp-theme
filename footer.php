</div><!-- .page-wrapper end-->

<footer class="footer js-footer">
    <?php if (is_active_sidebar('footer-widget-area')) : ?>
        <div class="pre-footer">
            <div class="container">
                <div class="row">
                    <?php dynamic_sidebar('footer-widget-area'); ?>
                </div>
            </div>
        </div><!-- .pre-footer end-->
    <?php endif; ?>

    <div class="footer-main">
        <div class="container d-flex align-items-center">
            <div class="footer-logo column">
                <div class="logo">
                    <?php if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        $svg = '<svg class="svg-icon" width="291" height="55" fill="#002f62"><use xlink:href="#logo-blue"></use></svg>';
                        $link = sprintf('<a class="logo-link" href="%s">%s</a>', esc_url(home_url('/')), $svg);
                        $span = sprintf('<span class="logo-link">%s</span>', $svg);

                        echo is_front_page() ? $span : $link;
                    } ?>
                </div>
            </div>
            <div class="column mx-auto">
                <?php wp_nav_menu(array(
                    'theme_location' => 'second-menu',
                    'container' => 'nav',
                    'menu_class' => 'footer-menu',
                    'menu_id' => '',
                    'fallback_cb' => 'wp_page_menu',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth' => 1
                )); ?>
            </div>
            <div class="footer-phone column d-flex align-items-center">
                <svg class="svg-icon" width="71" height="71" fill="#0060b1">
                    <use xlink:href="#phone-header"></use>
                </svg>
                <div>
                    <?php
                    $count = count(get_phones());
                    if (has_phones()) { ?>
                        <ul class="phone">
                            <?php foreach (get_phones() as $i => $parent) { ?>
                                <?php if ($i !== 0) continue ?>
                                <li class="phone-item <? echo $count > 1 ? 'has-children' : '' ?>">
                                    <a href="tel:<?php echo esc_attr(get_phone_number($parent)) ?>"
                                       class="phone-number">
                                        <?php echo strip_tags($parent, '<i>') ?>
                                        <?php if ($count > 1) { ?>
                                            <i class="fa fa-fw fa-angle-down" aria-hidden="true"></i>
                                        <?php } ?>
                                    </a>
                                    <?php if ($count > 1) { ?>
                                        <ul class="phone phone-dropdown">
                                            <?php foreach (get_phones() as $j => $child) { ?>
                                                <?php if ($j == 0) continue ?>
                                                <li class="phone-item">
                                                    <a href="tel:<?php echo esc_attr(get_phone_number($child)) ?>"
                                                       class="phone-number">
                                                        <?php echo strip_tags($child, '<i>') ?>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                    <button type="button" class="footer-callback callback-link <?php the_lang_class('js-call-back') ?>">
                        <?php _e('Call back', 'brainworks') ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-info">
        <div class="container d-flex">
            <div class="footer-copyright column mr-auto">
                &copy; <?php echo date('Y'); ?>. <?php _e('All rights reserved', 'brainworks') ?>
            </div>
            <div class="footer-developer column">
                <?php _e('Developed by', 'brainworks') ?> <a href="https://brainworks.pro/" target="_blank">BrainWorks</a>
            </div>
        </div>
    </div>
</footer>

</div><!-- .wrapper end-->

<?php scroll_top(); ?>

<?php if (is_customize_preview()) { ?>
    <button class="button-small customizer-edit" data-control='{ "name":"bw_scroll_top_display" }'>
        <?php esc_html_e('Edit Scroll Top', 'brainworks'); ?>
    </button>
    <button class="button-small customizer-edit" data-control='{ "name":"bw_analytics_google_placed" }'>
        <?php esc_html_e('Edit Analytics Tracking Code', 'brainworks'); ?>
    </button>
    <button class="button-small customizer-edit" data-control='{ "name":"bw_login_logo" }'>
        <?php esc_html_e('Edit Login Logo', 'brainworks'); ?>
    </button>
<?php } ?>

<div class="is-hide"><?php svg_sprite(); ?></div>

<?php wp_footer(); ?>

</body>
</html>
