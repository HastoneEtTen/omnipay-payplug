<?php
namespace Omnipay\Payplug;

use Omnipay\Common\AbstractGateway;
use Omnipay\Payplug\Message\CompletePurchaseRequest;
use Omnipay\Payplug\Message\PurchaseRequest;

/**
 * Payplug Gateway
 *
 * @author Hastone et Ten <web@hastone-et-ten.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'Payplug';
    }

    public function getDefaultParameters()
    {
        return array(
            'secretKey' => '',
            'testMode' => false,
        );
    }

    public function getSecretKey()
    {
        return $this->getParameter('secretKey');
    }

    public function setSecretKey($value)
    {
        return $this->setParameter('secretKey', $value);
    }

    public function setParameter($key, $value)
    {
        return parent::setParameter($key, $value);
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest(PurchaseRequest::class, $parameters);
    }

    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest(CompletePurchaseRequest::class, $parameters);
    }

}
