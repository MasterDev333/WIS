<?php
  $profile_id = um_profile_id();
?>
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
          <header class="portal-header">
            <div class='header-inner'>
              <a href="https://womeninsoccer.org/community/" class="header-logo">
                <img src="<?= get_template_directory_uri(); ?>/assets/img/footer-logo.svg"/>
              </a>
              <div class="member-name">
                Welcome, <?php echo um_user( 'first_name' ); ?>!
              </div>
              <nav class="portal-navigation">
                <?php
                  wp_nav_menu(array(
                    'theme_location'=> 'portal',
                    'depth'         => 2,
                    'menu_id'       => false,
                    'container'     => '',
                    'menu_class'    => 'nav',
                  ));
                ?>
              </nav>
              <div class="member-profile">
                <a href="<?php echo home_url( "/user/" . um_user('um_user_profile_url_slug_name_dash')); ?>">
                  <?php echo get_avatar(get_current_user_id()); ?>
                </a>
              </div>
            </div>
          </header>