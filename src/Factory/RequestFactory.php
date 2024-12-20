<?php

namespace ZenPayments\Factory;

use InvalidArgumentException;
use ZenPayments\Contract\TransactionInterface;
use ZenPayments\Enum\TransactionType;
use ZenPayments\Transaction\CreatePaymentTransaction;
use ZenPayments\Transaction\GetPaymentStatusTransaction;
use ZenPayments\Transaction\RefundTransaction;
use ZenPayments\Validation\RequestValidator;

class RequestFactory
{
    public function __construct(
        public RequestValidator $validator,
    ) {
    }

    public static function createRequest(TransactionType $type, array $data = []): TransactionInterface
    {
        return match ($type) {
            TransactionType::CREATE_PAYMENT => new CreatePaymentTransaction(data: $data),
            TransactionType::REFUND         => new RefundTransaction($data),
            TransactionType::PAYMENT_STATUS => new GetPaymentStatusTransaction($data['merchantTransactionId']),
            default => throw new InvalidArgumentException("Invalid request type: $type->value"),
        };
    }
}