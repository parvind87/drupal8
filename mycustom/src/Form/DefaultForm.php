<?php

namespace Drupal\mycustom\Form;

use Drupal\Core\Form\FormBase;
use Drupal\mycustom\MoviesManagerInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class DefaultForm.
 */
class DefaultForm extends FormBase {

  protected $movieManager;
 /**
   * Constructs a new MovieManager object.
   *
   * @param \Drupal\mycustom\MoviesManagerInterface $movie_manager
   */
  public function __construct(MoviesManagerInterface $movie_manager){
    $this->movieManager = $movie_manager;
  }

   /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('mycustom.movies_manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'movies_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $tableHeader = [
      'sr_no' => $this->t("Sr. No"),
      'id' => $this->t("ID"),
      'title' => $this->t("Title"),
      'created' => $this->t("Created"),
      'updated' => $this->t("Updated"),
      'status' => $this->t("Status"),
      // 'links' => $this->t("Links"),
    ];
    $result = $this->movieManager->findAll();
    //kint($result);
    foreach($result as $movie){
      $links = [];
      // $links['delete'] = [
      //   'title' => $this->t('Delete'),
      //   'url' => Url::fromRoute('ban.delete', ['ban_id' => $ip->iid]),
      // ];
      // $row[] = [
      //   'data' => [
      //     '#type' => 'operations',
      //     '#links' => $links,
      //   ],
      // ];
    $tableRows[$movie->id] = [
      'sr_no' => 1,
      'id' => $movie->id,
      'title' => $movie->title,
      'created' => $movie->created,
      'updated' => $movie->updated,
      'status' => ($movie->status==1)?$this->t("Active"):$this->t("Inactive")
      // 'delete'=>
      //   'data' => [
      //     '#type' => 'operations',
      //     '#links' => $links,
      ];
  }
    $form['movies'] = [
      '#type' => 'tableselect',
      '#title' => $this->t('movies'),
      '#header' => $tableHeader,
      '#options' => $tableRows,
      '#weight' => '0',
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    foreach ($form_state->getValues() as $key => $value) {
      // @TODO: Validate fields.
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
      \Drupal::messenger()->addMessage($key . ': ' . ($key === 'text_format'?$value['value']:$value));
    }
  }

}
