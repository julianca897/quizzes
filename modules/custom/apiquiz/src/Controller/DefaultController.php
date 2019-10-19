<?php

namespace Drupal\apiquiz\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class DefaultController.
 */
class DefaultController extends ControllerBase {

  /**
   * Hello.
   *
   * @return array
   *   Return Hello string.
   */
  public function getQuiz() {
    return [
      '#markup' => $this->t('Implement method: hello')
    ];
  }

}
