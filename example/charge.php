<?php

require 'vendor/autoload.php';

use Dotenv\Dotenv;
use ZenPayments\Enum\TransactionType;
use ZenPayments\Http\ZenClient;
use ZenPayments\Factory\RequestFactory;

// Load environment variables
Dotenv::createImmutable(__DIR__)->load();

$request_id = '1234556test';

$client = new ZenClient($request_id);
$transaction = RequestFactory::createRequest(TransactionType::CREATE_PAYMENT, [
    'amount' => 100.00,
    'currency' => 'USD',
    'description' => 'Test Payment',
]);

try {
    $response = $client->execute($transaction);
    print_r($response);
} catch (\Throwable $e) {
    echo 'Error: ' . $e->getMessage();
}