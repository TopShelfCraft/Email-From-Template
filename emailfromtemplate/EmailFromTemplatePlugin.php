<?php
namespace Craft;

/**
 * EmailFromTemplatePlugin
 *
 * @author    Top Shelf Craft
 * @copyright Copyright (c) 2017 Michael Rog
 * @link      https://topshelfcraft.com
 * @package   craft.emailfromtemplate
 * @since     0.0.1
 */
class EmailFromTemplatePlugin extends BasePlugin
{


    /**
     * @return mixed
     */
    public function getName()
    {
         return Craft::t('Email From Template');
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return Craft::t('Emails things. From templates.');
    }

    /**
     * @return string
     */
    public function getDocumentationUrl()
    {
        return 'https://github.com/topshelfcraft';
    }

    /**
     * @return string
     */
    public function getReleaseFeedUrl()
    {
        return '';
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return '0.0.1';
    }

    /**
     * @return string
     */
    public function getSchemaVersion()
    {
        return '0.0.0';
    }

    /**
     * @return string
     */
    public function getDeveloper()
    {
        return 'Michael Rog';
    }

    /**
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'https://topshelfcraft.com';
    }

    /**
     * @return bool
     */
    public function hasCpSection()
    {
        return false;
    }


}