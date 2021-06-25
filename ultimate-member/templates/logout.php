<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<div class="um <?php echo esc_attr( $this->get_class( $mode, $args ) ); ?> um-<?php echo esc_attr( $form_id ); ?>">

	<div class="um-form">
        
        <h2 style="text-align:center;">You're already logged in!</h2>

		<div class="um-misc-with-img">

			<div class="um-misc-img">
				<a href="<?php echo esc_url( um_get_core_page( 'user' ) ); ?>">
					<?php echo um_user( 'profile_photo', 160 ); ?>
				</a>
			</div>
					
			<?php
			/**
			 * UM hook
			 *
			 * @type action
			 * @title um_logout_after_user_welcome
			 * @description Some actions on logout form
			 * @input_vars
			 * [{"var":"$args","type":"array","desc":"Logout form shortcode arguments"}]
			 * @change_log
			 * ["Since: 2.0"]
			 * @usage add_action( 'um_logout_after_user_welcome', 'function_name', 10, 1 );
			 * @example
			 * <?php
			 * add_action( 'um_logout_after_user_welcome', 'my_logout_after_user_welcome', 10, 1 );
			 * function my_logout_after_user_welcome( $args ) {
			 *     // your code here
			 * }
			 * ?>
			 */
			do_action( 'um_logout_after_user_welcome', $args ); ?>
			
		</div>
		
        <div class="um-logout-controls">
            <a class="btn btn-primary" href="<?php echo esc_url( um_get_core_page( 'user' ) ); ?>">Go to account</a>
            <a class="link-logout" href="<?php echo esc_url( add_query_arg( 'redirect_to', UM()->permalinks()->get_current_url( true ), um_get_core_page( 'logout' ) ) ); ?>">
                <?php _e( 'Log Out', 'ultimate-member' ); ?>
            </a>
        </div>

		<?php /*<ul class="um-misc-ul">
			
			<?php
			/**
			 * UM hook
			 *
			 * @type action
			 * @title um_logout_user_links
			 * @description Logout user links
			 * @input_vars
			 * [{"var":"$args","type":"array","desc":"Logout form shortcode arguments"}]
			 * @change_log
			 * ["Since: 2.0"]
			 * @usage add_action( 'um_logout_user_links', 'function_name', 10, 1 );
			 * @example
			 * <?php
			 * add_action( 'um_logout_user_links', 'my_logout_user_links', 10, 1 );
			 * function my_logout_user_links( $args ) {
			 *     // your code here
			 * }
			 * ?>
			 
			do_action( 'um_logout_user_links', $args ); ?>
		
		</ul> */ ?>
	</div>
</div>