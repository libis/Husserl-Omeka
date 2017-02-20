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
<div class="content-wrapper simple-page-section ">
  <div class="container-fluid simple-page-container">
    <!-- Content -->

        <div class="row">
            <div class="col-sm-9 page">
                <div class='row breadcrumbs'>
                    <p id="simple-pages-breadcrumbs"><span><?php echo simple_pages_display_breadcrumbs(); ?></span></p>
                </div>
                <div class='row top'>
                    <h1><?php echo metadata('simple_pages_page', 'title'); ?></h1>
                </div>
                <div class='row content'>
                    <?php
                        $text = metadata('simple_pages_page', 'text', array('no_escape' => true));
                        echo $this->shortcodes($text);
                    ?>
                </div>
            </div>
            <div class="col-sm-3 nav"><?php echo simple_nav();?></div>
        </div>
    </div>
</div>

<?php echo foot(); ?>
