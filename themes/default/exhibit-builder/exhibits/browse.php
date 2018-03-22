<?php
$title = __('Browse Exhibits');
echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));
?>
<section class="exhibit-section simple-page-section">
    <div class="container simple-page-container">
        <!--<div class='breadcrumbs'>
            <p id="simple-pages-breadcrumbs">
              <span><a href="<?php echo url('/');?>"><?php echo __("Home");?></a></span>
               > <span><?php echo __("Exhibits");?></span>
            </p>
        </div>-->
        <h1><?php echo $title; ?></h1>
        <?php if(sizeof($exhibits > 0)): ?>
        <div class="row">
            <?php foreach ($exhibits as $exhibit): ?>
              <div class="col-md-3">
                <div class="tile">
                  <?php if ($exhibitImage = record_image($exhibit, 'square_thumbnail')): ?>
                      <?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage, array('class' => 'image')); ?>
                  <?php endif; ?>
                  <div class="text">
                      <h2><?php echo exhibit_builder_link_to_exhibit($exhibit,metadata($exhibit, 'title')); ?></h2>
                      <?php if ($exhibitCredits = metadata($exhibit, 'credits')): ?>
                      <div class="credits"><?php echo $exhibitCredits; ?></div>
                      <?php endif; ?>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
          <?php else: ?>
            <p><?php echo __('There are no exhibits available yet.'); ?></p>
          <?php endif; ?>
      </div>
</section>
<?php echo foot(); ?>
