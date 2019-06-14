<?php

namespace Drupal\hello_world\Controller;

class HelloWorldController {
  public function hello() {
    $result = \Drupal::database()->query('SELECT count(uid) as total_user from users WHERE uid > :uid', [':uid' => 0]);
    $total_user = $result->fetchField();
    \Drupal::messenger()->addMessage(t('This is a Drupal site with @total_user users.', ['@total_user' => $total_user]), 'status');

    return array(
      '#title' => 'Hello World!',
      '#markup' => 'Here is some content.',
    );
  }
}
