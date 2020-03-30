<?php
/**
 * Derivative Images
 *
 * @copyright Copyright 2007-2012 Roy Rosenzweig Center for History and New Media
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GNU GPLv3
 */

/**
 * The Derivative Images controller.
 *
 * @package Omeka\Plugins\DerivativeImages
 */
class ImageDownload_IndexController extends Omeka_Controller_AbstractActionController
{
    public function indexAction()
    {
        if ($this->getRequest()->isPost()) {
            /*$options = array('process_type' => $this->getParam('process_type'),);
            Zend_Registry::get('bootstrap')->getResource('jobs')
                ->sendLongRunning('ImageDownloadJob', $options);
            $this->_helper->flashMessenger(__('Processing files. This may take a while. You may continue administering your site.'), 'success');*/
            // Fetch file IDs according to the passed options.
            //  'element_id' => '84',
            $items = get_records(
              'Item',
              array(
                  'advanced' => array(
                      array(

                          'element_id' => '84',
                          'type' => 'is not empty'
                      )
                  )
              ),9999
            );


            foreach($items as $item):
              //get 'referenced by'
              $urls = metadata($item, array('Dublin Core','Is Referenced By'),array('all' => true));

              foreach($urls as $url):
                //check if url correct
                $url = strip_tags($url);

                if (strpos($url, '/representation') !== false):
                  $url = str_replace("representation",'stream?quality=HIGH',$url);

                  $temp = explode('/',$url);
                  $ie = $temp[3];

                  $name = uniqid();

                  $obj = rosetta_talk_resolver($url);
                  //var_dump($obj);exit;
                  file_put_contents('/tmp/'.$name.'.jp2',$obj);

                  //check if file exists
                  $current_files = $item->getFiles();
                  $hasfiles = array();
                  foreach($current_files as $c_file):
                    $hasfiles[] = $c_file->original_filename;
                  endforeach;
                  set_time_limit(100);
                  if(!in_array($ie,$hasfiles)):
                    echo $url;
                    //create file
                    $file = new File();
                    $file->item_id = $item->id;
                    $file->filename = $name.'.jp2';
                    $file->has_derivative_image = 1;
                    //$file->mime_type = rosetta_get_mime_type($obj);
                    $file->mime_type ='image/jp2';
                    $file->original_filename = $ie;
                    $file->metadata = "";
                    $file->save();
                    release_object($file);
                  endif;
                endif;
              endforeach;
              release_object($item);
            endforeach;
        }

        /*$db = $this->_helper->db->getDb();
        $sql = "SELECT mime_type FROM $db->File GROUP BY mime_type";
        $this->view->mime_types = $db->fetchCol($sql);*/
    }
}
