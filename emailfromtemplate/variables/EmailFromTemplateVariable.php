<?php
namespace Craft;

/**
 * EmailFromTemplateVariable
 *
 * @author    Top Shelf Craft
 * @copyright Copyright (c) 2017 Michael Rog
 * @link      https://topshelfcraft.com
 * @package   craft.emailfromtemplate
 * @since     0.0.1
 */
class EmailFromTemplateVariable
{


    public function sendEmail($settings = [], $variables = [])
    {
        craft()->emailFromTemplate->sendEmail($settings, $variables);
    }

}