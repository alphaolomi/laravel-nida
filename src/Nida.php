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

    public function getRaw(string $nationalId, $params = [])
    {
        if (empty($nationalId)) {
            throw new \Exception('National ID is required.');
        }

        $url = 'https://ors.brela.go.tz/um/load/load_nida/' . $nationalId;

        $headers = ["Content-Type" => "application/json", "Content-Length" => "0", "Connection" => "keep-alive", "Accept-Encoding" => "gzip, deflate, br"];

        $response = $this->client->request('POST', $url, ['headers' => $headers]);

        return   json_decode($response->getBody(), true);
    }

    public function getUserData()
    {
        return call_user_func_array("getRaw", func_get_args());
    }
}
