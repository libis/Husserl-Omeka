<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ($description = option('description')) :?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>
    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view' => $this)); ?>

    <!-- Stylesheets -->
    <?php
    queue_js_file("lightgallery-all.min");
    queue_css_file(array('iconfonts', 'app.min','lightgallery.min'));
    queue_css_url('https://fonts.googleapis.com/css?family=Frank+Ruhl+Libre:400,700,900|Open+Sans:300,400,700');
    echo head_css();
    echo head_js();
    ?>

    <!-- JavaScripts -->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">

</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <?php fire_plugin_hook('public_body', array('view' => $this)); ?>
        <header role="banner">
          <div class="container nav-container">
            <nav class="navbar">
              <button class="toggle" type="button">
                &#9776;
              </button>
              <a class="brand" href="<?php echo WEB_ROOT;?>"><span>digital</span>Husserl</a>
              <div class="left">
                <?php echo public_nav_main(array('role' => 'navigation')) -> setUlClass('nav navbar-nav'); ?>
              </div>
              <div class="right">
                <form class="form-inline" action="<?php echo url("solr-search");?>">
                  <div class="inputs">
                    <input class="form-control" name="q" type="text" placeholder="Search">
                  </div>
                  <div class="buttons">
                    <button class="btn" type="submit"><i class="material-icons">search</i></button>
                  </div>
                </form>
              </div>
            </nav>
          </div>

        </header>

        <?php //echo search_form();?>
