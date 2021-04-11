<?php

namespace App\Classe;

use Mailjet\Client;
use Mailjet\Resources;

class Mail
{
    private $api_key = '09f5bff65d6ffdc9e5460214a7377d98';
    private $api_key_secret = '8b08906a8ffe89249a01b015d34d1e2f';

    public function send($to_email , $to_name , $subject , $content)
    {
        $mj = new Client($this->api_key ,$this->api_key_secret,true,['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "adeltoumi019@gmail.com",
                        'Name' => "La Boutique BICC"
                    ],
                    'To' => [
                        [
                            'Email' => $to_email,
                            'Name' => $to_name
                        ]
                    ],
                    'TemplateID' => 2690685,
                    'TemplateLanguage' => true,
                    'Subject' => $subject,
                    'Variables' => [
                        'content' => $content,
                    ]
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success();
    }
}