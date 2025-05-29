<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;

class TelegramBot extends BaseController
{
    public function webhook()
    {
        $data = $this->request->getJSON(true); // Recebe JSON do Telegram

        $chatId = $data['message']['chat']['id'] ?? null;
        $message = $data['message']['text'] ?? '';

        if ($chatId && $message) {
            $responseText = "Você disse: " . $message;

            $this->sendMessage($chatId, $responseText);
        }

        return $this->response->setJSON(['status' => 'ok']);
    }

    private function sendMessage($chatId, $text)
    {
        $token = 'SEU_TOKEN_AQUI'; // Coloque seu token do BotFather

        $url = "https://api.telegram.org/bot{$token}/sendMessage";

        $client = \Config\Services::curlrequest();
        $client->post($url, [
            'form_params' => [
                'chat_id' => $chatId,
                'text'    => $text,
            ],
        ]);
    }
}
