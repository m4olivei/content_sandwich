<?php

namespace Drupal\content_sandwich\Entity;

use Drupal\Core\Config\Entity\ConfigEntityInterface;

/**
 * Provides an interface for defining Content sandwich entities.
 */
interface ContentSandwichInterface extends ConfigEntityInterface {

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

}
