<?php
/**
 * Derivative Images Job
 *
 * @copyright Copyright 2007-2012 Roy Rosenzweig Center for History and New Media
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GNU GPLv3
 */

/**
 * @package Omeka\Plugins\DerivativeImages
 */
class ImageDownloadJob extends Omeka_Job_AbstractJob
{
    /**
     * @var Omeka_Storage
     */
    protected $_storage;

    /**
     * @var Omeka_File_Derivative_Image_Creator
     */
    protected $_imageCreator;

    /**
     * @var array Valid derivative types
     */
    protected $_validDerivativeTypes = array('fullsize', 'thumbnail', 'square_thumbnail');

    /**
     * @var array Derivative types to create and their image size constraints
     */
    protected $_derivatives = array();

    /**
     * Construct this job.
     *
     * Sets properties needed during the process.
     */
    public function __construct(array $options)
    {
        parent::__construct($options);

        // Set the storage.
        $this->_storage = Zend_Registry::get('storage');
        if (!($this->_storage->getAdapter() instanceof Omeka_Storage_Adapter_Filesystem)) {
            throw new Omeka_Storage_Exception(__('The storage adapter is not an instance of Omeka_Storage_Adapter_Filesystem.'));
        }

    }

    /**
     * Perform this job.
     */
    public function perform()
    {
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
}
