<?php
  if(kdmfi_has_featured_image("featured-image-2", get_the_ID())){
    $class = 'double';
  }
?>
<article <?php post_class($class); ?> id="post-<?php the_ID(); ?>">
  <div class="entry-thumbnail">
    <?php 
      the_post_thumbnail();
      if(kdmfi_has_featured_image("featured-image-2", get_the_ID())){
        kdmfi_the_featured_image( "featured-image-2", "full"); 
      }
    ?>
  </div>
  <div class="entry-content">
    <div class="left-side">
      <?php if(is_single()): ?>
        <h2 class="entry-title"><?php the_title(); ?></h2>
      <?php else: ?>
        <h2 class="entry-title">
          <a href="<?= get_permalink(); ?>">
            <?php the_title(); ?>
          </a>
        </h2>
      <?php endif; ?>
      <div class="entry-author"><?= get_the_author(''); ?></div>
      <div class="entry-date"><?= get_the_date(''); ?></div>
    </div>
    <div class="right-side">
      <?php if(is_single()): ?>
        <?php the_content(); ?>
      <?php else: ?>
        <?php the_excerpt(); ?>
      <?php endif; ?>
      
      <div class="share">
        Share article 
        <?php echo do_shortcode('[Sassy_Social_Share]'); ?>
      </div>
      <?php comments_template(); ?> 
    </div>
  </div>
</article>