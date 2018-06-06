<?php
$title = metadata('exhibit', 'title');
echo head(array('title' => $title, 'bodyclass'=>'exhibits summary')); ?>

<section class="exhibit-section exhibit-show-section">
  <style>
  .jumbotron {
      background: #F4F5F8 url("<?php echo WEB_PUBLIC_THEME.'/default/images/exhibits/'.metadata('exhibit', 'slug').'.jpg';?>") no-repeat center center/cover;
  }
  </style>
  <div class="jumbotron">
    <section class="overlay">
      <div class='container'>
        <h1><span><a href="<?php $exhibit->getRecordUrl();?>"><?php echo metadata('exhibit', 'title'); ?></a></span></h1>
      </div>
    </section>
  </div>
  <div class='container'>
      <div class='row'>
        <div class='col-md-9 col-12'>

          <div class="row">
          <?php if ($exhibit->cover_image_file_id):?>
              <div class="col-12 col-sm-6 col-lg-7">
          <?php else:?>
              <div class="col-12 col-sm-12">
          <?php endif; ?>
            <div class="summary-text">
              <h2><?php echo __("Introduction");?></h2>

                <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
                    <div class="exhibit-description">
                        <?php echo $exhibitDescription; ?>
                    </div>
                <?php endif; ?>
                <?php if (($exhibitCredits = metadata('exhibit', 'credits'))): ?>
                    <h4><?php echo $exhibitCredits; ?></h4>
                <?php endif; ?>
                <div class="start">
                  <a href="<?php echo $exhibit->getFirstTopPage()->getRecordUrl();?>"><?php echo __("Start exhibit");?></a>
                </div>
              </div>
            </div>
          <?php if ($exhibit->cover_image_file_id): ?>
              <div class="col-12 col-sm-6 col-lg-5">
                    <?php
                      $file = get_record_by_id('File',$exhibit->cover_image_file_id);
                      $cover_url = $file->getWebPath('fullsize');
                    ?>
                    <div class="cover"><img src="<?php echo $cover_url ?>"></div>
              </div>
          <?php endif; ?>
        </div>
      </div>
      <div class='col-md-3 col-12 nav'>
            <h4><?php echo __("Table of contents");?></h4>
            <?php echo exhibit_builder_page_nav(); ?>
            <?php
            $pageTree = exhibit_builder_page_tree();
            if ($pageTree):
            ?>
            <nav id="exhibit-pages">
                <?php echo $pageTree; ?>
            </nav>
          <?php endif; ?>
        <div class="plugins">
          <?php
            $url = absolute_url();
            $title = strip_formatting(metadata($exhibit, 'title'));
            $description = strip_formatting(metadata($exhibit, 'description', array('no_escape' => true)));
          ?>
        </div>
      </div>
  </div>
</section>
<?php echo foot(); ?>
