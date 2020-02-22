<?php

namespace Drupal\article_queue\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class DefaultSubscriber.
 */
class DefaultSubscriber implements EventSubscriberInterface {

  /**
   * Constructs a new DefaultSubscriber object.
   */
  public function __construct() {

  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events['config.save'] = ['configSave'];
    $events['config.delete'] = ['configDelete'];

    return $events;
  }

  /**
   * This method is called when the config.save is dispatched.
   *
   * @param \Symfony\Component\EventDispatcher\Event $event
   *   The dispatched event.
   */
  public function configSave(Event $event) {
    $log_array = array('test','test2');
    \Drupal::messenger()->addMessage('Event config.save thrown by Subscriber in module article_queue.', 'status', TRUE);
    \Drupal::logger('article_queue')->notice('<pre><code>' . print_r($log_array, TRUE) . '</code></pre>');
  }

  /**
   * This method is called when the config.delete is dispatched.
   *
   * @param \Symfony\Component\EventDispatcher\Event $event
   *   The dispatched event.
   */
  public function configDelete(Event $event) {
    \Drupal::messenger()->addMessage('Event config.delete thrown by Subscriber in module article_queue.', 'status', TRUE);
  }

}
