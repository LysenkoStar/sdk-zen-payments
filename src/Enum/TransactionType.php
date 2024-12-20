<?php

namespace ZenPayments\Enum;

enum TransactionType: string
{
    case CREATE_PAYMENT = 'create_payment';
    case PAYMENT_STATUS = 'payment_status';
    case REFUND         = 'refund';
}
