<?
function wis_block_categories ($categories, $post){
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'sections',
                'title' => __( 'Theme blocks', 'wis' ),
                'icon'  => 'star-empty',
            ),
        )
    );
}
add_filter( 'block_categories', 'wis_block_categories', 10, 2 );

function wis_register_blocks() {
    acf_register_block_type(array(
        'name'              => 'section_registration',
        'title'             => __('Registration box'),
        'description'       => __('Theme block with registration options'),
        'render_template'   => 'template-parts/blocks/block-registration.php',
        'category'          => 'sections',
        'icon'              => 'admin-users',
        'keywords'          => array( 'block', 'registration', 'user' ),
        'supports'          => array('align' => false)
    ));
    acf_register_block_type(array(
        'name'              => 'section_intro',
        'title'             => __('Intro section'),
        'description'       => __('Theme block with intro'),
        'render_template'   => 'template-parts/blocks/block-intro.php',
        'category'          => 'sections',
        'icon'              => 'backup',
        'keywords'          => array( 'block', 'intro', 'content' ),
        'supports'          => array('align' => false)
    ));
    acf_register_block_type(array(
        'name'              => 'section_flipcards',
        'title'             => __('Flip cards box'),
        'description'       => __('Theme block with flip cards'),
        'render_template'   => 'template-parts/blocks/block-flipcards.php',
        'category'          => 'sections',
        'icon'              => 'format-gallery',
        'keywords'          => array( 'block', 'flipcard', 'subscription' ),
        'supports'          => array('align' => false)
    ));
    acf_register_block_type(array(
        'name'              => 'section_accordion',
        'title'             => __('Accordion box'),
        'description'       => __('Theme block with accordion options'),
        'render_template'   => 'template-parts/blocks/block-accordion.php',
        'category'          => 'sections',
        'icon'              => 'excerpt-view',
        'keywords'          => array( 'block', 'accordion', 'user', 'subscription' ),
        'supports'          => array('align' => false)
    ));
    acf_register_block_type(array(
        'name'              => 'section_countdown',
        'title'             => __('Section with countdown'),
        'description'       => __('Theme block with countdown'),
        'render_template'   => 'template-parts/blocks/block-countdown.php',
        'category'          => 'sections',
        'icon'              => 'backup',
        'keywords'          => array( 'block', 'countdown', 'content' ),
        'supports'          => array('align' => false)
    ));
    acf_register_block_type(array(
        'name'              => 'section_sticky',
        'title'             => __('Section with sticky content'),
        'description'       => __('Theme block with sticky content'),
        'render_template'   => 'template-parts/blocks/block-sticky.php',
        'category'          => 'sections',
        'icon'              => 'media-interactive',
        'keywords'          => array( 'block', 'sticky', 'content' ),
        'supports'          => array('align' => false)
    ));
    acf_register_block_type(array(
        'name'              => 'section_tabs',
        'title'             => __('Section with tabs'),
        'description'       => __('Theme block with tabbed content'),
        'render_template'   => 'template-parts/blocks/block-tabs.php',
        'category'          => 'sections',
        'icon'              => 'table-row-after',
        'keywords'          => array( 'block', 'tabs', 'content' ),
        'supports'          => array('align' => false)
    ));
    acf_register_block_type(array(
        'name'              => 'section_team',
        'title'             => __('Section with team'),
        'description'       => __('Theme block with team cards'),
        'render_template'   => 'template-parts/blocks/block-team.php',
        'category'          => 'sections',
        'icon'              => 'table-row-after',
        'keywords'          => array( 'block', 'team', 'content' ),
        'supports'          => array('align' => false)
    ));
    acf_register_block_type(array(
        'name'              => 'section_animated',
        'title'             => __('Section with animation box'),
        'description'       => __('Theme block with animation box'),
        'render_template'   => 'template-parts/blocks/block-animated.php',
        'category'          => 'sections',
        'icon'              => 'table-row-after',
        'keywords'          => array( 'block', 'animation', 'content' ),
        'supports'          => array('align' => false)
    ));
    acf_register_block_type(array(
        'name'              => 'section_slides',
        'title'             => __('Section with slides'),
        'description'       => __('Theme block with slides'),
        'render_template'   => 'template-parts/blocks/block-slides.php',
        'category'          => 'sections',
        'icon'              => 'table-row-after',
        'keywords'          => array( 'block', 'animation', 'content' ),
        'supports'          => array('align' => false)
    ));
    acf_register_block_type(array(
        'name'              => 'section_carousel',
        'title'             => __('Section with carousel'),
        'description'       => __('Theme block with carousel'),
        'render_template'   => 'template-parts/blocks/block-carousel.php',
        'category'          => 'sections',
        'icon'              => 'table-row-after',
        'keywords'          => array( 'block', 'animation', 'content' ),
        'supports'          => array('align' => false)
    ));
    acf_register_block_type(array(
        'name'              => 'section_posts',
        'title'             => __('Section with posts'),
        'description'       => __('Theme block with posts'),
        'render_template'   => 'template-parts/blocks/block-posts.php',
        'category'          => 'sections',
        'icon'              => 'table-row-after',
        'keywords'          => array( 'block', 'posts', 'content' ),
        'supports'          => array('align' => false)
    ));
    acf_register_block_type(array(
        'name'              => 'section_jobs',
        'title'             => __('Section with jobs'),
        'description'       => __('Theme block with jobs'),
        'render_template'   => 'template-parts/blocks/block-jobs.php',
        'category'          => 'sections',
        'icon'              => 'table-row-after',
        'keywords'          => array( 'block', 'jobs', 'content' ),
        'supports'          => array('align' => false)
    ));
}
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'wis_register_blocks');
}?>
