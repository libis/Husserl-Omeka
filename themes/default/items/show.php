<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'item show')); ?>
<?php $type = metadata('item','item_type_name');?>
<section class="metadata-section">
  <div class='container'>
    <div class="content">
      <div class="row">
        <?php if (metadata('item', 'has files') && $type == 'News'): ?>
            <div class="col-sm-3 col-xs-12">
              <div id="itemfiles">
                  <div class="element-text"><?php echo item_image_gallery(array('linkWrapper' => array('wrapper' => null,'class' => 'col-sm-2 col-xs-12 image')),'thumbnail'); ?></div>
              </div>
            </div>
            <div class="col-sm-8 col-md-9 col-xs-12">
        <?php else:?>
            <div class="col-sm-8 col-md-9 col-xs-12">
        <?php endif; ?>
        <?php if ($type != ''): ?>
          <!--<h3 class="type-title"><?php echo $type;?></h3>-->
        <?php endif; ?>
        <h2><span><?php echo $type;?></span></h2>
        <h1 class="section-title projecten-title"><span><?php echo metadata('item', array('Dublin Core', 'Title')); ?></span></h1>

        <?php if ($type != 'News'):?>
        <div class="metadata">
          <div class="metadata-bg">
          <?php
            $metadata = all_element_texts('item',array("return_type"=>"array"));
            $dontshow = array("Title","Transcription","CA","Relation","Representation","Secondary notes","Transcriber");
            if($type == "Archival folder"):
              $dontshow[] = "Manuscript collection";
            endif;
            if($type == "Manuscript collection"):
              $dontshow[] = "Lecture page";
            endif;
            //var_dump($metadata);
          ?>
          <?php if(isset($metadata['Dublin Core']["Identifier"])):?>
            <div class="element">
              <h3>Object number</h3>
              <div class="text"><?php echo implode(", ",$metadata['Dublin Core']["Identifier"]);?></div>
            </div>
          <?php endif;?>

          <?php if(isset($metadata['Dublin Core']["Alternative Tite"])):?>
            <div class="element">
              <h3>Alternative title</h3>
              <div class="text"><?php echo implode(", ",$metadata['Dublin Core']["Alternative Tite"]);?></div>
            </div>
          <?php endif;?>

          <?php if(isset($metadata['Dublin Core']["Description"])):?>
            <div class="element">
              <h3>Description</h3>
              <div class="text"><?php echo implode(", ",$metadata['Dublin Core']["Description"]);?></div>
            </div>
          <?php endif;?>

          <?php if(isset($metadata['Dublin Core']["Creator"])):?>
            <div class="element">
              <h3>Authors</h3>
              <div class="text"><?php echo implode(", ",$metadata['Dublin Core']["Creator"]);?></div>
            </div>
          <?php endif;?>

          <?php if(isset($metadata['Dublin Core']["Contributor"])):?>
            <div class="element">
              <h3>Contributor</h3>
              <div class="text"><?php echo implode(", ",$metadata['Dublin Core']["Contributor"]);?></div>
            </div>
          <?php endif;?>

          <?php if(isset($metadata['Dublin Core']["Date"])):?>
            <div class="element">
              <h3>Date</h3>
              <div class="text"><?php echo implode(", ",$metadata['Dublin Core']["Date"]);?></div>
            </div>
          <?php endif;?>

          <?php if(isset($metadata['Dublin Core']["Coverage"])):?>
            <div class="element">
              <h3>Location of the lecture</h3>
              <div class="text"><?php echo implode(", ",$metadata['Dublin Core']["Coverage"]);?></div>
            </div>
          <?php endif;?>

          <?php if(isset($metadata['Dublin Core']["Format"])):?>
            <div class="element">
              <h3>Physical description</h3>
              <div class="text"><?php echo implode(", ",$metadata['Dublin Core']["Format"]);?></div>
            </div>
          <?php endif;?>

          <?php
            foreach($metadata[$type.' Item Type Metadata'] as $label=>$meta):
              if(!in_array($label,$dontshow)):?>
                <div class="element">
                  <h3><?php echo $label;?></h3>
                  <div class="text"><?php echo implode(", ",$meta);?></div>
                </div>
              <?php endif;
            endforeach;

            $relations = $metadata[$type.' Item Type Metadata']["Relation"];
            $relations = get_related($relations);
            if($relations):
              foreach($relations as $label=>$record_type):?>
                <?php if(!in_array($label,$dontshow)):?>
                <div class="element">
                    <h3>Related <span><?php echo $label;?></span></h3>
                    <div class="text"><?php echo implode(", ",$record_type['links']);?></div>
                </div>
                <?php endif;?>
              <?php endforeach;?>
            <?php endif;?>
            <?php if(isset($metadata[$type.' Item Type Metadata']["Representation"])):?>
              <div class="element">
                <h3><i class="material-icons">&#xE3B6;</i><a href="http://resolver.libis.be/<?php echo $metadata[$type.' Item Type Metadata']["Representation"][0];?>/representation">View online</a></h3>
              </div>
            <?php endif;?>
          </div>

            <!-- Transcription -->
            <?php if(isset($metadata[$type.' Item Type Metadata']["Transcription"])):?>
              <div class="highlight">
                <h3>Transcription</h3>
                <div class="text">
                  <?php echo implode("<br>",$metadata[$type.' Item Type Metadata']["Transcription"]);?>
                  <?php if(isset($metadata[$type.' Item Type Metadata']["Secondary notes"])):?>
                    <div class="transcription-element">
                      <h4>Secondary notes</h4>
                      <p><?php echo implode(', ',$metadata[$type.' Item Type Metadata']["Secondary notes"]);?></p>
                    </div>
                  <?php endif;?>
                  <?php if(isset($metadata[$type.' Item Type Metadata']["Transcriber"])):?>
                    <div class="transcription-element">
                      <h4>Transcriber</h4>
                      <p><?php echo implode(', ',$metadata[$type.' Item Type Metadata']["Transcriber"]);?></p>
                    </div>
                  <?php endif;?>
                </div>
              </div>
            <?php endif;?>

            <!-- Manuscript collection -->
            <?php if(isset($relations["Manuscript collection"]) && $type == "Archival folder"):?>
              <div class="highlight">
                <h3>Related manuscript collections</h3>
                <div class="text">
                  <?php foreach($relations["Manuscript collection"]["records"] as $record):?>
                    <div class="item">
                      <div class="sub-image">
                      <?php
                        echo link_to_item(
                            item_image('thumbnail', array(), 0, $item),
                            array(),
                            'show',
                            $record
                        );
                      ?>
                      </div>
                      <div class="sub-metadata">
                        <h4><?php echo link_to_item(metadata($record, array("Dublin Core","Title")),array(),"show",$record);?></h4>
                        <p><?php echo metadata($record, array("Dublin Core","Description"),array("snippet"=>"200"));?></p>
                        <p class="date"><?php echo metadata($record, array("Dublin Core","Date"));?></p>
                        <p class="more-info"><?php echo link_to_item("More info",array(),"show",$record);?></p>
                      </div>
                    </div>
                  <?php endforeach;?>
                </div>
              </div>
            <?php endif;?>

            <!-- Lecture pages -->
            <?php if(isset($relations["Lecture page"]) && $type == "Manuscript collection"):?>
              <div class="highlight">
                <h3>Related lecture pages</h3>
                <div class="text">
                  <?php foreach($relations["Lecture page"]["records"] as $record):?>
                    <div class="item">
                      <div class="sub-image">
                      <?php
                        echo link_to_item(
                            item_image('thumbnail', array(), 0, $item),
                            array(),
                            'show',
                            $record
                        );
                      ?>
                      </div>
                      <div class="sub-metadata">
                        <h4><?php echo link_to_item(metadata($record, array("Dublin Core","Title")),array(),"show",$record);?></h4>
                        <h5>Transcription</h5>
                        <p><?php echo metadata($record, array("Item Type Metadata","Transcription"));?></p>
                        <p class="more-info"><?php echo link_to_item("More info",array(),"show",$record);?></p>
                      </div>
                    </div>
                  <?php endforeach;?>
                </div>
              </div>
            <?php endif;?>

          </div>
          <?php else:?>
              <p class="date"><?php echo metadata('item', array('Dublin Core', 'Date')); ?></p>
              <p class="description"><?php echo metadata('item', array('Dublin Core', 'Description')); ?></p>
          <?php endif; ?>
      </div>
      <div class="col-sm-4 col-md-3 col-xs-12 image-col">
        <?php if (metadata('item', 'has files')): ?>
            <div id="itemfiles">
                <div class="element-text"><?php echo item_image_gallery(array('linkWrapper' => array('wrapper' => null,'class' => 'image')),'thumbnail'); ?></div>
            </div>
            <?php if(isset($metadata[$type.' Item Type Metadata']["Representation"])):?>
              <div class="view-link">
                <h3><i class="material-icons">&#xE3B6;</i><a href="http://resolver.libis.be/<?php echo $metadata[$type.' Item Type Metadata']["Representation"][0];?>/representation">View online</a></h3>
              </div>
            <?php endif;?>
        <?php endif;?>
      </div>

  </div>
  <nav>
      <ul class="item-pagination navigation">
          <li id="previous-item" class="previous"><?php echo link_to_previous_item_show("&#8249; Previous"); ?></li>
          <li id="next-item" class="next"><?php echo link_to_next_item_show('Next &#8250;'); ?></li>
      </ul>
  </nav>
</div>
</section>
<?php echo foot(); ?>
