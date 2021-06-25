<?php
$id = 'section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$className = 'section section-spotlight';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title"><?= get_field('title'); ?></h2>
    </div>
  </div>
  <div class="spotlight-box">
    <div class="owl-carousel">
      <div class="item-card">
        <div class='card-video'>
          <a class="inner" href="https://youtu.be/yxhgSV7yxtM" target="_blank">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/WIS_COACH-THE-MOVIE.png" />
          </a>
        </div>
      </div>

      <div class="item-card">
        <div class="card">
          <img src="<?= get_template_directory_uri(); ?>/assets/img/COURTNEY.png" />
        </div>
      </div>

      <div class="item-card">
        <div class="card">
          <img src="<?= get_template_directory_uri(); ?>/assets/img/MAGGIE.png" />
        </div>
      </div>

      <div class="item-card">
        <div class="card">
          <img src="<?= get_template_directory_uri(); ?>/assets/img/PIP.png" />
        </div>
      </div>
    
      <div class="item-card">
        <div class='card-video'>
          <a class="inner" href="https://youtu.be/EiyhmgAnW0I" target="_blank">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/WIS-Talk_Group-520.png" />
          </a>
        </div>
      </div>

      <div class="item-card">
        <div class="card">
          <img src="<?= get_template_directory_uri(); ?>/assets/img/RACHEL.png" />
        </div>
      </div>

      <div class="item-card">
        <div class="card">
          <img src="<?= get_template_directory_uri(); ?>/assets/img/KEIDANE.png" />
        </div>
      </div>

      <div class="item-card">
        <div class="card">
          <img src="<?= get_template_directory_uri(); ?>/assets/img/YEWANDE.png" />
        </div>
      </div>

      <div class="item-card">
        <div class='card-video'>
          <a class="inner" href="https://youtu.be/X6DNQ6mzlPg" target="_blank">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/WIS-Trivia_Group-519.png" />
          </a>
        </div>
      </div>

      <div class="item-card">
        <div class="card">
          <img src="<?= get_template_directory_uri(); ?>/assets/img/TRACY.png" />
        </div>
      </div>

      <div class="item-card">
        <div class="card">
          <img src="<?= get_template_directory_uri(); ?>/assets/img/CARRIE.png" />
        </div>
      </div>

    </div>
  </div>
</div>