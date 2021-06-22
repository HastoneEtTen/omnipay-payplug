<?php

namespace Omnipay\Payplug\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * Payplug Purchase Response
 */
class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    public function isSuccessful()
    {
        return false;
    }

    public function isRedirect()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isTransparentRedirect()
    {
        return true;
    }

    public function getRedirectMethod()
    {
        return 'GET';
    }

    /**
     * @return string
     */
    public function getRedirectUrl()
    {
        return $this->data['url'];
    }

    public function getRedirectData()
    {
        return [];
    }
}
