<?php

namespace Drupal\general\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Annotation\Plugin;

/**
 * Provides a 'Example: uppercase this please' block.
 *
 * @Block(
 *   id = "general_uppercase_block",
 *   admin_label = @Translation("General: uppercase this please")
 * )
 */
class GeneralUppercaseBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#markup' => $this->t("This block's title is changed to uppercase. Any block title which contains 'uppercase' will also be changed to uppercase."),
    ];
  }

}
