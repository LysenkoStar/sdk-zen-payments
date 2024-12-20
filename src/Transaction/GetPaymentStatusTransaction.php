<?php

namespace ZenPayments\Transaction;

use ZenPayments\Contract\TransactionInterface;
use ZenPayments\Enum\RequestMethod;

class GetPaymentStatusTransaction implements TransactionInterface
{
    public function __construct(
        public string $merchantTransactionId,
    ) {
    }

    public function getMethod(): string
    {
        return RequestMethod::GET->value;
    }

    public function getUri(): string
    {
        return "/transactions/merchant/{$this->merchantTransactionId}";
    }

    public function getRequestData(): array
    {
        return [];
    }

    public function getRequiredFields(): array
    {
        return [];
    }
}