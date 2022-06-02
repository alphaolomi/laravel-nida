<?php

namespace Alphaolomi\Nida;

/**
 * Nida class
*/
class Nida
{
    protected $client;
    protected $data;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }

    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param \GuzzleHttp\Client $client
     * @return Nida
     */
    public function setClient($client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * Get user data from NIDA.
     * @param string $nationalId
     * @return array
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \InvalidArgumentException
     *
     *
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

     /**  Query */
    public function query(string $nationalId)
    {
        // TODO: remve validaions with function
        // check if is array of strings
        // check id is int
        //
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

        $this->data = $body["obj"];

        return $this;
    }

    public function isValidId($nationalId){

        if (empty($nationalId)) {
            throw new \InvalidArgumentException('National ID is required.');
        }

        if (strlen($nationalId) != 20) {
            throw new \InvalidArgumentException('National ID must be 20 digits without hyphens.');
        }

        if (!is_numeric($nationalId)) {
            throw new \InvalidArgumentException('National ID must be numeric.');
        }

        return $nationalId;
    }

    public function toJSON(){
        return json_encode($this->data);
    }

    public function toModel() {
        return new User($this->data);
    }

    public function toCollection() {
        return new collect($this->data);
    }
}
