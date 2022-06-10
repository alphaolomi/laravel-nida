<?php

namespace Alphaolomi\Nida;

/**
 * Nida Class
 */
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

    /**
     * Set the Client
     * @param \GuzzleHttp\Client $client
     * @return Nida
     */
    public function setClient($client): Nida
    {
        $this->client = $client;
        return $this;
    }

    /**
     * Get user data from NIDA.
     * @param string $nationalId
     * @return array
     */
    public function getUserData(string $nationalId): array
    {
        if (empty($nationalId)) {
            throw new \InvalidArgumentException('National ID is required.');
        }

        if (strlen($nationalId) != 20) {
            throw new \InvalidArgumentException('National ID must be 20 digits without hyphens.');
        }

        if (!is_numeric($nationalId)) {
            throw new \InvalidArgumentException('National ID must be numeric.');
        }

        $url = 'https://ors.brela.go.tz/um/load/load_nida/' . $nationalId;

        $headers = ["Content-Type" => "application/json", "Content-Length" => "0", "Connection" => "keep-alive", "Accept-Encoding" => "gzip, deflate, br"];

        $response = $this->client->request('POST', $url, ['headers' => $headers]);

        $body = json_decode($response->getBody(), true);

        return $body["obj"];
    }
}
