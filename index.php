<?php
  if ( is_user_logged_in() ) {
    get_header( 'auth' );
  } else {
    get_header();
  }
?>
  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      <div class="section section-spotlight">
        <div class="container">
          <div class="section-header">
            <h2 class="section-title">community SPOTLIGHTS</h2>
          </div>
          <div class="spotlight-box">
            <div class="owl-carousel">
              <div class="item-card">
                <div class='card-video'>
                  <a class="inner" href="https://youtu.be/yxhgSV7yxtM" target="_blank">
                    <img src="<?= get_template_directory_uri(); ?>/assets/img/WIS_COACH-THE-MOVIE.png" />
                  </a>
                </div>
              </div>

              <div class="item-card">
                <div class="card">
                  <img src="<?= get_template_directory_uri(); ?>/assets/img/COURTNEY.png" />
                </div>
              </div>

              <div class="item-card">
                <div class="card">
                  <img src="<?= get_template_directory_uri(); ?>/assets/img/MAGGIE.png" />
                </div>
              </div>

              <div class="item-card">
                <div class="card">
                  <img src="<?= get_template_directory_uri(); ?>/assets/img/PIP.png" />
                </div>
              </div>
            
              <div class="item-card">
                <div class='card-video'>
                  <a class="inner" href="https://youtu.be/EiyhmgAnW0I" target="_blank">
                    <img src="<?= get_template_directory_uri(); ?>/assets/img/WIS-Talk_Group-520.png" />
                  </a>
                </div>
              </div>

              <div class="item-card">
                <div class="card">
                  <img src="<?= get_template_directory_uri(); ?>/assets/img/RACHEL.png" />
                </div>
              </div>

              <div class="item-card">
                <div class="card">
                  <img src="<?= get_template_directory_uri(); ?>/assets/img/KEIDANE.png" />
                </div>
              </div>

              <div class="item-card">
                <div class="card">
                  <img src="<?= get_template_directory_uri(); ?>/assets/img/YEWANDE.png" />
                </div>
              </div>

              <div class="item-card">
                <div class='card-video'>
                  <a class="inner" href="https://youtu.be/X6DNQ6mzlPg" target="_blank">
                    <img src="<?= get_template_directory_uri(); ?>/assets/img/WIS-Trivia_Group-519.png" />
                  </a>
                </div>
              </div>

              <div class="item-card">
                <div class="card">
                  <img src="<?= get_template_directory_uri(); ?>/assets/img/TRACY.png" />
                </div>
              </div>

              <div class="item-card">
                <div class="card">
                  <img src="<?= get_template_directory_uri(); ?>/assets/img/CARRIE.png" />
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      <div class="section">
        <div class="container">
          <div class="section-header">
            <h1 class="section-title">News</h1>
          </div>
          <?php  
            if ( have_posts() ) :
              while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/content', 'blog' );
              endwhile;
              the_posts_pagination(
                array(
                  'prev_text' => __('<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M9.51692 16.5163L2.00064 9L9.51692 1.48372" stroke="black" stroke-width="2"/>
                  </svg>
                  ','textdomain'),
                  'next_text' => __('<svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M7.51628 1.48372L15.0326 9L7.51628 16.5163" stroke="black" stroke-width="2"/>
                  </svg>', 'textdomain'),
                  'mid_size'  => 2,
                  'end_size'  => 0
                )
              ); 
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