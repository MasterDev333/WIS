<?php 
  /*
  * Template name: Registration
  */
  if ( is_user_logged_in() ) {
    get_header( '' );
  } else {
    get_header();
  }
?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
      <div class="container">
        <div class="entry-header">
          <?php the_title('<h1 class="entry-title">','</h1>'); ?>
        </div>
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
      </div>
    </article>
    <?php endwhile; endif; ?>
  </main>
</div>

<?php
  if ( is_user_logged_in() ) {
    get_footer( '' );
  } else {
    get_footer();
  }
?>