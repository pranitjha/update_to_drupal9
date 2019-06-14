<?php

namespace Drupal\hello_world\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Connection;
use Symfony\Component\DependencyInjection\ContainerInterface;


class HelloWorldController extends ControllerBase {

  /**
   * @var \Drupal\Core\Database\Connection
   */
  protected $connection;

  public function __construct(Connection $connection) {
    $this->connection = $connection;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('database')
    );
  }

  public function hello() {
    $result = $this->connection->query('SELECT count(uid) as total_user from users WHERE uid > :uid', [':uid' => 0]);
    $total_user = $result->fetchField();
    $this->messenger()->addStatus($this->t('This is a Drupal site with @total_user users.', ['@total_user' => $total_user]));

    return [
      '#title' => 'Hello World!',
      '#markup' => 'Here is some content.',
    ];
  }
}
