<?php
/**
 * @copyright   2012 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 */
?>

<?php queue_css_file('results'); ?>
<?php echo head(array('title' => __('Solr Search'))); ?>

<div class="solr-section-search">
  <div class="container">
    <div class="search">
      <div  class="row">
        <!-- Search form. -->
        <div class="solr-top col-md-7 col-xs-12">
            <h1>Search</h1>

            <form id="solr-search-form">
              <div class="inputs">
                <input type="text" title="<?php echo __('Search keywords') ?>" name="q" placeholder="<?php echo __('Search the Collection'); ?>" value="<?php
                  echo array_key_exists('q', $_GET) ? $_GET['q'] : '';
                  ?>"
                />
              </div>
              <div class="buttons">
                <button type="submit" /><i class="material-icons">&#xE8B6;</i></button>
              </div>
            </form>
        </div>
        <div class="lecture-info col-xs-12 col-md-5">
            <?php echo libis_get_simple_page_content("lecture-info");?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="solr-section-applied">
  <div class="container solr-container">
    <!-- Applied facets. -->
    <div id="solr-applied-facets">
      <ul>
        <!-- Get the applied facets. -->
        <?php foreach (SolrSearch_Helpers_Facet::parseFacets() as $f) : ?>
          <li>
            <!-- Facet label. -->
            <?php $label = SolrSearch_Helpers_Facet::keyToLabel($f[0]); ?>
            <span class="applied-facet-label"><?php echo $label; ?></span> >
            <span class="applied-facet-value"><?php echo $f[1]; ?></span>
            <!-- Remove link. -->
            <?php $url = SolrSearch_Helpers_Facet::removeFacet($f[0], $f[1]); ?>
            <a href="<?php echo $url; ?>"><i class="material-icons">&#xE14C;</i></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>
<div class="solr-section-results">
    <div class="container results-container">
    <div class="row">
        <div class="solr-results col-md-9 col-12">
            <!-- Results. -->
            <!-- Number found. -->
            <h1 id="num-found">
                <?php echo $results->response->numFound; ?> results
            </h1>
            <?php echo pagination_links(); ?>
            <?php foreach ($results->response->docs as $doc) : ?>
              <!-- Document. -->
              <div class="row result">
                <div class="col-12 col-sm-3 col-md-3 img-column">
                <?php if ($doc->resulttype == 'Item') :?>
                    <?php $item = get_db()->getTable($doc->model)->find($doc->modelid);?>
                    <?php if (metadata($item, 'has files')): ?>
                          <?php echo link_to_item(
                              item_image('thumbnail', array('alt' => $doc->title), 0, $item),
                              array(),
                              'show',
                              $item
                          );?>
                    <?php else:?>
                        <div class="no-image" style="width:100%;height:200px;background:#ddd;"></div>
                    <?php endif;?>
                <?php else:?>
                    <div class="no-image" style="width:100%;height:200px;background:#ddd;"></div>
                <?php endif;?>
                </div>
                <div class="col-12 col-sm-9 col-md-9">
                <!-- Header. -->
                <!-- Record URL. -->
                <?php $url = SolrSearch_Helpers_View::getDocumentUrl($doc); ?>

                  <div class="text-block">
                    <!-- Title. -->
                    <h2><a href="<?php echo $url; ?>" class="result-title">
                    <?php
                    $title = is_array($doc->title) ? $doc->title[0] : $doc->title;
                    if (empty($title)) {
                        $title = '<i>'.__('Untitled').'</i>';
                    }
                    echo $title;
                    ?>
                    </a></h2>

                    <?php
                        if ($doc->resulttype == 'Item') :
                          $item = get_db()->getTable($doc->model)->find($doc->modelid);
                          if($text = metadata($item, array('Dublin Core','Date'))):?>
                            <div class="solr-element">
                              <h3>Date</h3>
                              <div class="text"><?php echo $text;?></div>
                            </div>
                          <?php endif;?>
                          <?php if($text = metadata($item, array('Dublin Core','Description'),array('snippet'=>'200'))):?>
                            <div class="solr-element">
                              <h3>Description</h3>
                              <div class="text"><?php echo $text;?></div>
                            </div>
                          <?php endif;?>
                          <?php if($text = metadata($item, array('Item Type Metadata','Transcription'),array('snippet'=>'200'))):?>
                            <div class="solr-element">
                              <h3>Transcription</h3>
                              <div class="text"><?php echo $text;?></div>
                            </div>
                          <?php endif;?>
                      <?php endif;?>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

            <?php echo pagination_links(); ?>
        </div>
        <div id="solr-facets" class="col-md-3 col-12">
            <!-- Facets. -->
            <h2><?php echo __('Limit your search'); ?></h2>

              <?php foreach ($results->facet_counts->facet_fields as $name => $facets) : ?>

              <!-- Does the facet have any hits? -->
              <?php if (count(get_object_vars($facets))) : ?>

                  <!-- Facet label. -->
                  <?php $label = SolrSearch_Helpers_Facet::keyToLabel($name); ?>
                  <strong><?php echo $label; ?></strong>

                <ul>
                <!-- Facets. -->
                  <?php foreach ($facets as $value => $count) : ?>
                    <li class="<?php echo $value; ?>">

                      <!-- Facet URL. -->
                      <?php $url = SolrSearch_Helpers_Facet::addFacet($name, $value); ?>

                      <!-- Facet link. -->
                      <a href="<?php echo $url; ?>" class="facet-value">
                          <?php echo $value; ?>
                      </a>

                      <!-- Facet count. -->
                      (<span class="facet-count"><?php echo $count; ?></span>)

                    </li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>

              <?php endforeach; ?>
          </div>
    </div>
  </div>
</div>
<?php echo foot();
