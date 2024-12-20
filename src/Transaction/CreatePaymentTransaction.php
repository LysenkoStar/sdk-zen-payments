<?php

namespace ZenPayments\Transaction;

use ZenPayments\Contract\TransactionInterface;
use ZenPayments\Enum\RequestMethod;

/**
 *  Class for starting the transaction process
 */
class CreatePaymentTransaction implements TransactionInterface
{
    public function __construct(
        public array $data
    ) {
    }

    public function getMethod(): string
    {
        return RequestMethod::POST->value;
    }

    public function getUri(): string
    {
        return '/transactions';
    }

    public function getRequestData(): array
    {
        return $this->data;
    }

    public function getRequiredFields(): array
    {
       return [
           'amount',
           'currency',
           'channel',
           'merchantTransactionId',
           'paymentChannel',
           'name',
           'price',
           'quantity',
           'customer',
           'email',
           'ip',
       ];
    }
}