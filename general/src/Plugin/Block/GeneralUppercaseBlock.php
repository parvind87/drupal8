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
  	//$form['#attached']['library'][] = 'general/general.search';
    //$form['#attached']['library'][] = 'general/general.css';   

	$result = db_select('node', 'n')
	->fields('n', array(
	'nid',
	))
	->orderBy('n.nid', 'DESC')
	->range(0, 10)
	->execute()->fetchAll();
	//$record = $result;
	//print_r($record);exit; // // ->condition('n.uid', $uid)

$build['article_list'] = array(
          '#theme' => 'articles',
          '#items' => $result,
          //'#pager' => $pager,
          //'#sorting' => $sorting_html,
          //'#tabs_html' => $tabs_html,
          //'#wrap_prefix' => $wrap_prefix,
          //'#wrap_suffix' => $wrap_suffix,
          '#no_records_text' => 'No records found for your search',
          //'#cache' => array('max-age' => 0),
		  '#attached' => array(
				'library' => array(
					'general/general.search','general/general.css'
				),
			),
      );
return $build;
  /*  return [
      '#markup' => $this->t("Data."),
    ];*/
  }

}
