<?php

namespace Drupal\content_sandwich\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines a Content sandwich artist item annotation object.
 *
 * @see \Drupal\content_sandwich\Plugin\ContentSandwichArtistManager
 * @see plugin_api
 *
 * @Annotation
 */
class ContentSandwichArtist extends Plugin {


  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The label of the plugin.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $label;

}
