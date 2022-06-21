<?php declare(strict_types=1);

namespace PandaGroup\SubunoApi;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use PandaGroup\SubunoApi\Contract\ConfigInterface;
use Psr\Http\Message\ResponseInterface;

class Client
{
    private ?ClientInterface $client = null;
    private ConfigInterface $config;

    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
    }

    /**
     * @throws GuzzleException
     */
    public function execute(array $query): ResponseInterface
    {
        $client = $this->getClient();
        $query['apikey'] = $this->config->getApiKey();
        $uri = DIRECTORY_SEPARATOR . $this->config->getApiVersion() . DIRECTORY_SEPARATOR;

        return $client->get($uri, ['query' => $query]);
    }

    private function getClient(): ClientInterface
    {
        if (null === $this->client) {
            $this->client = new GuzzleClient([
                'base_uri' => $this->buildBaseUri(),
                'headers' => ['Content-Type' => 'application/json'],
            ]);
        }
        return $this->client;
    }

    private function buildBaseUri(): string
    {
        return rtrim($this->config->getBaseUri(), '/');
    }
}