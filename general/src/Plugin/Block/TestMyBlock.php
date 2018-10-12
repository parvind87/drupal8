<?php
/**
 * Provides a 'Test My' Block
 *
 * @Block(
 *   id = "test_my_block",
 *   admin_label = @Translation("Teest My block"),
 * )
 * 
 * Note: The class name and the file name must be the same 
 * ( class AdvSearchBlock and /src/Plugin/Block/AdvSearchBlock.php). 
 * If the class name is different, 
 * the block will appear in the list of available blocks, 
 * however you will not be able to add it.
 */

namespace Drupal\general\Plugin\Block;
use Drupal\Core\Block\BlockBase;
//use Drupal\Core\Form\FormStateInterface;
//use Drupal\Component\Annotation\Plugin;

class TestMyBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#markup' => $this->t("Test my block"),
    ];
  }

}
