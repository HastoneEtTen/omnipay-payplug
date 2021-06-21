<?php

namespace Omnipay\Payplug\Message;

use Omnipay\Common\Message\AbstractRequest as OmnipayAbstractRequest;
use Payplug\Payplug;

/**
 * Payplug Abstract Request
 */
abstract class AbstractRequest extends OmnipayAbstractRequest
{
    public function getPayplug(): Payplug
    {
        return Payplug::init([
            'secretKey' => $this->getSecretKey(),
            'apiVersion' => '2019-08-06'
        ]);
    }

    /**
     * @return mixed
     */
    public function getSecretKey()
    {
        return $this->getParameter('secretKey');
    }

    /**
     * @param $value
     * @return AbstractRequest
     */
    public function setSecretKey($value)
    {
        return $this->setParameter('secretKey', $value);
    }

}
