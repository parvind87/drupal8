<?php

namespace Drupal\mycustom;

use Drupal\Core\Database\Connection;

/**
 * Ban IP manager.
 */
class MoviesManager implements MoviesManagerInterface {

  /**
   * The database connection used to check the IP against.
   *
   * @var \Drupal\Core\Database\Connection
   */
  protected $connection;

  /**
   * Construct the BanSubscriber.
   *
   * @param \Drupal\Core\Database\Connection $connection
   *   The database connection which will be used to check the IP against.
   */
  public function __construct(Connection $connection) {
    $this->connection = $connection;
  }

  /**
   * {@inheritdoc}
   */
  public function isExists($ip) {
    return (bool) $this->connection->query("SELECT * FROM {movies} WHERE ip = :ip", [':ip' => $ip])->fetchField();
  }

  /**
   * {@inheritdoc}
   */
  public function findAll() {
    return $this->connection->query('SELECT * FROM {movies}');
  }

  /**
   * {@inheritdoc}
   */
  public function addMovie($ip) {
    $this->connection->merge('movies')
      ->key(['title' => $ip])
      ->fields(['title' => $ip])
      ->execute();
  }

  /**
   * {@inheritdoc}
   */
  public function deleteMovie($id) {
    $this->connection->delete('movies')
      ->condition('title', $id)
      ->execute();
  }

  /**
   * {@inheritdoc}
   */
  public function findById($ban_id) {
    return $this->connection->query("SELECT title FROM {movies} WHERE title = :title", [':title' => $ban_id])->fetchField();
  }

}
