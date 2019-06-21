<?php

namespace Drupal\hello_world;

use Drupal\Core\Database\Connection;

class HelloWorldService {

  /**
   * Database connection.
   *
   * @var \Drupal\Core\Database\Connection.
   */
  protected $connection;

  /**
   * HelloWorldService constructor.
   *
   * @param \Drupal\Core\Database\Connection $connection
   *   Database connection.
   */
  public function __construct(Connection $connection) {
    $this->connection = $connection;
  }

  /**
   * Get total user count.
   *
   * @return mixed
   *   Total user count.
   */
  public function getUserCount() {
    $result = $this->connection->query('SELECT count(uid) as total_user from users WHERE uid > :uid', [':uid' => 0]);
    $total_user = $result->fetchField();
    return $total_user;
  }

}
