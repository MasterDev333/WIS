      <footer class="site-footer">
        <div class="container-fluid">
          <div class="copyright">Have something we should be talking about? Email us! <a href="mailto:hello@womeninsoccer.org">hello@womeninsoccer.org</a></div>
          <a class="back-to-top"><img src="<?= get_template_directory_uri(); ?>/assets/img/arrow-up.png" /></a>
        </div>
      </footer>
    </div>
    <div class="modal fade " id="modal-email" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Send message to <span></span></h3>
          </div>
          <div class="modal-body">
            <form id='message-form'>
              <div class="form-group">
                <input type="text" placeholder="Your name*" class="form-control required" name="email-input"/>
              </div>
              <div class="form-group">
                <textarea placeholder="Your message*" class="form-control required" name="message-input"></textarea>
              </div>
              <input type="hidden" name="member-input" />
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn-modal" data-dismiss="modal">Close</button>
            <button type="button" class="btn-modal btn-modal-submit">Send Message</button>
          </div>
        </div>
      </div>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>