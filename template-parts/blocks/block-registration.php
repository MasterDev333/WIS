<?php

$id = 'section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$className = 'block block-registration';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if(is_front_page()){
    $className .= ' in-front';
}

$subscription = $_GET['member'];
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <?php if(empty($subscription)): ?>
  <div class="block-title"><?= get_field('title'); ?></div>
  <div class="registration-box">
    <div class="item" data-subscription="community">
      <div class="item-header">Community Member</div>
      <div class="item-content"><?= get_field('description_1'); ?></div>
    </div>
    <div class="item" data-subscription="expert">
      <div class="item-header">Expert Member</div>
      <div class="item-content"><?= get_field('description_2'); ?></div>
    </div>
    <div class="item" data-subscription="ally">
      <div class="item-header">Ally Member</div>
      <div class="item-content"><?= get_field('description_3'); ?></div>
    </div>
    <div class="item" data-subscription="partner">
      <div class="item-header">Partner</div>
      <div class="item-content"><?= get_field('description_4'); ?></div>
    </div>
  </div>
  <div class="registration-btn">
    <a class="btn" href="#">Next</a>
  </div>
  <?php else: ?>
    <?php
      switch($subscription){
        case 'community':
            echo apply_filters( 'the_content', get_field('form_shortcode_1') );
          break;
        case 'expert':
            echo apply_filters( 'the_content', get_field('form_shortcode_2') );
          break;
        case 'ally':
            echo apply_filters( 'the_content', get_field('form_shortcode_3') );
          break;
        case 'partner':
            echo apply_filters( 'the_content', get_field('form_shortcode_4') );
          break;
      }
    ?>
  <?php endif; ?>
</div>