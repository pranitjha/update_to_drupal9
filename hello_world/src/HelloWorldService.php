<?php
namespace Drupal\hello_world;

class HelloWorldService {
  public function getUserCount() {
    $result = db_query('SELECT count(uid) as total_user from users WHERE uid > :uid', [':uid' => 0]);
    $total_user = $result->fetchField();
    return $total_user;
  }
}