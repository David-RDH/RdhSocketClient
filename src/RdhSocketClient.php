<?php

namespace RdhArchipoint;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class RdhSocketClient {

    /**
     * app_id varchar
     * app_name varchar
     * token varchar
     */
    private $options;
    private $hosts = "https://rdh-websocket.onrender.com";
    private $client;
    private $next = false;

    public function __construct($options)
    {
        $this->options = $options;
        $this->client = new Client();
    }

    public function emit($channel_name, $event_name, $data) {
        $datas = [
            "channel" => $this->options['app_id']."_".$channel_name,
            "event" => $event_name,
            "data" => $data
        ];

        try {
            $response = $this->client->post($this->hosts."/api/v2/emit",[
                'headers' => [
                    'Authorization' => 'Rsocket ' . $this->options['token'],
                    'Accept' => 'application/json',
                ],
                'json' => $datas
            ]);

            if ($response->getStatusCode() == 200 && json_decode($response->getBody())) {
                return [
                    'status' => true,
                    'error' => null
                ];
            } else {
                return [
                    'status' => false,
                    'error' => "Unautorized"
                ];
            }
            
        } catch (RequestException $e) {
            return [
                'status' => false,
                'error' => $e->getMessage()
            ];
        }

    }

}