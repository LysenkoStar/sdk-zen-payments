<?php

namespace ZenPayments\Contract;

interface TransactionInterface
{
    public function getMethod(): string;
    public function getUri(): string;
    public function getRequestData(): array;
    public function getRequiredFields(): array;
}