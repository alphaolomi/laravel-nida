<?php

namespace Alphaolomi\Nida;

class Nida
{
    protected $client;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }

    public function getClient()
    {
        return $this->client;
    }

    public function setClient($client)
    {
        $this->client = $client;
    }

    public function getUserData(string $nationalId): array
    {
        if (empty($nationalId)) {
            throw new \Exception('National ID is required.');
        }

        $url = 'https://ors.brela.go.tz/um/load/load_nida/' . $nationalId;

        $headers = ["Content-Type" => "application/json", "Content-Length" => "0", "Connection" => "keep-alive", "Accept-Encoding" => "gzip, deflate, br"];

        $response = $this->client->request('POST', $url, ['headers' => $headers]);

        $body = json_decode($response->getBody(), true);

        return $body["obj"];
    }
}
