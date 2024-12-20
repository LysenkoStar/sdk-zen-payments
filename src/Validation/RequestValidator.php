<?php

namespace ZenPayments\Validation;

use InvalidArgumentException;
use ZenPayments\Contract\TransactionInterface;

class RequestValidator
{
    public static function validate(TransactionInterface $transaction): void
    {
        $requiredFields = $transaction->getRequiredFields();

        if (empty($requiredFields)) {
            return;
        }

        $missingFields = array_diff($transaction->getRequiredFields(), array_keys($transaction->getRequestData()));

        if (!empty($missingFields)) {
            throw new InvalidArgumentException('Missing required fields: ' . implode(', ', $missingFields));
        }
    }
}