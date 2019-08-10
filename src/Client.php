<?php

namespace Hoverfly;

use Exception;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Hoverfly\Model\Simulation;
use Hoverfly\SimulationBuilder\Builder;
use JsonMapper;
use JsonMapper_Exception;
use Hoverfly\Model\Server;

/**
 * Class Client.
 */
class Client
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var JsonMapper
     */
    private $mapper;

    /**
     * Client constructor.
     *
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client = null)
    {
        $this->client = $client ?: new \GuzzleHttp\Client(['base_uri' => 'http://localhost:8888']);
        $this->mapper = new JsonMapper();
        $this->mapper->bEnforceMapType = false;
    }

    /**
     * @return Builder
     */
    public function createSimulationBuilder(): Builder
    {
        return new Builder();
    }

    /**
     * @param string $filepath
     * @return Simulation
     * @throws JsonMapper_Exception
     */
    public function loadSimulationFromFile(string $filepath): Simulation
    {
        if (!file_exists($filepath)) {
            throw new Exception(sprintf('File %s does not exist', $filepath));
        }

        $content = file_get_contents($filepath);
        $json = json_decode($content, true);

        return $this->mapper->map($json, new Simulation());
    }

    /**
     * @param string $method
     * @param string $path
     * @param array  $options
     *
     * @return array
     *
     * @throws GuzzleException
     */
    private function sendJsonRequest(string $method, string $path, array $options = []): array
    {
        $response = $this->client->request($method, $path, $options);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @param string $path
     * @param array  $options
     *
     * @return array
     *
     * @throws GuzzleException
     */
    private function getJson(string $path, array $options = []): array
    {
        return $this->sendJsonRequest('GET', $path, $options);
    }

    /**
     * @param string $path
     * @param array  $options
     *
     * @return array
     *
     * @throws GuzzleException
     */
    private function postJson(string $path, array $options = [])
    {
        return $this->sendJsonRequest('POST', $path, $options);
    }

    /**
     * @param string $path
     * @param array  $options
     *
     * @return array
     *
     * @throws GuzzleException
     */
    private function putJson(string $path, array $options = [])
    {
        return $this->sendJsonRequest('PUT', $path, $options);
    }

    /**
     * @param string $path
     * @param array  $options
     *
     * @return array
     *
     * @throws GuzzleException
     */
    private function deleteJson(string $path, array $options = [])
    {
        return $this->sendJsonRequest('DELETE', $path, $options);
    }

    /**
     * @return Server
     *
     * @throws GuzzleException
     * @throws JsonMapper_Exception
     */
    public function getServer(): Server
    {
        $response = $this->getJson('/api/v2/hoverfly');

        return $this->mapper->map($response, new Server());
    }

    /**
     * @return string
     * @throws GuzzleException
     */
    public function getDestination(): string
    {
        $response = $this->getJson('/api/v2/hoverfly/destination');

        return $response['destination'];
    }

    /**
     * @param string $destination
     * @return string
     * @throws GuzzleException
     */
    public function updateDestination(string $destination): string
    {
        $options = ['json' => ['destination' => $destination]];
        $response = $this->putJson('/api/v2/hoverfly/destination', $options);

        return $response['destination'];
    }

    /**
     * @param Simulation $simulation
     * @return Simulation
     * @throws GuzzleException
     * @throws JsonMapper_Exception
     */
    public function uploadSimulation(Simulation $simulation): Simulation
    {
        $response = $this->putJson('/api/v2/simulation', ['json' => $simulation]);

        return $this->mapper->map($response, new Simulation());
    }

    /**
     * @param string $filename
     * @return Simulation
     * @throws JsonMapper_Exception
     */
    public function uploadSimulationFromFile(string $filename): Simulation
    {
        $simulation = $this->loadSimulationFromFile($filename);
        return $this->uploadSimulation($simulation);
    }

    public function deleteSimulation(): Simulation
    {
        $response = $this->deleteJson('/api/v2/simulation');

        return $this->mapper->map($response, new Simulation());
    }
}
