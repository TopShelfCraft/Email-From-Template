<?php
namespace Craft;

/**
 * EmailFromTemplateService
 *
 * @author    Top Shelf Craft
 * @copyright Copyright (c) 2017 Michael Rog
 * @link      https://topshelfcraft.com
 * @package   craft.emailfromtemplate
 * @since     0.0.1
 */
class EmailFromTemplateService extends BaseApplicationComponent
{


    /**
     * @param array|EmailModel $settings
     * @param array $variables
     *
     * @return bool
     */
    public function sendEmail($settings = [], $variables = [])
    {

        /*
         * If we already have an EmailModel, just pass it through to EmailService.
         * Otherwise, let's spin one up using some special sprinkles.
         */

        if ($settings instanceof EmailModel)
        {
            $email = $settings;
        }
        elseif (is_array($settings))
        {

            $email = new EmailModel();

            foreach ($settings as $attribute => $value)
            {
                $email->setAttribute($attribute, $value);
            }

            // Do we have a template spec'd for the text body? If so, process it.

            if (!empty($settings['bodyTemplate']))
            {
               $body = craft()->templates->render($settings['bodyTemplate'], $variables);
               $email->body = $body;
            }

            // Do we have a template spec'd for the htmlBody? If so, process it.

            if (!empty($settings['htmlBodyTemplate']))
            {
                $htmlBody = craft()->templates->render($settings['htmlBodyTemplate'], $variables);
                $email->htmlBody = $htmlBody;
            }

            // If we don't have a toEmail spec'd, try to default to the current user.

            if (empty($settings['toEmail']) && !empty(craft()->userSession->getUser()))
            {
                $email->toEmail = craft()->userSession->getUser()->email;
            }

        }
        else
        {
            // $settings wasn't valid. Bail.
            return false;
        }

        /*
         * Bombs away.
         */

        if ($email->validate())
        {
            if (craft()->email->sendEmail($email, $variables))
            {
                return true;
            };
        }

        return false;

    }


}