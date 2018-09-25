<?php
namespace Drupal\general\Controller;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Drupal\examples\Utility\DescriptionTemplateTrait;
class GeneralController extends ControllerBase {
	 public function home_page() { 
		return [
		'#markup' => '<p>' . $this->t('Simple page: The quick brown fox jumps over the lazy dog.') . '</p>',
		];
	 }
	  public function home_page_args() {
	  	//Getting Path 
	  	$current_path = \Drupal::service('path.current')->getPath();
	  	
	  	//Getting URI 
	  	$current_uri = \Drupal::request()->getRequestUri();

		return [
		'#markup' => '<p>' . $current_uri.'test'.$current_path.$this->t('Simple page with arguements: The quick brown fox jumps over the lazy dog.') . '</p>',
		];
	 }

}