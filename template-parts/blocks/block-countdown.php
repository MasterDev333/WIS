<?php
$id = 'section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$className = 'section section-cta';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$image = get_field('image');
$button = get_field('button');
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-4">
        <div class="section-header">
          <?= get_field('content'); ?>
          <div class="buttons-wrapper">
            <div class="btn-item">
              <a class="btn btn-primary" href="<?= $button['url']; ?>" target="<?= $button['target']; ?>"><?= $button['title']; ?></a>
            </div>
          </div>
        </div>
        
      </div>
      <div class="col-12 col-sm-4 col-lg">
        <div class="section-thumbnail">
          <img src="<?= $image['url']; ?>" alt="<?= $image['title']; ?>" />
        </div>
      </div>
      <div class="col-12 col-sm-4 col-lg-auto">
        <div class="section-countdown">
          <div class="date"><?= date('F j, Y', strtotime(get_field('countdown'))); ?></div>
          <div class="countdown"></div>
        </div>
      </div>
    </div>
  </div>
  <script>
    (function ($) {
      $(window).load(function(e){
        $('.countdown').countdown({
          until: new Date("<?= get_field('countdown') ?>"), 
          layout: `
            <div class="item"><span>{sn}</span> {sl}</div>
            <div class="item"><span>{mn}</span> {ml}</div>
            <div class="item"><span>{hn}</span> {hl}</div>
            <div class="item"><span>{dn}</span> {dl}</div>`
        });
      })
      
    })(jQuery);
  </script>
</div>