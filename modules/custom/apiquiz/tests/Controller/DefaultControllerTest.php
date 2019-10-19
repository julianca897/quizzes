<?php

namespace Drupal\apiquiz\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Provides automated tests for the apiquiz module.
 */
class DefaultControllerTest extends WebTestBase {


  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return [
      'name' => "apiquiz DefaultController's controller functionality",
      'description' => 'Test Unit for module apiquiz and controller DefaultController.',
      'group' => 'Other',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();
  }

  /**
   * Tests apiquiz functionality.
   */
  public function testDefaultController() {
    // Check that the basic functions of module apiquiz.
    $this->assertEquals(TRUE, TRUE, 'Test Unit Generated via Drupal Console.');
  }

}
