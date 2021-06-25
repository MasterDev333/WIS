<?php
  if ( is_user_logged_in() ) {
    get_header( 'auth' );
  } else {
    get_header();
  }
?>
<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">
    <div class="section">
      <div class="container">
        <div class="section-header">
          <h1 class="section-title">News</h1>
          <a class="close-btn" href="<?= get_post_type_archive_link( 'post' ); ?>"></a>
        </div>
        <?php  
          if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              get_template_part( 'template-parts/content', 'blog' );
            endwhile;
          endif; 
        ?>
      </div>
    </div>
  </main>
</div>
<?php
  if ( is_user_logged_in() ) {
    get_footer( 'auth' );
  } else {
    get_footer();
  }
?>