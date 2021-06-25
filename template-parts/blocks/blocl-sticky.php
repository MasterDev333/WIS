<?php
$id = 'section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$className = 'section section-about';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$image = get_field('image');
$button = get_field('button');
?>