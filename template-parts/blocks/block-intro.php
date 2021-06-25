<?php
$id = 'section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$className = 'section page-header';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
$image = get_field('image');
$buttons = get_field('buttons');
?>
<div class="page-header">
    <div class="container">
        <div class="header-top">
            <div class="header-thumbnail">
                <img src="<?= $image['url']; ?>" alt="Women in Soccer" />
                <div class='p-item-1'>
                    <img src="<?= get_template_directory_uri(); ?>/assets/img/patterns/arrow-1.svg" class='render-svg svg-arrow' />
                    <img src="<?= get_template_directory_uri(); ?>/assets/img/patterns/circle.svg" class='render-svg svg-circle' />
                </div>
                <div class='p-item-2'>
                    <img src="<?= get_template_directory_uri(); ?>/assets/img/patterns/triangle.svg" class='render-svg svg-triangle' />
                    <img src="<?= get_template_directory_uri(); ?>/assets/img/patterns/arrow-2.svg" class='render-svg svg-arrow' />
                </div>
                <div class='p-item-3'>
                    <img src="<?= get_template_directory_uri(); ?>/assets/img/patterns/triangle.svg" class='render-svg svg-triangle' />
                    <img src="<?= get_template_directory_uri(); ?>/assets/img/patterns/arrow-3.svg" class='render-svg svg-arrow' />
                </div>
            </div>
            <div class="header-content">
                <div class='p-item-1'>
                    <img src="<?= get_template_directory_uri(); ?>/assets/img/patterns/circle.svg" class='render-svg svg-circle' />
                    <img src="<?= get_template_directory_uri(); ?>/assets/img/patterns/arrow-2.svg" class='render-svg svg-arrow' />
                </div>
                <div class="buttons-wrapper">
                  <?php foreach($buttons as $button): ?>
                    <div class="btn-item">
                        <a class="btn btn-primary" href='<?= $button['button']['url'] ?>'><?= $button['button']['title'] ?></a>
                    </div>
                  <?php endforeach;?>
                </div>
            </div>
        </div>
        <div class="header-info">
            <?= get_field('content'); ?>
        </div>
    </div>
</div>