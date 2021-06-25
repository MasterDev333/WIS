<?php 
  /*
  * Template name: Login
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
      <div class="entry-thumbnail">
        <?php the_post_thumbnail('full'); ?>
      </div>
      <div class="entry-content">
        <div class="entry-content-inner">
          <?php the_content(); ?>
        </div>
      </div>
    </article>
    <?php endwhile; endif; ?>
  </main>
</div>

<?php get_footer('empty'); ?>