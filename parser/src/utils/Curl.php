<?php

namespace src\utils;

final class Curl
{
    public const GET = 1;
    public const POST = 2;

    /** string */
    private string $url;
    /** @var array */
    private array $headers;

    /** @var mixed */
    private $result;

    public function __construct(string $url, array $headers = [])
    {
        $this->url = $url;
        $this->headers = $headers;
    }

    public function sendRequest(
        array $query,
        array $body,
        int $requestType
    ): void {
        $curl = curl_init($this->url.'?'.http_build_query($query));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->headers);

        if ($requestType === self::POST) {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt(
                $curl,
                CURLOPT_POSTFIELDS,
                http_build_query($body, '', '&')
            );
        }

        $this->result = curl_exec($curl);
        curl_close($curl);
    }

    public function sendGetRequest(array $query): void
    {
        $curl = curl_init($this->url.'?'.http_build_query($query));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->headers);
        $this->result = curl_exec($curl);
        curl_close($curl);
    }

    public function sendPostRequest(array $query, array $body): void
    {
        $curl = curl_init($this->url.'?'.http_build_query($query));
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt(
            $curl,
            CURLOPT_POSTFIELDS,
            http_build_query($body, '', '&')
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->headers);
        $this->result = curl_exec($curl);
        curl_close($curl);
    }

    public function getRowData()
    {
        return $this->result;
    }

    public function getData(): array
    {
        return json_decode($this->result, true);
    }
}