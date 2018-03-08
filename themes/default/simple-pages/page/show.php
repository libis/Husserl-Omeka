<?php
$bodyclass = 'page simple-page';
if ($is_home_page):
    $bodyclass .= ' simple-page-home';
endif;

echo head(array(
    'title' => metadata('simple_pages_page', 'title'),
    'bodyclass' => $bodyclass,
    'bodyid' => metadata('simple_pages_page', 'slug')
));
?>
<div class="simple-page-section ">
  <div class="container simple-page-container">
    <div class='breadcrumbs'>
        <p id="simple-pages-breadcrumbs"><span><?php echo simple_pages_display_breadcrumbs(); ?></span></p>

    </div>
    <!-- Content -->
    <div class="row no-gutters">
        <div class="col-sm-9 col-xs-12">
          <div class='content'>
                <h1><?php echo metadata('simple_pages_page', 'title'); ?></h1>
                <?php
                    $text = metadata('simple_pages_page', 'text', array('no_escape' => true));
                    echo $this->shortcodes($text);
                ?>
          </div>
        </div>
        <div class="col-sm-3 col-xs-12 nav"><?php echo simple_nav();?></div>
    </div>
  </div>
</div>

<?php echo foot(); ?>
