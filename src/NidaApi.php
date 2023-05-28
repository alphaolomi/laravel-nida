<?php

declare(strict_types=1);

namespace Nida;

use Generator;
use Saloon\Http\Connector;
use Saloon\Contracts\Request as RequestContract;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Response;

class GetUserInfo extends Request
{
    protected Method $method = Method::POST;

    public function __construct(
        protected string $id,
    ) { }

    public function resolveEndpoint(): string
    {
        return $this->id;
    }


}

class NidaApi extends Connector
{
    /**
     * @return string
     */
    public function resolveBaseUrl(): string
    {
        return 'https://ors.brela.go.tz/um/load/load_nida/';
    }

    /**
     * @return string[]
     */
    protected function defaultHeaders(): array
    {
        $headers = ["Content-Type" => "application/json", "Content-Length" => "0", "Connection" => "keep-alive", "Accept-Encoding" => "gzip, deflate, br"];

        return $headers;
    }

      /**
     * Get user data from NIDA.
     * @param string $nationalId
     * @return array
     */
    public function getUserData(string $nationalId): array
    {
        self::checkNationalId($nationalId);

        $response = $this->fetch($nationalId);

        $body = json_decode($response->getBody(), true);

        return $body["obj"];
    }

    // fetch data from NIDA
    public function fetch(string $nationalId): Response
    {
        self::checkNationalId($nationalId);

        $response = $this->send(new GetUserInfo($nationalId));

        $response->onError(function (Response $response) {
            // TODO: Handle error
            // https://docs.saloon.dev/the-basics/handling-failures
        });

        $body = json_decode($response->getBody(), true);
    }

    public static function checkNationalId(string $nationalId): bool
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

        return true;
    }

}
