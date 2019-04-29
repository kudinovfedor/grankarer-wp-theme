<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">

    <meta property="og:locale" content="en_US" />
    <meta property="og:locale:alternate" content="ru_RU" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Качественный щебень оптом | Гранкарьер" />
    <meta property="og:description" content="Качественный щебень оптом по доступным ценам">
    <meta property="og:url" content="https://grankarer.com/" />
    <meta property="og:site_name" content="Гранкарьер" />
    <meta property="og:image" content="https://grankarer.com/wp-content/uploads/grankarer.jpg" />
    <meta property="og:image:secure_url" content="https://grankarer.com/wp-content/uploads/grankarer.jpg" />
    <meta property="og:image:width" content="1280" />
    <meta property="og:image:height" content="628" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Качественный щебень оптом | Гранкарьер" />
    <meta name="twitter:image" content="https://grankarer.com/wp-content/uploads/grankarer.jpg" />


    <link rel="shortcut icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/favicon.ico'); ?>"
          type="image/x-icon">
    <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/favicon.ico'); ?>"
          type="image/x-icon">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> id="top">

<?php wp_body(); ?>

<div class="wrapper">
    <header class="header">
        <div class="container">
            <div class="d-flex align-items-center justify-content-center">
                <div class="header-logo column mr-auto">
                    <div class="logo">
	                    <?php if ( has_custom_logo() ) {
		                    the_custom_logo();
	                    } else {
		                    $lang = 'en';
		                    $path = get_template_directory_uri() . '/assets/img/lang';
		                    $file = $path . '/logo-header-en.svg';

		                    if ( function_exists( 'pll_current_language' ) ) {
			                    $lang = pll_current_language( 'slug' );
			                    $file = $path . '/logo-header-' . pll_current_language( 'slug' ) . '.svg';
		                    }

		                    $img  = sprintf( '<img class="logo-img logo-img-%s" src="%s" alt="%s">', $lang, esc_url( $file ), get_bloginfo( 'name' ) );
		                    $link = sprintf( '<a class="logo-link" href="%s">%s</a>', esc_url( home_url( '/' ) ), $img );
		                    $span = sprintf( '<span class="logo-link">%s</span>', $img );

		                    echo is_front_page() ? $span : $link;
	                    } ?>
                    </div>
                </div>
                <div class="header-info column d-flex align-items-center">
                    <div class="column header-call d-flex align-items-center">
                        <svg class="svg-icon" width="71" height="71" fill="#ffffff">
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
                            <button type="button" class="header-callback callback-link <?php the_lang_class('js-call-back') ?>">
                                <?php _e('Call back', 'brainworks') ?>
                            </button>
                        </div>
                    </div>

                    <?php if (function_exists('pll_the_languages')) { ?>
                        <div class="column lang header-lang">
                            <?php pll_the_languages(array(
                                'dropdown' => 1,
                                'show_flags' => 0,
                                'show_names' => 1,
                                'hide_if_empty' => 0,
                                'display_names_as' => 'name'
                            )); ?>
                        </div>
                    <?php } ?>
                    <div class="column header-menu">
                        <button class="hamburger js-hamburger navi-main-menu-activator" type="button" tabindex="0">
                            <span class="hamburger-text"><?php _e('Menu', 'brainworks') ?></span>
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <?php /* if (has_nav_menu('main-nav')) { ?>
        <nav class="nav js-menu">
            <button type="button" tabindex="0" class="menu-item-close menu-close js-menu-close"></button>
            <?php wp_nav_menu(array(
                'theme_location' => 'main-nav',
                'container' => false,
                'menu_class' => 'menu-container',
                'menu_id' => '',
                'fallback_cb' => 'wp_page_menu',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth' => 3
            )); ?>
        </nav>
    <?php } */ ?>

    <div class="container js-container">

        <div class="nav-mobile-header">
            <button class="hamburger js-hamburger navi-main-menu-activator" type="button" tabindex="0">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
            <div class="logo">
	            <?php if ( has_custom_logo() ) {
		            the_custom_logo();
	            } else {
		            $lang = 'en';
		            $path = get_template_directory_uri() . '/assets/img/lang';
		            $file = $path . '/logo-header-en.svg';

		            if ( function_exists( 'pll_current_language' ) ) {
			            $lang = pll_current_language( 'slug' );
			            $file = $path . '/logo-header-' . pll_current_language( 'slug' ) . '.svg';
		            }

		            $img  = sprintf( '<img class="logo-img logo-img-%s" src="%s" alt="%s">', $lang, esc_url( $file ), get_bloginfo( 'name' ) );
		            $link = sprintf( '<a class="logo-link" href="%s">%s</a>', esc_url( home_url( '/' ) ), $img );
		            $span = sprintf( '<span class="logo-link">%s</span>', $img );

		            echo is_front_page() ? $span : $link;
	            } ?>
            </div>
        </div>
