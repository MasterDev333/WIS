<?php
$id = 'section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$className = 'section section-stacked';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
$image = get_field('right_column_image');
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?= get_field('title') ?></h2>
        </div>
        <div class="stacked-wrapper">
            <div class="stacked-content">
                <p><?= get_field('content'); ?></p>
                <p>
                    <span class="arrow">
                        <img src="<?= get_template_directory_uri(); ?>/assets/img/arrow.png" />
                    </span>
                    Click through to meet our team!</p>
            </div>
            <div class="stacked-cards">
                <ul class="stack">
                    <li class='stack-item'>
                        <div class="card">
                            <img src="<?= get_template_directory_uri(); ?>/assets/img/MAGGIE.png" />
                        </div>
                    </li>
                    <li class='stack-item'>
                        <div class="card">
                            <img src="<?= get_template_directory_uri(); ?>/assets/img/PIP.png" />
                        </div>
                    </li>
                    <li class='stack-item'>
                        <div class="card">
                            <img src="<?= get_template_directory_uri(); ?>/assets/img/RACHEL.png" />
                        </div>
                    </li>
                    <li class='stack-item'>
                        <div class="card">
                            <img src="<?= get_template_directory_uri(); ?>/assets/img/KEIDANE.png" />
                        </div>
                    </li>
                    
                    <li class='stack-item'>
                        <div class="card">
                            <img src="<?= get_template_directory_uri(); ?>/assets/img/YEWANDE.png" />
                        </div>
                    </li>
                    <li class='stack-item'>
                        <div class="card">
                            <img src="<?= get_template_directory_uri(); ?>/assets/img/TRACY.png" />
                        </div>
                    </li>
                    <li class='stack-item'>
                        <div class="card">
                            <img src="<?= get_template_directory_uri(); ?>/assets/img/CARRIE.png" />
                        </div>
                    </li>
                    <li class='stack-item'>
                        <div class="card">
                            <img src="<?= get_template_directory_uri(); ?>/assets/img/COURTNEY.png" />
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>