<?php

namespace Omnipay\Payplug\Message;

use Omnipay\Common\CreditCard;

/**
 * Payplug Purchase Request
 */
class PurchaseRequest extends AbstractRequest
{
    /** @var CreditCard */
    protected $card;

    /**
     *
     */
    public function getData()
    {
        $payplug = $this->getPayplug();
        $this->card = $this->getCard();

        /***/
        $data = [];
        $data['amount'] = $this->getAmountInteger() * 100;
        $data['currency']  = $this->getCurrency();

        if ($this->card) {
            $data['billing'] = [
                'title' => $this->card->getBillingTitle(),
                'first_name' => $this->card->getBillingFirstName(),
                'last_name' => $this->card->getBillingLastName(),
                'email' => $this->card->getEmail(),
                'address1' => $this->card->getBillingAddress1(),
                'postcode' => $this->card->getBillingPostcode(),
                'city' => $this->card->getBillingCity(),
                'country' => $this->card->getBillingCountry(),
                'language' => 'fr'
            ];
            $data['shipping'] = [
                'title' => $this->card->getShippingTitle(),
                'first_name' => $this->card->getShippingFirstName(),
                'last_name' => $this->card->getShippingLastName(),
                'email' => $this->card->getEmail(),
                'address1' => $this->card->getShippingAddress1(),
                'postcode' => $this->card->getShippingPostcode(),
                'city' => $this->card->getShippingCity(),
                'country' => $this->card->getShippingCountry(),
                'language' => 'fr',
                'delivery_type' => 'BILLING'
            ];
        }
        $data['hosted_payment'] = [
            'return_url'     => $this->getSuccessUrl(),
            'cancel_url'     => $this->getCancelUrl()
        ];

        $data['notification_url'] = $this->getNotifyUrl();
        $data['metadata'] = [
            'customer_id'    => $customer_id
        ];

        $payment = $payplug::init($data);

        return [
            'url' => $payment->hosted_payment->payment_url
        ];
    }

    public function sendData($data)
    {
        return $this->response = new PurchaseResponse($this, $data);
    }
}
