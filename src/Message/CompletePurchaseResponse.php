<?php

namespace Omnipay\Payplug\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * Payplug Complete Purchase Response
 */
class CompletePurchaseResponse extends AbstractResponse
{
    public function isSuccessful()
    {
        return $this->data->is_paid;
    }


    public function getTransactionReference()
    {
        return $this->data->id ?? null;
    }

    public function getOrderId()
    {
        return $this->data->metadata['order_id'] ?? null;
    }

    public function getAmount()
    {
        return isset($this->data->amount) ? $this->data->amount : null;
    }

    public function getTransactionDate()
    {
        return $this->data->paid_at ?? null;
    }
}
