<?php

namespace Hoverfly;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Hoverfly\Model\Journal;
use Hoverfly\Model\Middleware;
use Hoverfly\Model\Request;
use Hoverfly\Model\Server;
use Hoverfly\Model\Simulation;
use Hoverfly\SimulationBuilder\Builder;
use Hoverfly\SimulationBuilder\StubServiceBuilder;

/**
 * Class Client.
 */
class Client
{
    private ClientInterface $client;

    private \JsonMapper $mapper;

    private array $defaultOptions = [
        'base_uri' => 'http://localhost:8888',
    ];

    /**
     * @throws GuzzleException
     */
    private function sendJsonRequest(string $method, string $path, array $options = []): array
    {
        $response = $this->client->request($method, $path, $options);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @throws GuzzleException
     */
    private function getJson(string $path, array $options = []): array
    {
        return $this->sendJsonRequest('GET', $path, $options);
    }

    /**
     * @return array
     *
     * @throws GuzzleException
     */
    private function postJson(string $path, array $options = []): array
    {
        return $this->sendJsonRequest('POST', $path, $options);
    }

    /**
     * @return array
     *
     * @throws GuzzleException
     */
    private function putJson(string $path, array $options = []): array
    {
        return $this->sendJsonRequest('PUT', $path, $options);
    }

    /**
     * @return array
     *
     * @throws GuzzleException
     */
    private function deleteJson(string $path, array $options = []): array
    {
        return $this->sendJsonRequest('DELETE', $path, $options);
    }

    /**
     * Client constructor.
     *
     * @param array $options Guzzle client options
     */
    public function __construct(array $options = [])
    {
        $this->client = new GuzzleHttpClient(array_merge($this->defaultOptions, $options));
        $this->mapper = new \JsonMapper();
        $this->mapper->bEnforceMapType = false;
    }

    public function buildSimulation(): Builder
    {
        return new Builder();
    }

    /**
     * @throws \JsonMapper_Exception
     * @throws \Exception
     */
    public function loadSimulationFromFile(string $filepath): Simulation
    {
        if (!file_exists($filepath)) {
            throw new \Exception(sprintf('File %s does not exist', $filepath));
        }

        $content = file_get_contents($filepath);
        $json = json_decode($content, true);

        return $this->mapper->map($json, new Simulation());
    }

    /**
     * @throws GuzzleException
     * @throws \JsonMapper_Exception
     */
    public function getServer(): Server
    {
        $response = $this->getJson('/api/v2/hoverfly');

        return $this->mapper->map($response, new Server());
    }

    /**
     * @throws GuzzleException
     * @throws \JsonMapper_Exception
     */
    public function getMiddleware(): Middleware
    {
        $response = $this->getJson('/api/v2/hoverfly/middleware');

        return $this->mapper->map($response, new Middleware());
    }

    /**
     * @throws GuzzleException
     * @throws \JsonMapper_Exception
     */
    public function updateMiddleware(Middleware $middleware): Middleware
    {
        $response = $this->putJson('/api/v2/hoverfly/middleware', ['json' => $middleware]);

        return $this->mapper->map($response, new Middleware());
    }

    /**
     * @throws GuzzleException
     */
    public function getDestination(): string
    {
        $response = $this->getJson('/api/v2/hoverfly/destination');

        return $response['destination'];
    }

    /**
     * @throws GuzzleException
     */
    public function updateDestination(string $destination): string
    {
        $options = ['json' => ['destination' => $destination]];
        $response = $this->putJson('/api/v2/hoverfly/destination', $options);

        return $response['destination'];
    }

    /**
     * @throws GuzzleException
     * @throws \JsonMapper_Exception
     */
    public function uploadSimulation(Simulation $simulation): Simulation
    {
        $response = $this->putJson('/api/v2/simulation', ['json' => $simulation]);

        return $this->mapper->map($response, new Simulation());
    }

    /**
     * @throws GuzzleException
     * @throws \JsonMapper_Exception
     */
    public function appendSimulation(Simulation $simulation): Simulation
    {
        $response = $this->postJson('/api/v2/simulation', ['json' => $simulation]);

        return $this->mapper->map($response, new Simulation());
    }

    /**
     * @throws GuzzleException
     * @throws \JsonMapper_Exception
     */
    public function uploadSimulationFromFile(string $filename): Simulation
    {
        $simulation = $this->loadSimulationFromFile($filename);

        return $this->uploadSimulation($simulation);
    }

    /**
     * @throws GuzzleException
     * @throws \JsonMapper_Exception
     */
    public function deleteSimulation(): Simulation
    {
        $response = $this->deleteJson('/api/v2/simulation');

        return $this->mapper->map($response, new Simulation());
    }

    public function getSimulation(): Simulation
    {
        $response = $this->getJson('/api/v2/simulation');

        return $this->mapper->map($response, new Simulation());
    }

    /**
     * @throws GuzzleException
     * @throws \JsonMapper_Exception
     */
    public function simulate(StubServiceBuilder ...$builders): Simulation
    {
        $simulation = new Simulation();

        foreach ($builders as $builder) {
            foreach ($builder->getRequestResponsePairs() as $pair) {
                $simulation->getData()->addPair($pair);
            }

            foreach ($builder->getDelaySettings() as $delaySettings) {
                $simulation->getData()->getGlobalActions()->addDelaySettings($delaySettings);
            }
        }

        return $this->uploadSimulation($simulation);
    }

    public function getJournal(): Journal
    {
        $response = $this->getJson('/api/v2/journal');

        return $this->mapper->map($response, new Journal());
    }

    public function deleteJournal(): Journal
    {
        $response = $this->deleteJson('/api/v2/journal');

        return $this->mapper->map($response, new Journal());
    }

    public function searchJournal(Request $requestMatcher): Journal
    {
        $response = $this->postJson('/api/v2/journal', ['json' => ['request' => $requestMatcher]]);

        return $this->mapper->map($response, new Journal());
    }
}
