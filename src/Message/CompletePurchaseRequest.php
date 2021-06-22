<?php

namespace Omnipay\Payplug\Message;

use Omnipay\Common\Exception\InvalidResponseException;
use Payplug\Notification;
use Payplug\Resource\Payment;

/**
 * Payplug Complete Purchase Request
 */
class CompletePurchaseRequest extends AbstractRequest
{

    public function getData(): ?Payment
    {
        $input = $this->httpRequest->getContent();

        try {
            $resource = Notification::treat($input);
            if ($resource instanceof Payment) {
                return $resource;
            }
        } catch (\Payplug\Exception\PayplugException $exception) {
            echo htmlentities($exception);
        }

        return null;
    }

    public function sendData($data): CompletePurchaseResponse
    {
        return $this->response = new CompletePurchaseResponse($this, $data);
    }
}
