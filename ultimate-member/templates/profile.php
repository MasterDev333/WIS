<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<div class="um <?php echo esc_attr( $this->get_class( $mode ) ); ?> um-<?php echo esc_attr( $form_id ); ?> um-role-<?php echo esc_attr( um_user( 'role' ) ); ?> ">
	<div class="um-form" data-mode="<?php echo esc_attr( $mode ) ?>">
		<div class="container">
		<?php if(!$_GET['um_action']): do_action( 'um_profile_menu', $args );?>
			<?php $user = get_user_meta( um_profile_id(), 'submitted', true ); $v = get_user_meta( um_profile_id(), 'visibility', true ); ?>
			<div class="playercard-item opened">
				<div class="playercard-overlay">
					<div class="top-nav">
						<?php if ( !um_is_on_edit_profile() && um_is_myprofile() ) : ?>
							<a class="edit-btn" href="<?php echo home_url( "/user/" . um_user('um_user_profile_url_slug_name_dash'). "/?um_action=edit"); ?>">Edit</a>
						<?php endif; ?>
						<a href="/community" class="back-btn"></a>
					</div>
					<div class="playercard">
						<div class="playercard-front">
							<div class="card-body">
								<div class="card-name"><?= get_user_meta( um_profile_id(), 'first_name', true ); ?></div>
								<div class="card-image">
									<?php echo get_avatar(um_profile_id()); ?>
								</div>
								<div class="card-content">
									<div class="card-table">
										<div class='table-item'>
											<div class="key">Soccer Connection</div>
											<div class="value"><?= get_user_meta( um_profile_id(), 'how_connected', true ); ?></div>
										</div>
										<div class='table-item'>
											<div class="key">Field</div>
											<div class="value"><?= get_user_meta( um_profile_id(), 'work_field', true ); ?></div>
										</div>
										<div class='table-item'>
											<div class="key">I am here for</div>
											<div class="value"><?= get_user_meta( um_profile_id(), 'ask_community', true ); ?></div>
										</div>
										<div class='table-item'>
											<div class="key">I can give WIS</div>
											<div class="value"><?= get_user_meta( um_profile_id(), 'support_community', true ); ?></div>
										</div>
										<div class='table-item last'>
											<div class="key">Favorite team</div>
											<div class="value"><?= get_user_meta( um_profile_id(), 'favorite_team', true ); ?></div>
										</div>
									</div>
								</div>
							</div>
							<div class='card-footer'>
								<div class="gender"><?= $user['pronouns'] ?></div>
								<?php if(in_array("Location", $v)): ?>
									<div class="location"><span><?= get_user_meta( um_profile_id(), 'city', true ) . ", " . get_user_meta( um_profile_id(), 'state', true ); ?></span></div>
								<?php endif; ?>
							</div>
							<div class='card-sign'>
								<?php if( um_user( 'role' ) === 'um_community' ): ?>
									<img src='<?= get_template_directory_uri(); ?>/assets/img/sign-community.svg' />
								<?php elseif( um_user( 'role' ) === 'um_expert' ): ?>
									<img src='<?= get_template_directory_uri(); ?>/assets/img/sign-expert.svg' />
								<?php elseif( um_user( 'role' ) === 'um_ally' ): ?>
									<img src='<?= get_template_directory_uri(); ?>/assets/img/sign-ally.svg' />
								<?php elseif( um_user( 'role' ) === 'um_partner' ): ?>
									<img src='<?= get_template_directory_uri(); ?>/assets/img/sign-partner.svg' />
								<?php endif; ?>
							</div>
							<div class="badge">
								<?php if( um_user( 'role' ) === 'um_community' ): ?>
									<img src='<?= get_template_directory_uri(); ?>/assets/img/WIS_COMMUNITYMEMBER.svg' />
								<?php elseif( um_user( 'role' ) === 'um_expert' ): ?>
									<img src='<?= get_template_directory_uri(); ?>/assets/img/WIS_EXPERTMEMBER.svg' />
								<?php elseif( um_user( 'role' ) === 'um_ally' ): ?>
									<img src='<?= get_template_directory_uri(); ?>/assets/img/WIS_ALLY.svg' />
								<?php elseif( um_user( 'role' ) === 'um_partner' ): ?>
									<img src='<?= get_template_directory_uri(); ?>/assets/img/WIS_PARTNER.svg' />
								<?php endif; ?>
							</div>
						</div>
						<div class="playercard-back">
							<?php if(!empty($user['player_number'])): ?>
								<div class="card-number">
									<?= get_user_meta( um_profile_id(), 'player_number', true ); ?>
								</div>
							<?php endif; ?>
							<div class="card-name-wrapper">
								<div class="card-name">
									<?= get_user_meta( um_profile_id(), 'first_name', true ); ?>
								</div>
							</div>
							<div class='card-thumbnail'>
								<?php echo get_avatar(um_profile_id()); ?>
							</div>
							<div class="card-header">
								<?php  if ( !um_is_myprofile() ) : ?>
									<div class="card-email">
										<a class="send-player-mail" href="#" data-id="<?= um_profile_id() ?>" data-name="<?= get_user_meta( um_profile_id(), 'first_name', true ); ?>">Send message</a>
									</div>
								<?php endif; ?>
								<div class="card-social">
									<?php if(!empty(get_user_meta( um_profile_id(), 'facebook', true ))): ?>
										<a href="<?= get_user_meta( um_profile_id(), 'facebook', true ) ?>" target="_blank" class="um-tip-n" original-title="Facebook"><i class="um-faicon-facebook"></i></a>
									<?php endif; ?>
									<?php if(!empty(get_user_meta( um_profile_id(), 'twitter', true ))): ?>
										<a href="<?= get_user_meta( um_profile_id(), 'twitter', true ) ?>" target="_blank" class="um-tip-n" original-title="Twitter"><i class="um-faicon-twitter"></i></a>
									<?php endif; ?>
									<?php if(!empty(get_user_meta( um_profile_id(), 'linkedin', true ))): ?>
										<a href="<?= get_user_meta( um_profile_id(), 'linkedin', true ) ?>" target="_blank" class="um-tip-n" original-title="LinkedIn"><i class="um-faicon-linkedin"></i></a>
									<?php endif; ?>
									<?php if(!empty(get_user_meta( um_profile_id(), 'instagram', true ))): ?>
										<a href="<?= get_user_meta( um_profile_id(), 'instagram', true ) ?>" target="_blank" class="um-tip-n" original-title="Instagram"><i class="um-faicon-instagram"></i></a>
									<?php endif; ?>
								</div>
							</div>
							<div class="card-body">
								<div class="card-content">
									<div class="card-table">
										<?php if(in_array("Birthday", $v)): ?>
											<div class='table-item'>
												<div class="key">Birthdate</div>
												<div class="value">
													<?= get_user_meta( um_profile_id(), 'date_of_birth', true ) ?>
												</div>
											</div>
										<?php endif; ?>
										<div class='table-item'>
											<div class="key">Job Title</div>
											<div class="value">
												<?= get_user_meta( um_profile_id(), 'job_title', true ) ?>
											</div>
										</div>
										<div class='table-item'>
											<div class="key">Company / Organization</div>
											<div class="value">
												<?= get_user_meta( um_profile_id(), 'company', true ) ?>
											</div>
										</div>
										<div class='table-item'>
											<div class="key">Current Team / League</div>
											<div class="value">
												<?= get_user_meta( um_profile_id(), 'college_team', true ) ?>
											</div>
										</div>
										<div class='table-item'>
											<div class="key">Favorite Position</div>
											<div class="value">
												<?= get_user_meta( um_profile_id(), 'favorite_position', true ) ?>
											</div>
										</div>
										<div class='table-item'>
											<div class="key">Favorite team</div>
											<div class="value">
												<?= get_user_meta( um_profile_id(), 'favorite_team', true ) ?>
											</div>
										</div>
										<div class='table-item'>
											<div class="key">I'm inspired by</div>
											<div class="value">
												<?= get_user_meta( um_profile_id(), 'inspired_by', true ) ?>
											</div>
										</div>
										<div class='table-item big'>
											<div class="key">MY FAVORITE SOCCER MEMORY</div>
											<div class="value">
												<?= get_user_meta( um_profile_id(), 'favorite_memory', true ) ?>
											</div>
										</div>
									</div>
								</div>
								<div class="card-tags">
									<div class="title">Areas of Interests</div>
									<div class="tag-list">
										<?php foreach(get_user_meta(um_profile_id(), 'areas_interests', true) as $el): ?>
										<span><?= $el ?></span>
										<?php endforeach; ?>
									</div>
									<div class="title">Areas of Expertise</div>
									<div class="tag-list">
										<?php foreach(get_user_meta(um_profile_id(), 'areas_expertise', true) as $el): ?>
										<span><?= $el ?></span>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php else: ?>
				<?php if ( um_is_on_edit_profile() || UM()->user()->preview ) : ?>
					<div class="top-nav">
						<a class="edit-btn" href="<?php echo home_url( "/user/" . um_user('um_user_profile_url_slug_name_dash')); ?>">Cancel</a>
					</div>
					<form method="post" action="">
						<?php
								do_action( 'um_profile_header', $args );
								$nav = 'main';
								$subnav = UM()->profile()->active_subnav();
								$subnav = ! empty( $subnav ) ? $subnav : 'default'; 
						?>
						<div class="um-profile-body <?php echo esc_attr( $nav . ' ' . $nav . '-' . $subnav ); ?>">
							<?php do_action("um_profile_content_{$nav}", $args);
							do_action( "um_profile_content_{$nav}_{$subnav}", $args ); ?>
							<div class="clear"></div>
						</div>
					</form>
				<?php endif; ?>
				<?php do_action( 'um_profile_footer', $args ); ?>
			<?php endif; ?>
		</div>
	</div>
</div>