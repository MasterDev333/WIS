<?php
  if ( is_ultimatemember() ) {
    get_header( 'auth' );
  } else {
    get_header();
  }
?>
<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">
    <?php  
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();
          get_template_part( 'template-parts/content', get_post_type() );
        endwhile;
      endif; 
    ?>
  </main>
</div>
<?php
  if ( is_ultimatemember() ) {
    get_footer( 'auth' );
  } else {
    get_footer();
  }
?>
