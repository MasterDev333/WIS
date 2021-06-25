<?php
$id = 'section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$className = 'section';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
$tabs = get_field('tabs'); $i = 0;
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title"><?= get_field('title'); ?></h2>
    </div>
    <div class="tabs-box">
        <?php foreach($tabs as $tab): ?>
        <div class="tab-item <?= !$i ? 'active' : '' ?>">
            <div class="tab-header"><?= $tab['title'] ?></div>
            <div class="tab-content"><?= $tab['content'] ?></div>
        </div>
        <?php $i++; endforeach; ?>
    </div>
  </div>
</div>