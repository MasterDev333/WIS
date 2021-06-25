<?php 
/**
 * Template name: Fullpage
 */
if ( is_user_logged_in() ) {
  get_header( '' );
} else {
  get_header();
}
?>
<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">
    <?php  
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();
          get_template_part( 'template-parts/content', 'fullpage' );
        endwhile;
      endif; 
    ?>
  </main>
</div>
<?php get_footer(''); ?>