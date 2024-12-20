<?php

namespace ZenPayments\Transaction;

use ZenPayments\Contract\TransactionInterface;
use ZenPayments\Enum\RequestMethod;

class RefundTransaction implements TransactionInterface
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
        return "/transactions/refund";
    }

    public function getRequestData(): array
    {
        return $this->data;
    }

    public function getRequiredFields(): array
    {
        return [
            'amount',
            'transactionId',
            'currency',
            'merchantTransactionId',
            'channel',
        ];
    }
}