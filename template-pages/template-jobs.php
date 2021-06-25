<?php 
  /*
  * Template name: Jobs page
  */
  get_header( 'auth' );
?>
<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">
    <section class="section">
		<div class="container">
			<div class="section-header">
				<?php if ($title = get_field('title')) : ?>
					<h3><?php echo $title; ?></h3>
				<?php endif; ?>
				<?php if ($video = get_field('video')) : ?>
					<div class='embed-container'><?php echo $video; ?></div>
				<?php endif; ?>
				<?php if ($text = get_field('text')) : ?>
					<div class="job-description"><?php echo $text; ?></div>
				<?php endif; ?>
				<?php if ($tab_heading = get_field('tab_heading')) : ?>
					<h3><?php echo $tab_heading; ?></h3>
				<?php endif; ?>
				<div class="tab">
					<div class="tab-links">
						<a href="#on_field" class="tab-link">Jobs on the field</a>
						<a href="#off_field" class="tab-link">Jobs off the field</a>
					</div>
					<div class="tab-contents">
						<div class="tab-content" id="on_field">
							<div class="texts">
								<p>Everything from coaches and professional playing opportunities, to physical trainers and field marshall positions at the youth level up through the professional level. Discover your next role on the field.</p>
								<a class="btn-ajax-jobs" data-category="on">Find your next job on the field</a>
							</div>
							<div class="image">
								<img src="<?php echo get_template_directory_uri() . '/assets/img/jobs_on_the_field.png'; ?>" alt="" />
							</div>
						</div>
						<div class="tab-content" id="off_field">
							<div class="texts">
								<p>Everything from accountants and financial managers, to player agents and brand ambassadors at the youth level up through the professional level. Discover your next role OFF the field.</p>
								<a class="btn-ajax-jobs" data-category="off">Find your next job off the field</a>
							</div>
							<div class="image">
								<img src="<?php echo get_template_directory_uri() . '/assets/img/jobs_off_the_field.png'; ?>" alt="" />
							</div>
						</div>
					</div>
				</div>
			</div>		
			
			<?php 
			$args = array(
				'post_type' 		=> 'job',
				'post_status' 		=> 'publish',
				'posts_per_page' 	=> -1,
			);
			$query = new WP_Query($args);
			if ($query->have_posts()) : 
			?>
			<div class="jobs-box" id="jobs_box">
				<h3 class="jobs-box-title">Jobs on the field</h3>
				<?php while ($query->have_posts()) : $query->the_post(); 
					$id = get_the_ID(); ?>
					<div class="job-item">
						<a href="<?php the_field('link', $id); ?>" target="_blank" data-type="<?php echo get_field('type', $id) ? get_field('type', $id) : 'on'; ?>">
							<div class="job-organization"><?php the_field('organization', $id); ?></div>
							<div class="job-name"><?php echo get_the_title(); ?></div>
							<div class="job-get">Get it!</div>
						</a>
					</div>
				<?php endwhile; ?>
 			</div>
			<?php endif; 
			wp_reset_postdata(); ?>
		</div>
	</section>
  </main>
</div>
<?php
  get_footer( 'auth' );
?>