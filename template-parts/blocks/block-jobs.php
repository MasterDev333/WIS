<?php
$id = 'section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$className = 'section';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
$jobs = get_field('jobs');
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title"><?= get_field('title'); ?></h2>
      <div class="job-description"><?= get_field('content'); ?></div>
    </div>
    <div class="jobs-box">
      <?php foreach($jobs as $job): ?>
        <div class="job-item">
          <a href="<?= $job['link'] ?>" target="_blank">
            <div class="job-organization"><?= $job['organization'] ?></div>
            <div class="job-name"><?= $job['job_name'] ?></div>
            <div class="job-get">Get it!</div>
          </a>
        </div>
      <?php $i++; endforeach; ?>
    </div>
  </div>
</div>