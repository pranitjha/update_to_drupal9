<?php

namespace Drupal\hello_world\Controller;

class HelloWorldController {
  public function hello() {
    $result = db_query('SELECT count(uid) as total_user from users WHERE uid > :uid', [':uid' => 0]);
    $total_user = $result->fetchField();
    drupal_set_message(t('This is a Drupal site with @total_user users.', ['@total_user' => $total_user]), 'status');

    return array(
      '#title' => 'Hello World!',
      '#markup' => 'Here is some content.',
    );
  }
}
