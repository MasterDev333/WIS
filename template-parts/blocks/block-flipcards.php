<?php
$id = 'section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$className = 'section section-features';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
$cards = get_field('card');
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="container">
    <div class="row">
      <?php foreach($cards as $card): ?>
      <div class="col-12 col-md-4">
        <div class="item-feature">
          <div class="item-title"><?= $card['title']; ?></div>
          <div class="item-flip">
            <div class="item-inner front">
              <img src="<?= $card['image']['url']; ?>" alt="<?= $card['image']['title']; ?>" />
            </div>
            <div class="item-inner back">
              <div class="content"><?= $card['description']; ?></div>
            </div>
          </div>
          <div class="item-info">Tap to read more</div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>