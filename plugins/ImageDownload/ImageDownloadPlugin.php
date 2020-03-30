<?php
/**
 * Derivative Images
 *
 * @copyright Copyright 2007-2012 Roy Rosenzweig Center for History and New Media
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GNU GPLv3
 */

/**
 * The Derivative Images plugin.
 *
 * @package Omeka\Plugins\DerivativeImages
 */
class ImageDownloadPlugin extends Omeka_Plugin_AbstractPlugin
{
    /**
     * @var array This plugin's hooks.
     */
    protected $_hooks = array('install', 'define_acl', 'initialize');

    /**
     * @var array This plugin's filters.
     */
    protected $_filters = array('admin_navigation_main');

    /**
     * Install this plugin.
     */
    public function hookInstall()
    {
        // Must be using the filesystem storage adapter.
        if (!(Zend_Registry::get('storage')->getAdapter() instanceof Omeka_Storage_Adapter_Filesystem)) {
            throw new Omeka_Plugin_Installer_Exception(__('The storage adapter is not an instance of Omeka_Storage_Adapter_Filesystem.'));
        }
    }

    /**
     * Allow access only to super users.
     */
    public function hookDefineAcl($args)
    {
        $args['acl']->addResource('ImageDownload_Index');
        $args['acl']->deny('admin', 'ImageDownload_Index');
    }

    /**
     * Allow Translations
     */
    public function hookInitialize()
    {
        add_translation_source(dirname(__FILE__) . '/languages');
    }

    /**
     * Add the Derivative Images navigation link.
     */
    public function filterAdminNavigationMain($nav)
    {
        $nav[] = array('label' => __('Image Download'),
                       'uri' => url('image-download'),
                       'resource' => 'ImageDownload_Index');
        return $nav;
    }
}
