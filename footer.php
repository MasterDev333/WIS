<?php 
  $social = get_field('social', 'option');
?>
<footer class="site-footer">
  <div class="marquee">
    <ul class="content">
      <?php $i=0; while($i < 10): ?>
      <li class="item">
        <a href="https://www.instagram.com/womeninsoccer/" target="_blank">
          <img src="<?= get_template_directory_uri(); ?>/assets/img/instagram.svg" />
          womeninsoccer
        </a>
      </li>
      <li class="item">
        <a href="https://twitter.com/womeninsoccerus" target="_blank">
          <img src="<?= get_template_directory_uri(); ?>/assets/img/twitter.svg" />
          womeninsoccerus
        </a>
      </li>
      <?php $i++; endwhile; ?>
    </ul>
  </div>

  <div class="footer-widget">
    <div class="container">
      <div class="row">
        <?php if(is_active_sidebar('wis-fw-1')): ?>
        <div class="col-12 col-md-6">
          <?php dynamic_sidebar('wis-fw-1'); ?>
        </div>
        <?php endif; ?>
        <?php if(is_active_sidebar('wis-fw-2')): ?>
        <div class="col-12 col-md-6">
          <?php dynamic_sidebar('wis-fw-2'); ?>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <div class="subscribe-form">
      <div class="left">
        <div class="title">Join <br />Us</div>
      </div>
      <div class="right">
        <div class="title">Sign up for our mailing list to stay up to date on news and events!</div>
        <!-- Begin Mailchimp Signup Form -->
        <div id="mc_embed_signup">
          <form
            action="https://womeninsoccer.us19.list-manage.com/subscribe/post?u=746687fc070fe88cc08746906&amp;id=a6d9792e7e"
            method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate form"
            target="_blank" novalidate>
            <div id="mc_embed_signup_scroll">
              <div class="mc-field-group">
                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email address">
              </div>
              <div id="mce-responses" class="clear">
                <div class="response" id="mce-error-response" style="display:none"></div>
                <div class="response" id="mce-success-response" style="display:none"></div>
              </div>
              <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
              <div style="position: absolute; left: -5000px;" aria-hidden="true">
                <input type="text" name="b_746687fc070fe88cc08746906_a6d9792e7e" tabindex="-1" value="" >
              </div>
              <div class="clear">
                <input type="submit" value="Submit" name="subscribe" id="mc-embedded-subscribe" class="button">
              </div>
            </div>
          </form>
        </div>
        <!--End mc_embed_signup-->
      </div>
    </div>
    <div class="social-area">
      <ul class="social">
        <li>
          <a href="<?= $social['instagram'] ?>" target="_blank">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/instagram-white.svg" class="render-svg" />
          </a>
        </li>
        <li>
          <a href="<?= $social['twitter'] ?>" target="_blank">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/twitter-white.svg" class="render-svg" />
          </a>
        </li>
        <li>
          <a href="<?= $social['facebook'] ?>" target="_blank">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/facebook-white.svg" class="render-svg" />
          </a>
        </li>
        <li>
          <a href="<?= $social['linkedin'] ?>" target="_blank">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/linkedin-white.svg" class="render-svg" />
          </a>
        </li>
      </ul>
      <div class="footer-logo">
        <a href="index.php">
          <img src="<?= get_template_directory_uri(); ?>/assets/img/footer-logo.svg" class="render-svg" />
        </a>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="left"><?= get_field('footer_left', 'option'); ?> </div>
    <div class="right"><?= get_field('footer_right', 'option'); ?></div>
  </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>