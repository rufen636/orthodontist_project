<?php

namespace App\Services;

use GuzzleHttp\Client;

class TinkoffService
{
    protected $client;
    protected $terminalKey;
    protected $secretKey;
    protected $apiUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->terminalKey = config('tinkoff.terminal_key');
        $this->secretKey = config('tinkoff.secret_key');
        $this->apiUrl = config('tinkoff.api_url');
    }

    // Метод для генерации подписи (важно для безопасности)
    private function generateSignature(array $params)
    {
        ksort($params);
        $signatureString = '';
        foreach ($params as $key => $value) {
            if ($value !== null && $key !== 'Shops') {
                $signatureString .= $value;
            }
        }
        return hash('sha256', $signatureString . $this->secretKey);
    }

    // Метод для отправки платежа
    public function initPayment($orderId, $amount, $description)
    {
        $params = [
            'TerminalKey' => $this->terminalKey,
            'Amount' => $amount, // В копейках
            'OrderId' => $orderId,
            'Description' => $description,
            'NotificationURL' => route('tinkoff.webhook'), // URL для уведомлений
        ];
        $params['Token'] = $this->generateSignature($params);

        $response = $this->client->post($this->apiUrl . 'Init', [
            'json' => $params,
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function checkPaymentStatus($orderId)
    {
        $params = [
            'TerminalKey' => $this->terminalKey,
            'OrderId' => $orderId,
        ];
        $params['Token'] = $this->generateSignature($params);

        $response = $this->client->post($this->apiUrl . 'GetState', [
            'json' => $params,
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    // Метод для проверки статуса платежа
    public function getPaymentStatus($paymentId)
    {
        $params = [
            'TerminalKey' => $this->terminalKey,
            'PaymentId' => $paymentId,
        ];
        $params['Token'] = $this->generateSignature($params);

        $response = $this->client->post($this->apiUrl . 'GetState', [
            'json' => $params,
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
