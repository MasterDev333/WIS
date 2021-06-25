<?php
$id = 'section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$className = 'section section-about';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
$image = get_field('right_column_image');
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="container">
    <div class="sticky-wrapper">
      <div class="sticky-side">
        <div class="sticky-inner">
          <div class="section-header">
            <div class="section-subtitle"><?= get_field('subtitle'); ?></div>
            <h1 class="section-title"><?= get_field('title'); ?></h1>
          </div>
          <div class="section-info"><?= get_field('info_text'); ?></div>
        </div>
      </div>
      <div class="content-side">
        <div class="preview-screen">
          <div class="section-thumbnail">
            <img src="<?= $image['url'] ?>" alt="<?= $image['title'] ?>" />
          </div>
          <a class="scroll-btn" href="#"></a>
        </div>
        <div class="content">
          <?= get_field('right_column_content'); ?>
        </div>
      </div>
    </div>
  </div>
</div>