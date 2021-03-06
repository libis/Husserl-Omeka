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
            $options = array('process_type' => $this->getParam('process_type'),);
            Zend_Registry::get('bootstrap')->getResource('jobs')
                ->sendLongRunning('ImageDownloadJob', $options);
            $this->_helper->flashMessenger(__('Processing files. This may take a while. You may continue administering your site.'), 'success');

        }
    }
}
