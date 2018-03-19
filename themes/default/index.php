<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'two-col')); ?>
<div class="jumbotron">
    <div class="container">
      <div class="">
        <div class="row intro no-gutters">
            <div class="col-lg-1 bar"></div>
              <div class="col-md-8 col-lg-7">
                <div class="intro-text">
                  <?php echo libis_get_simple_page_content("homepage-info");?>
                  <p class="more"><i class="material-icons">&#xE5C8;</i><a href="<?php echo url("about");?>">More about digital Husserl</a></p>
                </div>
              </div>
              <div class="col-md-4 col-lg-3">
                <div class="intro-image">
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<section class="home">
    <div class='container'>
      <div class="learn-row row no-gutters">
          <div class="col-md-12 col-lg-1 col-xs-12">
            <div class="learn">
              <p>Learn More</p>
            </div>
          </div>
          <div class="features col-lg-11 col-md-12 col-xs-12">
            <div class="row card-deck no-gutters">
              <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="card card-image">
                    <img class="card-img-cap" src="<?php echo img('ph/bg6.png');?>" alt="Card image">
                    <div class="card-block">
                        <div class="title"><h4 class="card-title"><span><a href="<?php echo url('solr-search?q=&facet=itemtype:%22Archival+folder%22');?>">Archival folders</a></span></h4></div>
                    </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="card card-image">
                    <img class="card-img-top" src="<?php echo img('ph/bg6.png');?>" alt="Card image">
                    <div class="card-block">
                        <div class="title"><h4 class="card-title"><span><a href="<?php echo url('solr-search?q=&facet=itemtype:%22Manuscript+collection%22');?>">Manuscript collections</a></span></h4></div>
                    </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="card card-image">
                    <img class="card-img-cap" src="<?php echo img('ph/bg6.png');?>" alt="Card image">
                    <div class="card-block">
                        <div class="title"><h4 class="card-title"><span><a href="<?php echo url('solr-search?q=&facet=itemtype:%22Lecture+page%22');?>">Lecture pages</a></span></h4></div>
                    </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="card card-image">
                    <img class="card-img-top" src="<?php echo img('ph/bg6.png');?>" alt="Card image">
                    <div class="card-block">
                        <div class="title"><h4 class="card-title"><span><a href="<?php echo url('solr-search?q=&facet=itemtype:%22Lecture+event%22');?>">Lecture events</a></span></h4></div>
                    </div>
                </div>
              </div>
             </div>
           </div>
         </div>
     </div>
</section>
<section class="news">
  <div class="container">
      <div class="row item-container no-gutters">
        <!-- spotlight -->
        <div class="col-md-7 news-home spotlight">
          <h2>Spotlight</h2>
          <a href="">
            <div class="news-item">
              <div class="row">
                <div class="col-md-4">
                  <img class="" src="<?php echo img('ph/bg4.jpg');?>" alt="Card image">
                </div>
                <div class="col-md-8">
                  <h3>Sed luctus blandit</h3>
                  <p class="description">
                    Nam pulvinar fringilla egestas. Donec nulla quam, condimentum at metus ut, semper luctus massa. Proin sit amet magna non augue bibendum iaculis nec nec lorem.
                  </p>
                </div>
              </div>
          </div></a>
          <a href=""><div class="news-item">
            <div class="row">
            <div class="col-md-4">
              <img class="" src="<?php echo img('ph/bg4.jpg');?>" alt="Card image">
            </div>
            <div class="col-md-8">
              <h3>Sed luctus blandit</h3>
              <p class="description">
                Nam pulvinar fringilla egestas. Donec nulla quam, condimentum at metus ut, semper luctus massa. Proin sit amet magna non augue bibendum iaculis nec nec lorem.
              </p>
            </div></div>
          </div></a>
          <a href=""><div class="news-item">
            <div class="row">
            <div class="col-md-4">
              <img class="" src="<?php echo img('ph/bg4.jpg');?>" alt="Card image">
            </div>
            <div class="col-md-8">
              <h3>Sed luctus blandit</h3>
              <p class="description">
                Nam pulvinar fringilla egestas. Donec nulla quam, condimentum at metus ut, semper luctus massa. Proin sit amet magna non augue bibendum iaculis nec nec lorem.
              </p>
            </div></div>
          </div></a>

          <div class="more-news">
                <a href="">All items</a>
          </div>
        </div>

        <div class="col-md-5 news-home news-container">
          <h2>News</h2>
          <a href=""><div class="news-item">
                <h3>Sed luctus blandit</h3>
                <p class="datum">14-08-2017</p>
                <p class="description">
                  Nam pulvinar fringilla egestas. Donec nulla quam, condimentum at metus ut, semper luctus massa. Proin sit amet magna non augue bibendum iaculis nec nec lorem.
                </p>
          </div></a>
          <a href=""><div class="news-item">
                <h3>Sed luctus blandit</h3>
                <p class="datum">14-08-2017</p>
                <p class="description">
                  Nam pulvinar fringilla egestas. Donec nulla quam, condimentum at metus ut, semper luctus massa. Proin sit amet magna non augue bibendum iaculis nec nec lorem.
                </p>
          </div></a>
          <a href=""><div class="news-item">
                <h3>Sed luctus blandit</h3>
                <p class="datum">14-08-2017</p>
                <p class="description">
                  Nam pulvinar fringilla egestas. Donec nulla quam, condimentum at metus ut, semper luctus massa. Proin sit amet magna non augue bibendum iaculis nec nec lorem.
                </p>
          </div></a>

          <div class="more-news">
                <a href="">More news</a>
          </div>
        </div>
      </div>
  </div>
</section>

<?php echo foot(); ?>
