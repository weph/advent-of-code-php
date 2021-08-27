<?php
declare(strict_types=1);

namespace AdventOfCode\Common;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;

final class InputLoader
{
    private const BASE_URL = 'https://adventofcode.com';

    private ClientInterface $client;

    private RequestFactoryInterface $requestFactory;

    private string $sessionToken;

    public function __construct(ClientInterface $client, RequestFactoryInterface $requestFactory, string $sessionToken)
    {
        $this->client         = $client;
        $this->requestFactory = $requestFactory;
        $this->sessionToken   = $sessionToken;
    }

    public function load(int $year, int $day): string
    {
        $request = $this->requestFactory
            ->createRequest('GET', sprintf('%s/%d/day/%d/input', self::BASE_URL, $year, $day))
            ->withHeader('Cookie', sprintf('session=%s', $this->sessionToken));

        return $this->client
            ->sendRequest($request)
            ->getBody()
            ->getContents();
    }
}
