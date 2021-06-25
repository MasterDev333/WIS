<?php
$id = 'section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$className = 'section section-animation';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
$links = get_field('links');
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class='container'>
    <div class="animation-wrapper">
      <div class="animation-box">
        <div class="animate-icon" id="icon_a"></div>
        <div class="animate-icon" id="icon_b"></div>
        <div class="animate-icon" id="icon_c"></div>
      </div>
      <div class="animation-content">
        <?= get_field('content'); ?>
        <div class="links">
          <?php foreach($links as $link): ?>
            <a href="<?= $link['link']['url']; ?>" target="<?= $link['link']['target']; ?>"><?= $link['link']['title']; ?>
              <span class="arrow">
                <img src="<?= get_template_directory_uri() ?>/assets/img/arrow.png">
              </span>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>