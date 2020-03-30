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

                    'element_id' => '145',
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

            //check if file exists
            $current_files = $item->getFiles();
            $hasfiles = array();
            foreach($current_files as $c_file):
              $hasfiles[] = $c_file->original_filename;
            endforeach;
            set_time_limit(100);
            if(!in_array('stream.jp2',$hasfiles)):
              echo $url.' - imported';
              $files = insert_files_for_item($item,
                'Url',
                array('source' => $url,'name' => 'stream.jp2'),
                array('ignore_invalid_files' => true));

              release_object($files);
            else:
                echo $url.' - was already imported';
            endif;
          endif;
        endforeach;
        release_object($item);
      endforeach;
    }
}
