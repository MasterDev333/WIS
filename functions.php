<?php 
function theme_setup () {

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'customize-selective-refresh-widgets' );

    register_nav_menus( array(
        'primary' => esc_html__( 'Primary navigation', 'wis' ),
        'portal'  => esc_html__( 'Portal navigation', 'wis' ),
    ) );

    add_theme_support( 'disable-custom-colors' );
    add_theme_support( 'disable-custom-font-sizes' );
    add_theme_support( 'responsive-embeds' );

    require_once get_template_directory() . '/includes/blocks.php';
    require_once get_template_directory() . '/includes/login.php';

    if( function_exists('acf_add_options_page') ) {
      acf_add_options_page(array(
        'page_title' 	=> 'Theme Settings',
        'menu_title'	=> 'Theme Settings',
        'menu_slug' 	=> 'theme-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
      ));
    }
}
add_action( 'after_setup_theme', 'theme_setup' );

function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function theme_register_styles() {
  global $wp_query;
  $theme_version = wp_get_theme()->get( 'Version' );
  wp_enqueue_style( 'fullpage-style',get_template_directory_uri() . "/assets/css/fullpage.min.css", array(), $theme_version );
  wp_enqueue_style( 'splash-style',get_template_directory_uri() . "/assets/css/splash.css", array(), $theme_version );
  wp_enqueue_style( 'theme-style',get_template_directory_uri() . "/assets/css/main.css", array(), $theme_version );
  
  wp_enqueue_script( 'vendor-js', get_template_directory_uri() . '/assets/js/vendor.min.js', array('jquery'), $theme_version, true );
  wp_enqueue_script( 'fullpage-js', get_template_directory_uri() . '/assets/js/fullpage.min.js', array('jquery'), $theme_version, true );
  wp_enqueue_script( 'lottie-js', 'https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.3/lottie.min.js', array('jquery'), $theme_version, true );
  wp_enqueue_script('imask-js', 'https://unpkg.com/imask', array(), $theme_version, true);
  wp_enqueue_script( 'splash-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), $theme_version, true );
  wp_enqueue_script( 'theme-js', get_template_directory_uri() . '/assets/js/custom.min.js', array('jquery', 'wp-util'), $theme_version, true ); 

  $data = array(
    'url' => get_template_directory_uri(),
    'ajaxurl' => admin_url('admin-ajax.php'),
    'nonce' => wp_create_nonce('wis_nonce'),
  );
  wp_scripts()->add_data(
    'theme-js',
    'data',
    sprintf('const wis_data = %s;', wp_json_encode($data))
  );  
}
add_action( 'wp_enqueue_scripts', 'theme_register_styles' );

function register_types(){

  $labels = array(
    'name'               => __('Player cards', 'wis'),
    'singular_name'      => __('Player card', 'wis'),
    'add_new'            => __('Add new', 'wis'),
    'add_new_item'       => __('Add new card', 'wis'),
    'edit_item'          => __('Edit card', 'wis'),
    'new_item'           => __('New card', 'wis'),
    'view_item'          => __('View card', 'wis'),
    'search_items'       => __('Search cards', 'wis'),
    'not_found'          => __('No cards found.', 'wis'),
    'not_found_in_trash' => __('No cards found in trash', 'wis'),
    'parent_item_colon'  => __('Parent cards', 'wis'),
    'menu_name'          => __('Player cards', 'wis'),
  );

  register_post_type('player', array(
    'label'  				        => null,
    'labels' 				        => $labels,
    'description'         	=> '',
    'public'              	=> true,
    'publicly_queryable'  	=> false,
    'show_ui'             	=> true,
    'show_in_menu'        	=> true,
    'query_var'           	=> true,
    'show_in_rest'     		  => true,
    'capability_type'   	  => 'post',
    'has_archive'         	=> false,
    'hierarchical'        	=> false,
    'supports'            	=> array( 'title','editor','thumbnail' ),
    'menu_icon'   			    => 'dashicons-media-document',
  ) );
}
add_action( 'init', 'register_types', 10 ); 

add_action( 'wp_body_open', 'init_splash' );
function init_splash() {
	if ( is_front_page() ):
    get_template_part( 'template-parts/content', 'splash' );
	endif;
}

function theme_widgets_init() {
  register_sidebar(array(
      'name' => 'Footer 1',
      'id' => 'wis-fw-1',
      'description' => __('Add widgets here to appear in your footer.', 'ctbt'),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widget-title">',
      'after_title' => '</h4>',
  ));
  register_sidebar(array(
      'name' => 'Footer 2',
      'id' => 'wis-fw-2',
      'description' => __('Add widgets here to appear in your footer.', 'ctbt'),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widget-title">',
      'after_title' => '</h4>',
  ));
}
add_action('widgets_init', 'theme_widgets_init');

add_filter('navigation_markup_template', 'post_navigation', 10, 2 );
function post_navigation( $template, $class ){
	return '
    <nav class="navigation %1$s" role="navigation">
      <div class="nav-links">%3$s</div>
    </nav>    
	';
}

function theme_comment($comment, $args, $depth ) {
	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}
  $classes = ' ' . comment_class( empty( $args['has_children'] ) ? '' : 'parent', null, null, false );
  $datetime = get_comment_date('Y-m-d') . " " . get_comment_time('H:i:s')
	?>

  <<?php echo $tag, $classes; ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ): ?>
      <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-avatar">
      <?php
        if ( $args['avatar_size'] != 0 ) {
          echo get_avatar( $comment, $args['avatar_size'] );
        }
      ?>
    </div>
    <div class="comment-entry">
      <div class="comment-meta">
        <div class="meta">
          <?php printf(
            __( '%1$s' ),
            um_user( 'first_name' )
          ); ?>
        </div>
        <span class="sep">·</span>
        <div class="meta">
          <?php printf(
            __( '%1$s' ),
            time_elapsed_string($datetime)
          ); ?>
        </div>
        
      </div>
      <?php comment_text(); ?>
    </div>
    
    <?php if ( 'div' != $args['style'] ) { ?>
  </div>
  <?php }
}

function time_elapsed_string($datetime, $full = false) {
  $now = new DateTime;
  $ago = new DateTime($datetime);
  $diff = $now->diff($ago);

  $diff->w = floor($diff->d / 7);
  $diff->d -= $diff->w * 7;

  $string = array(
      'y' => 'year',
      'm' => 'month',
      'w' => 'week',
      'd' => 'day',
      'h' => 'hour',
      'i' => 'minute',
      's' => 'second',
  );
  foreach ($string as $k => &$v) {
      if ($diff->$k) {
          $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
      } else {
          unset($string[$k]);
      }
  }

  if (!$full) $string = array_slice($string, 0, 1);
  return $string ? implode(', ', $string) . ' ago' : 'just now';
}

add_filter( 'kdmfi_featured_images', function( $featured_images ) {
  $args_1 = array(
    'id' => 'featured-image-2',
    'desc' => 'Your description here.',
    'label_name' => 'Featured Image 2',
    'label_set' => 'Set featured image 2',
    'label_remove' => 'Remove featured image 2',
    'label_use' => 'Set featured image 2',
    'post_type' => array( 'page', 'post' ),
  );

  $featured_images[] = $args_1;

  return $featured_images;
});
remove_action( 'um_profile_header', 'um_profile_header', 9 );
add_action( 'um_profile_header', 'wis_profile_header', 9 );

function wis_profile_header( $args ) {
	$classes = null;
	if ( ! $args['cover_enabled'] ) {
		$classes .= ' no-cover';
	}
	$default_size = str_replace( 'px', '', $args['photosize'] );
	$disable_photo_uploader = empty( $args['use_custom_settings'] ) ? UM()->options()->get( 'disable_profile_photo_upload' ) : $args['disable_photo_upload'];
	if ( ! empty( $disable_photo_uploader ) ) {
		$args['disable_photo_upload'] = 1;
		$overlay = '';
	} else {
		$overlay = '<span class="um-profile-photo-overlay">
			<span class="um-profile-photo-overlay-s">
				<ins>
					<i class="um-faicon-camera"></i>
				</ins>
			</span>
		</span>';
	} ?>
	<div class="um-header<?php echo esc_attr( $classes ); ?>">
		<div class="um-profile-photo" data-user_id="<?php echo esc_attr( um_profile_id() ); ?>">
			<a href="<?php echo esc_url( um_user_profile_url() ); ?>" class="um-profile-photo-img" title="<?php echo esc_attr( um_user( 'display_name' ) ); ?>">
				<?php if ( ! $default_size || $default_size == 'original' ) {
					$profile_photo = UM()->uploader()->get_upload_base_url() . um_user( 'ID' ) . "/" . um_profile( 'profile_photo' );
					$data = um_get_user_avatar_data( um_user( 'ID' ) );
					echo $overlay . sprintf( '<img src="%s" class="%s" alt="%s" data-default="%s" onerror="%s" />',
						esc_url( $profile_photo ),
						esc_attr( $data['class'] ),
						esc_attr( $data['alt'] ),
						esc_attr( $data['default'] ),
						'if ( ! this.getAttribute(\'data-load-error\') ){ this.setAttribute(\'data-load-error\', \'1\');this.setAttribute(\'src\', this.getAttribute(\'data-default\'));}'
					);
				} else {
					echo $overlay . get_avatar( um_user( 'ID' ), $default_size );
				} ?>
			</a>
			<?php if ( empty( $disable_photo_uploader ) && empty( UM()->user()->cannot_edit ) ) {
				UM()->fields()->add_hidden_field( 'profile_photo' );
				if ( ! um_profile( 'profile_photo' ) ) { // has profile photo
					$items = array(
						'<a href="javascript:void(0);" class="um-manual-trigger" data-parent=".um-profile-photo" data-child=".um-btn-auto-width">' . __( 'Upload photo', 'ultimate-member' ) . '</a>',
						'<a href="javascript:void(0);" class="um-dropdown-hide">' . __( 'Cancel', 'ultimate-member' ) . '</a>',
					);
					$items = apply_filters( 'um_user_photo_menu_view', $items );
					UM()->profile()->new_ui( 'bc', 'div.um-profile-photo', 'click', $items );
				} elseif ( UM()->fields()->editing == true ) {
					$items = array(
						'<a href="javascript:void(0);" class="um-manual-trigger" data-parent=".um-profile-photo" data-child=".um-btn-auto-width">' . __( 'Change photo', 'ultimate-member' ) . '</a>',
						'<a href="javascript:void(0);" class="um-dropdown-hide">' . __( 'Cancel', 'ultimate-member' ) . '</a>',
					);
					$items = apply_filters( 'um_user_photo_menu_edit', $items );
					UM()->profile()->new_ui( 'bc', 'div.um-profile-photo', 'click', $items );
				}
			} ?>
		</div>
		<?php if ( UM()->fields()->is_error( 'profile_photo' ) ) {
			echo UM()->fields()->field_error( UM()->fields()->show_error( 'profile_photo' ), 'force_show' );
		} ?>
	</div>
	<?php
}

add_action( 'wp_ajax_send_message',        'send_message' );
add_action( 'wp_ajax_nopriv_send_message', 'send_message' );
function send_message() {
  if (!check_ajax_referer('wis_nonce', 'nonce', false)) {
    status_header(400);
    wp_send_json_error('bad_nonce');
  } elseif ('POST' !== $_SERVER['REQUEST_METHOD']) {
    status_header(405);
    wp_send_json_error('bad_method');
  }

  $name = $_POST['name'];
  $message = $_POST['message'];
  $member = $_POST['member'];

  $memberinfo = get_userdata($member);
  $sender = um_user_profile_url();
  $email = $memberinfo->user_email;

  $headers = 'MIME-Version: 1.0\n';
  $headers .= 'Content-type: text/html\n';

  $template= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta  name="viewport" content="width=display-width, initial-scale=1.0, maximum-scale=1.0," />
      <meta name="x-apple-disable-message-reformatting">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta content="telephone=no" name="format-detection">
      <title>WIS message</title>
    </head>
    <body style="background: #f2f2f2;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale; margin: 0; padding: 0;">
      <div style="max-width: 560px;padding: 20px;background: #ffffff;border-radius: 5px;margin:40px auto;font-family: Open Sans,Helvetica,Arial;font-size: 15px;color: #666;">
        <div style="color: #444444;font-weight: normal;">
          <div style="text-align: center;font-weight:600;font-size:26px;padding: 10px 0;border-bottom: solid 3px #eeeeee;">Women in Soccer</div>			
          <div style="clear:both"></div>
        </div>
        <div style="padding: 0 30px 30px 30px;border-bottom: 3px solid #eeeeee;">
          <div style="padding: 30px 0;font-size: 24px;text-align: center;line-height: 40px;">Member {name} sent you a request to connect!</span></div>
          <div style="padding: 0 0 30px;font-size: 16px;text-align: center;line-height: 22px;">{message}!</span></div>
          <div style="padding: 10px 0 50px 0;text-align: center;"><a href="{user_url}" style="background: #555555;color: #fff;padding: 12px 30px;text-decoration: none;border-radius: 3px;letter-spacing: 0.3px;">Reply</a></div>
          <div style="padding:20px;">If you have any problems, please contact us at <a href="mailto:hello@womeninsoccer.org" style="color: #3ba1da;text-decoration: none">hello@womeninsoccer.org</a></div>
        </div>
        <div style="color: #999;padding: 20px 30px">
          <div style="">Thank you!</div>
          <div style="">The <a href="http://womeninsoccer.org/" style="color: #3ba1da;text-decoration: none;">Women in Soccer</a> Team</div>
        </div>
      </div>
    </body>
  </html>';
  $template = str_replace('{name}', $name, $template);
  $template = str_replace('{message}', $message, $template);
  $template = str_replace('{user_url}', $sender, $template);
  if(wp_mail($email, $name ." sent you a message!", $template, $headers)){
    $success = 'sent';
  }else{
    $success = 'notsent';
  }

  wp_send_json_success( $success );
}

// Show custom acf metabox on posts
add_filter('acf/settings/remove_wp_meta_box', '__return_false');