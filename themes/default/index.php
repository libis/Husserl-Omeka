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
                    <img class="card-img-cap" src="<?php echo img('bg1.png');?>" alt="Card image">
                    <div class="card-block">
                        <div class="title"><h4 class="card-title"><span><a href="<?php echo url('solr-search?q=&facet=itemtype:%22Archival+folder%22');?>">Archival folders</a></span></h4></div>
                    </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="card card-image">
                    <img class="card-img-top" src="<?php echo img('bg2.png');?>" alt="Card image">
                    <div class="card-block">
                        <div class="title"><h4 class="card-title"><span><a href="<?php echo url('solr-search?q=&facet=itemtype:%22Manuscript+collection%22');?>">Manuscript collections</a></span></h4></div>
                    </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="card card-image">
                    <img class="card-img-cap" src="<?php echo img('bg3.png');?>" alt="Card image">
                    <div class="card-block">
                        <div class="title"><h4 class="card-title"><span><a href="<?php echo url('solr-search?q=&facet=itemtype:%22Document%22');?>">Documents</a></span></h4></div>
                    </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="card card-image">
                    <img class="card-img-top" src="<?php echo img('bg4.png');?>" alt="Card image">
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
          <?php $spotlights = get_records('item',array("featured"=>"1",'sort_field' => 'added', 'sort_dir' => 'd'),3);?>
          <?php foreach($spotlights as $record):?>
            <a href="<?php echo record_url($record);?>">
              <div class="news-item">
                <div class="row">
                  <div class="col-md-4">
                    <?php echo record_image($record,'thumbnail');?>
                  </div>
                  <div class="col-md-8">
                    <h3><?php echo metadata($record, array('Dublin Core', 'Title'));?></h3>
                    <p class="description">
                      <?php echo metadata($record, array('Dublin Core', 'Description'));?>
                    </p>
                  </div>
                </div>
            </div></a>
          <?php endforeach;?>

          <div class="more-news">
                <a href="<?php echo url("solr-search");?>">Explore collections</a>
          </div>
        </div>

        <div class="col-md-5 news-home news-container">
          <h2>News</h2>
          <?php $news = get_records('item',array("type"=>"News",'sort_field' => 'added', 'sort_dir' => 'd'),3);?>
          <?php foreach($news as $record):?>
            <a href="<?php echo record_url($record);?>"><div class="news-item">
                  <h3><?php echo metadata($record, array('Dublin Core', 'Title'));?></h3>
                  <p class="datum"><?php echo metadata($record, array('Dublin Core', 'Date'));?></p>
                  <p class="description">
                    <?php echo metadata($record, array('Dublin Core', 'Description'));?>
                  </p>
            </div></a>
          <?php endforeach;?>

          <div class="more-news">
                <a href="<?php echo url('news');?>">More news</a>
          </div>
        </div>
      </div>
  </div>
</section>

<?php echo foot(); ?>
