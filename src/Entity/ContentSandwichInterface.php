<?php

namespace Drupal\content_sandwich\Entity;

use Drupal\Core\Config\Entity\ConfigEntityInterface;
use Drupal\Core\Entity\EntityWithPluginCollectionInterface;

/**
 * Provides an interface for defining Content sandwich entities.
 */
interface ContentSandwichInterface extends ConfigEntityInterface, EntityWithPluginCollectionInterface {

  /**
   * Return the label.
   *
   * @return string
   *   The label.
   */
  public function getLabel();

  /**
   * Return the sandwich artist plugin ID.
   *
   * @return string
   *   The sandwich artist plugin ID.
   */
  public function getContentSandwichArtist();

  /**
   * Return the array of sandwich artist plugin settings.
   *
   * @return array
   *   An array of plugin settings.
   */
  public function getContentSandwichArtistSettings();

}
