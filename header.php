<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="profile" href="https://gmpg.org/xfn/11">

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <?php wp_body_open();?> 
        <div id="page" class="site">
          <header class="site-header">
            <div class='header-inner'>
              <button class="navigation-btn">
                <div class="btn-icon"></div>
              </button>
              <a href="<?= get_home_url() ?>" class="header-logo">
                <div class="logo-item item-small" id="logo-item-1">
                  <img src="<?= get_template_directory_uri(); ?>/assets/img/logo/1.svg" class="render-svg"/>
                </div>
                <div class="logo-item item-letter" id="logo-item-2">
                  <img src="<?= get_template_directory_uri(); ?>/assets/img/logo/2.svg"/>
                </div>
                <div class="logo-item" id="logo-item-3">
                  <img src="<?= get_template_directory_uri(); ?>/assets/img/logo/3.svg" class="render-svg"/>
                </div>
                <div class="logo-item" id="logo-item-4">
                  <img src="<?= get_template_directory_uri(); ?>/assets/img/logo/4.svg"/>
                </div>
              </a>
            </div>
            <nav class="site-navigation">
              <div class="marquee marquee-green">
                <ul class="content">
                  <?php $i=0; while($i < 15): ?>
                    <li class="item">The Game, Our Way.</li>
                  <?php $i++; endwhile; ?>
                </ul>
              </div>
              <div class="site-navigation-inner">
                <div class="nav-wrapper">
                  <?php
                    wp_nav_menu(array(
                      'theme_location'=> 'primary',
                      'depth'         => 2,
                      'menu_id'       => false,
                      'container'     => '',
                      'menu_class'    => 'nav',
                    ));
                  ?>
                  <div class="nav-text"><?= get_field('content_nav', 'option'); ?></div>
                </div>
                <div class="nav-thumbnail">
                  <div id="nav_animation" class="nav_animation"></div>
                </div>
              </div>
            </nav>
          </header>