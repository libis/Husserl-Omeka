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
    queue_css_file(array('iconfonts', 'app'));
    queue_css_url('https://fonts.googleapis.com/css?family=Frank+Ruhl+Libre:400,700,900|Open+Sans:300,400,700');
    echo head_css();
    echo theme_header_background();
    ?>

    <?php
      queue_js_file('masonry');
      echo head_js();
    ?>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">

</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <?php fire_plugin_hook('public_body', array('view' => $this)); ?>
        <header role="banner">
            <nav class="navbar public-nav">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                    <button class="navbar-toggler hidden-sm-up pull-xs-right" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2" aria-controls="exCollapsingNavbar2" aria-expanded="false" aria-label="Toggle navigation">
                      &#9776;
                    </button>
                    <a class="navbar-brand" href="<?php echo WEB_ROOT;?>"><span>digital</span>Husserl</a>
                    <form class="form-inline pull-xs-right">
                      <input class="form-control" type="text" placeholder="Search">
                      <button class="btn" type="submit"><i class="material-icons">search</i></button>
                    </form>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
                    <?php echo public_nav_main(array('role' => 'navigation')) -> setUlClass('nav navbar-nav'); ?>
                    </div>
                  </div>
                </div>
              </div>
            </nav>
            <?php fire_plugin_hook('public_header', array('view' => $this)); ?>
        </header>
        <div class="collapse full-menu" id="exCollapsingNavbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <h4>Collapsed content</h4>
                        <span class="text-muted"> <?php echo public_nav_main(array('role' => 'navigation')); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <?php //echo search_form();?>
