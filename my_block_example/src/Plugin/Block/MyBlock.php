<?php

namespace Drupal\my_block_example\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Url;

/**
 * Provides a block with a simple text.
 *
 * @Block(
 *   id = "my_block_example_block",
 *   admin_label = @Translation("My block"),
 * )
 */
class MyBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];

    // Get last 3 created content details.
    $latest_content = $this->get_latest_content();

    if (!empty($latest_content)) {
      foreach ($latest_content as $node) {
        // Generate link for each content.
        $build[$node->nid] = [
          '#type' => 'link',
          '#title' => $node->title,
          '#url' => Url::fromRoute('entity.node.canonical', ['node' => $node->nid]),
          '#prefix' => '<div>',
          '#suffix' => '</div>',
        ];
      }
    }

    if (!empty($build)) {
      return $build;
    }
    else {
      return [
        '#markup' => $this->t('No content exists!'),
      ];
    }
  }

  /**
   * {@inheritdoc}
   */
  protected function blockAccess(AccountInterface $account) {
    return AccessResult::allowedIfHasPermission($account, 'access content');
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $config = $this->getConfiguration();

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['my_block_settings'] = $form_state->getValue('my_block_settings');
  }

  /**
   * {@inheritdoc}
   */
  public function get_latest_content() {
    $result = \Drupal::database()->query('SELECT nid, title from node_field_data ORDER BY nid DESC limit 0, 3');
    return $result->fetchAll();
  }
}
