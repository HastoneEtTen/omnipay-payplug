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

    /**
     * @param $value
     * @return AbstractRequest
     */
    public function setSuccessUrl($value)
    {
        return $this->setParameter('successUrl', $value);
    }

    /**
     * @return mixed
     */
    public function getSuccessUrl()
    {
        return $this->getParameter('successUrl');
    }

    /**
     * @param string $value
     * @return AbstractRequest
     */
    public function setCancelUrl($value)
    {
        return $this->setParameter('cancelUrl', $value);
    }

    /**
     * @return mixed|string
     */
    public function getCancelUrl()
    {
        return $this->getParameter('cancelUrl');
    }

    /**
     * @param $value
     * @return AbstractRequest
     */
    public function setOrderId($value)
    {
        return $this->setParameter('orderId', $value);
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->getParameter('orderId');
    }

}
