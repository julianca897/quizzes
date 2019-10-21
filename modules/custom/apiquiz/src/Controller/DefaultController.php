<?php

namespace Drupal\apiquiz\Controller;

use Drupal\apiquiz\Service\ApiCallService;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController.
 */
class DefaultController extends ControllerBase {

  /**
   * @var \Drupal\apiquiz\Service\ApiCallService
   */
  private $apiCallService;
  private $config;
  private $server;

  public function __construct(ApiCallService $apiCallService) {
    $this->apiCallService = $apiCallService;


  }

  public static function create(ContainerInterface $container) {
    return new static ($container->get('apiquiz.apicall'));
  }



  public function getQuiz() {
    $config = include 'modules/custom/apiquiz/src/Config/config.php';
    $server = $config['server']['url'];
    $nodeType = $config['quiz']['node'];

    $filterQuery = $config['quiz']['filters'];
    $fieldsQuery = $config['quiz']['fields'];
    $endpoint = "$server$nodeType?filter$filterQuery=1&fields[node--quiz]=$fieldsQuery";

    $getQuiz = $this->apiCallService->getResponse($endpoint, [], TRUE);
    $getTitleQuiz = $getQuiz['data'][0]['attributes']['title'];
    $getIdQuiz = $getQuiz['data'][0]['id'];

    /*$response = new Response();
    $response->setContent(json_encode($getQuizNode));
    $response->headers->set('Content-Type', 'application/json');

    return ($response);*/
    $jsonData = $this->getQuestions($getIdQuiz, $getTitleQuiz);
    return ($jsonData);

  }

  public function getQuestions($id, $titleQuiz) {
    $config = include 'modules/custom/apiquiz/src/Config/config.php';
    $server = $config['server']['url'];
    $nodeType = $config['quiz']['node'];


    $fieldsQuery = $config['questions']['fields'];
    $endpoint = "$server$nodeType/$id/field_paragraphs?fields[paragraph--question_answers]=$fieldsQuery";

    $getQuizNode = $this->apiCallService->getResponse($endpoint, [], TRUE);
    $getQuizNode['title'] = "$titleQuiz";

    $response = new Response();
    $response->setContent(json_encode($getQuizNode));
    $response->headers->set('Content-Type', 'application/json');

    return ($response);

  }

}
