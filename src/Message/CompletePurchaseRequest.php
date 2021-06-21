<?php

namespace Omnipay\Payplug\Message;

use Omnipay\Common\Exception\InvalidResponseException;

/**
 * Payplug Complete Purchase Request
 */
class CompletePurchaseRequest extends AbstractRequest
{

    public function getData(): array
    {
        return [];
    }

    public function sendData($data): CompletePurchaseResponse
    {
        return $this->response = new CompletePurchaseResponse($this, $data);
    }
}
