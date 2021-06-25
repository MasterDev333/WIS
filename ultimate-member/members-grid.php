<?php if ( ! defined( 'ABSPATH' ) ) exit;
$unique_hash = substr( md5( $args['form_id'] ), 10, 5 ); ?>
<script type="text/template" id="tmpl-um-member-grid-<?php echo esc_attr( $unique_hash ) ?>">
	<div class="playercard-grid">

		<# if ( data.length > 0 ) {  #>
			<# _.each( data, function( user, key, list ) { console.log(user);  #>
				<div id="um-member-{{{user.card_anchor}}}-<?php echo esc_attr( $unique_hash ) ?>" class="playercard-item um-role-{{{user.role}}} {{{user.account_status}}}">
					<div class="playercard-overlay">
						<div class="playercard">
							<div class="playercard-front">
								<div class="card-body">
									<# if ( typeof user['first_name'] !== 'undefined' ) { #>
										<div class="card-name">
											{{{user['first_name']}}}
										</div>
									<# } #>
									<div class="card-image">
										{{{user.avatar}}}
									</div>
									<div class="card-content">
										<div class="card-table">
											<div class='table-item'>
												<div class="key">Soccer Connection</div>
												<div class="value">
													<# if ( typeof user['how_connected'] !== 'undefined' ) { #>
														{{{user['how_connected']}}}
													<# } #>
												</div>
											</div>
											<div class='table-item'>
												<div class="key">Field</div>
												<div class="value">
													<# if ( typeof user['work_field'] !== 'undefined' ) { #>
														{{{user['work_field']}}}
													<# } #>
												</div>
											</div>
											<div class='table-item'>
												<div class="key">I am here for</div>
												<div class="value">
													<# if ( typeof user['ask_community'] !== 'undefined' ) { #>
														{{{user['ask_community']}}}
													<# } #>
												</div>
											</div>
											<div class='table-item'>
												<div class="key">I can give WIS</div>
												<div class="value">
													<# if ( typeof user['support_community'] !== 'undefined' ) { #>
														{{{user['support_community']}}}
													<# } #>
												</div>
											</div>
											<div class='table-item last'>
												<div class="key">Favorite team</div>
												<div class="value">
													<# if ( typeof user['favorite_team'] !== 'undefined' ) { #>
														{{{user['favorite_team']}}}
													<# } #>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class='card-footer'>
									<div class="gender">{{{user['pronouns']}}}</div>
									<# if(typeof user['visibility'] !== 'undefined' && user['visibility'].includes('Location')){ #>
									<div class="location"><span>{{{user['city']}}} , {{{user['state']}}}</span></div>
									<# } #>
								</div>
								<div class='card-sign'>
									<# if ( user['role'] === 'um_community' ) { #>
										<img src='<?= get_template_directory_uri(); ?>/assets/img/sign-community.svg' />
									<# } #>
									<# if ( user['role'] === 'um_expert' ) { #>
										<img src='<?= get_template_directory_uri(); ?>/assets/img/sign-expert.svg' />
									<# } #>
									<# if ( user['role'] === 'um_ally' ) { #>
										<img src='<?= get_template_directory_uri(); ?>/assets/img/sign-ally.svg' />
									<# } #>
									<# if ( user['role'] === 'um_partner' ) { #>
										<img src='<?= get_template_directory_uri(); ?>/assets/img/sign-partner.svg' />
									<# } #>
								</div>
								<div class="badge">
									<# if ( user['role'] === 'um_community' ) { #>
										<img src='<?= get_template_directory_uri(); ?>/assets/img/WIS_COMMUNITYMEMBER.svg' />
									<# } #>
									<# if ( user['role'] === 'um_expert' ) { #>
										<img src='<?= get_template_directory_uri(); ?>/assets/img/WIS_EXPERTMEMBER.svg' />
									<# } #>
									<# if ( user['role'] === 'um_ally' ) { #>
										<img src='<?= get_template_directory_uri(); ?>/assets/img/WIS_ALLY.svg' />
									<# } #>
									<# if ( user['role'] === 'um_partner' ) { #>
										<img src='<?= get_template_directory_uri(); ?>/assets/img/WIS_PARTNER.svg' />
									<# } #>
								</div>
							</div>
							<div class="playercard-back">
								<# if ( typeof user['player_number'] !== 'undefined' ) { #>			
									<div class="card-number">
										{{{user['player_number']}}}
									</div>
								<# } #>
								<div class="card-name-wrapper">
									<div class="card-name">
										{{{user.display_name_html}}}
									</div>
								</div>
								<div class='card-thumbnail'>
									{{{user.avatar}}}
								</div>
								<div class="card-header">
									<?php if ( !um_is_myprofile() ) : ?>
										<div class="card-email">
											<a class="send-player-mail" href="#" data-id="{{{user.id}}}" data-name="{{{user.display_name_html}}}">Send message</a>
										</div>
									<?php endif; ?>
									<div class="card-social">
										{{{user.social_urls}}}
									</div>
								</div>
								<div class="card-body">
									
									<div class="card-content">
										<div class="card-table">
											<# if(typeof user['visibility'] !== 'undefined' && user['visibility'].includes('Birthday')){ #>
											<div class='table-item'>
												<div class="key">Birthdate</div>
												<div class="value">
													<# if ( typeof user['date_of_birth'] !== 'undefined' ) { #>
														{{{ moment(user['date_of_birth'], 'MM/DD/YYYY').format('LL') }}}
													<# } #>
												</div>
											</div>
											<# } #>
											<div class='table-item'>
												<div class="key">Job Title</div>
												<div class="value">
													<# if ( typeof user['job_title'] !== 'undefined' ) { #>
														{{{user['job_title']}}}
													<# } #>
												</div>
											</div>
											<div class='table-item'>
												<div class="key">Company / Organization</div>
												<div class="value">
													<# if ( typeof user['company'] !== 'undefined' ) { #>
														{{{user['company']}}}
													<# } #>
												</div>
											</div>
											<div class='table-item'>
												<div class="key">Current Team / League</div>
												<div class="value">
													<# if ( typeof user['college_team'] !== 'undefined' ) { #>
														{{{user['college_team']}}}
													<# } #>
												</div>
											</div>
											<div class='table-item'>
												<div class="key">Favorite Position</div>
												<div class="value">
													<# if ( typeof user['favorite_position'] !== 'undefined' ) { #>
														{{{user['favorite_position']}}}
													<# } #>
												</div>
											</div>
											<div class='table-item'>
												<div class="key">Favorite team</div>
												<div class="value">
													<# if ( typeof user['favorite_team'] !== 'undefined' ) { #>
														{{{user['favorite_team']}}}
													<# } #>
												</div>
											</div>
											<div class='table-item'>
												<div class="key">I'm inspired by</div>
												<div class="value">
													<# if ( typeof user['inspired_by'] !== 'undefined' ) { #>
														{{{user['inspired_by']}}}
													<# } #>
												</div>
											</div>
											<div class='table-item big'>
												<div class="key">MY FAVORITE SOCCER MEMORY</div>
												<div class="value">
													<# if ( typeof user['favorite_memory'] !== 'undefined' ) { #>
														{{{user['favorite_memory']}}}
													<# } #>
												</div>
											</div>
										</div>
									</div>
									<div class="card-tags">
										<div class="title">Areas of Interests</div>
										<div class="tag-list">
											<# if ( typeof user['areas_interests'] !== 'undefined' ) {
												_.each( user['areas_interests'].split(', '), function( el ) { #>
												<span>{{{ el }}}</span>
											<# }) } #>
										</div>
										<div class="title">Areas of Expertise</div>
										<div class="tag-list">
											<# if ( typeof user['areas_expertise'] !== 'undefined' ) {
												_.each( user['areas_expertise'].split(', '), function( el ) { #>
												<span>{{{ el }}}</span>
											<# }) } #>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="close-btn"></div>
					</div>
				</div>
			<# }); #>
		<# } else { #>
			<div class="um-members-none">
				<p><?php echo $no_users; ?></p>
			</div>
		<# } #>
	</div>
</script>