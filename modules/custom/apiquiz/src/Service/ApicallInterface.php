<?php

namespace Drupal\apiquiz\Service;

/**
 * Interface ApicallInterface.
 */
interface ApicallInterface {
  public function getResponse($endpoint, $arguments);

}
