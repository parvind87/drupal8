<?php

namespace Drupal\mycustom;

/**
 * Provides an interface defining a BanIp manager.
 */
interface MoviesManagerInterface {

  /**
   * Returns if this IP address is banned.
   *
   * @param string $ip
   *   The IP address to check.
   *
   * @return bool
   *   TRUE if the IP address is banned, FALSE otherwise.
   */
  public function isExists($ip);

  /**
   * Finds all banned IP addresses.
   *
   * @return \Drupal\Core\Database\StatementInterface
   *   The result of the database query.
   */
  public function findAll();

  /**
   * Bans an IP address.
   *
   * @param string $ip
   *   The IP address to ban.
   */
  public function addMovie($ip);

  /**
   * Unbans an IP address.
   *
   * @param string $id
   *   The IP address to unban.
   */
  public function deleteMovie($id);

  /**
   * Finds a banned IP address by its ID.
   *
   * @param int $ban_id
   *   The ID for a banned IP address.
   *
   * @return string|false
   *   Either the banned IP address or FALSE if none exist with that ID.
   */
  public function findById($ban_id);

}
