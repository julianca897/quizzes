<?php

namespace Drupal\apiquiz\Service;

use \GuzzleHttp\ClientInterface;
use \Exception;
use Psr\Log\LoggerInterface;

/**
 * Class CallService.
 *
 * @package Drupal\apiquiz\Service
 */
class ApiCallService implements ApicallInterface {

  /**
   * @var \GuzzleHttp\ClientInterface
   */
  private $client;

  /**
   * @var \Psr\Log\LoggerInterface
   */
  private $logger;

  private $apiUrl;

  /**
   * Constructs a new ApiCallService object.
   */
  public function __construct(ClientInterface $client, LoggerInterface $logger) {

    $this->client = $client;
    $this->logger = $logger;

  }

  public function getResponse($endpoint, $arguments) {

    $request = NULL;
    try {
      $request = $this->client->get($endpoint, [], TRUE);
      $this->logger->error($endpoint);
    }
    catch (Exception $exception){
      $this->logger->error($exception);

    }

    if ($request != NULL) {
      if (200 == $request->getStatusCode()) {
        return json_decode($request->getBody(), TRUE);
      }
    }

    return NULL;
  }

}
