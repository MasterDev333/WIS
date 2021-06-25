<?php
$id = 'section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$className = 'section full-page-scroller';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
$slides = get_field('slides');
$i=1;
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="section-header">
    <div class="container">
      <h2 class="section-title"><?= get_field('title'); ?></h2>
    </div>
  </div>
  <div class="page-slides-wrapper" id="fullpage">
    <?php foreach($slides as $slide): ?>
      <div class="page-slide section" >
        <div class="container">
          <div class="slide-inner">
            <div class="slide-left">
              <div class="slide-num"><?= "0" . $i . '.' ?></div>
              <h2 class="slide-title"><?= $slide['title']; ?></h2>
              <p><?= $slide['content']; ?></p>
              <?php if(!empty($slide['links'])): ?>
                <div class="links scroll-links">
                  <?php foreach($slide['links'] as $link): ?>
                  <a href="<?= $link['link']['url']; ?>"><?= $link['link']['title']; ?>
                    <span class="arrow">
                      <img src="<?= get_template_directory_uri(); ?>/assets/img/arrow.png">
                    </span>
                  </a>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
              <?php if(!empty($slide['button'])): ?>
                <div class="buttons-wrapper">
                  <div class="btn-item">
                    <a class="btn btn-primary" href="<?= $slide['button']['url']; ?>" target="<?= $slide['button']['target']; ?>"><?= $slide['button']['title']; ?></a>
                  </div>
                </div>
              <?php endif; ?>
            </div>
            <div class="slide-right">
              <div class="image">
                <img src="<?= $slide['image']['url']; ?>" />
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php $i++; endforeach; ?>
  </div>
</div>