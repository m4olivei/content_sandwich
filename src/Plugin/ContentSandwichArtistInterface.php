<?php

namespace Drupal\content_sandwich\Plugin;

use Drupal\Component\Plugin\ConfigurablePluginInterface;
use Drupal\Component\Plugin\PluginInspectionInterface;

/**
 * Defines an interface for Content sandwich artist plugins.
 */
interface ContentSandwichArtistInterface extends PluginInspectionInterface, ConfigurablePluginInterface {

  /**
   * Get the bread for the content sandwich.
   *
   * The bread will be placed before and after the content to form a delicious
   * content sandwich.
   *
   * @return string
   *   Delicious textual bread for the content sandwich.
   */
  public function getBread();

  /**
   * Get the sauce for the content sandwich.
   *
   * What's a sandwich without sauce?! Surly that's no sandwich.
   *
   * The sauce will be placed beneath the top bun.
   *
   * @return string
   *   Yummy textual sauce for the content sandwich.
   */
  public function getSauce();

}
