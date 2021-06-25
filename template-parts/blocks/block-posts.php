<?php
$id = 'section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$className = 'section section-carousel-posts';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$posts = get_field('posts');
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="posts-box">
    <div class="owl-carousel">
      <?php foreach($posts as $post): setup_postdata($post);?>
        <a class="post-item" href="<?= get_permalink($post->ID) ?>">
          <article <?php post_class(); ?> id="post-<?= $post->ID; ?>">
            <div class="entry-content">
              <h3><?= $post->post_title; ?></h3>
              <?php echo apply_filters( 'the_content', wp_trim_words( $post->post_content, 30 )); ?>
              <div class="post-link">
                <img src="<?= get_template_directory_uri(); ?>/assets/img/arrow.png">
              </div>
            </div>
            <div class="entry-thumbnail  <?php echo get_field('image_type', $post->ID); ?> ">
              <?php echo get_the_post_thumbnail($post->ID, 'large'); ?>
            </div>
          </article>
        </a>
      <?php endforeach; wp_reset_postdata(); ?>
    </div>
  </div>
</div>