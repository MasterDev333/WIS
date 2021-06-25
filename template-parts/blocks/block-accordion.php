<?php
$id = 'section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$className = 'section section-accordion';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="section-header">
    <h2 class="section-title"><?= get_field('title'); ?></h2>
  </div>
  <div class="accordion">

    <div class="accordion-item" id="community-member">
      <?php $image_1 = get_field('image_1'); $link_1 = get_field('link_1'); ?>
      <div class="accordion-item-header"><div class="inner">Community Member</div></div>
      <div class="accordion-item-content">
        <div class="badge">
          <img src="<?= get_template_directory_uri(); ?>/assets/img/WIS_COMMUNITYMEMBER.svg" />
        </div>
        <div class="content">
          <?= get_field('description_1') ?><br/>
          <div class="links">
            <a href="<?= $link_1['url']; ?>"><?= $link_1['title']; ?>
              <span class="arrow">
                <img src="<?= get_template_directory_uri(); ?>/assets/img/arrow.png">
              </span>
            </a>
          </div>
        </div>
      </div>
      <div class="accordion-item-thumbnail">
        
        <img src="<?= $image_1['url']; ?>" alt="<?= $image_1['title']; ?>" />
      </div>
    </div>

    <div class="accordion-item" id="expert-member">
      <?php $image_2 = get_field('image_2'); $link_2 = get_field('link_2'); ?>
      <div class="accordion-item-header"><div class="inner">Expert Member</div></div>
      <div class="accordion-item-content">
        <div class="badge">
          <img src="<?= get_template_directory_uri(); ?>/assets/img/WIS_EXPERTMEMBER.svg" />
        </div>
        <div class="content"><?= get_field('description_2') ?><br/>
          <div class="links">
            <a href="<?= $link_2['url']; ?>"><?= $link_2['title']; ?>
              <span class="arrow">
                <img src="<?= get_template_directory_uri(); ?>/assets/img/arrow.png">
              </span>
            </a>
          </div>
        </div>
      </div>
      <div class="accordion-item-thumbnail">
        <img src="<?= $image_2['url']; ?>" alt="<?= $image_2['title']; ?>" />
      </div>
    </div>

    <div class="accordion-item" id="ally-member">
      <?php $image_3 = get_field('image_3'); $link_3 = get_field('link_3'); ?>
      <div class="accordion-item-header"><div class="inner">Ally Member</div></div>
      <div class="accordion-item-content">
        <div class="badge">
          <img src="<?= get_template_directory_uri(); ?>/assets/img/WIS_ALLY.svg" />
        </div>
        <div class="content"><?= get_field('description_3') ?><br/>
          <div class="links">
            <a href="<?= $link_3['url']; ?>"><?= $link_3['title']; ?>
              <span class="arrow">
                <img src="<?= get_template_directory_uri(); ?>/assets/img/arrow.png">
              </span>
            </a>
          </div>
        </div>
      </div>
      <div class="accordion-item-thumbnail">
        <img src="<?= $image_3['url']; ?>" alt="<?= $image_3['title']; ?>" />
      </div>
    </div>

    <div class="accordion-item" id="partner-member">
      <?php $image_4 = get_field('image_4'); $link_4 = get_field('link_4'); ?>
      <div class="accordion-item-header"><div class="inner">Partner</div></div>
      <div class="accordion-item-content">
        <div class="badge">
          <img src="<?= get_template_directory_uri(); ?>/assets/img/WIS_PARTNER.svg" />
        </div>
        <div class="content"><?= get_field('description_4') ?><br/>
          <div class="links">
            <a href="<?= $link_4['url']; ?>"><?= $link_4['title']; ?>
              <span class="arrow">
                <img src="<?= get_template_directory_uri(); ?>/assets/img/arrow.png">
              </span>
            </a>
          </div>
        </div>
      </div>
      <div class="accordion-item-thumbnail">
        <img src="<?= $image_4['url']; ?>" alt="<?= $image_4['title']; ?>" />
      </div>
    </div>
  </div>
</div>