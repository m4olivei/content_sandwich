<?php

namespace Drupal\content_sandwich\Plugin\ContentSandwichArtist;

use Drupal\Component\Utility\NestedArray;
use Drupal\content_sandwich\Plugin\ContentSandwichArtistBase;

/**
 * Make an ASCII sandwich.
 *
 * @ContentSandwichArtist(
 *   id = "ascii_anne",
 *   label = "ASCII Anne"
 * )
 */
class AsciiAnne extends ContentSandwichArtistBase {

  /**
   * {@inheritdoc}
   */
  public function getBread() {
    return '<pre><code>
                          ____
              .----------\'    \'-.
             /  .      \'     .   \\
            /        \'    .      /|
           /      .             \ /
          /  \' .       .     .  || 
         /.___________    \'    / /
         |._          \'------\'| /
         \'.............______.-\'  
</code></pre>';
  }

  /**
   * {@inheritdoc}
   */
  public function getSauce() {
    return '<pre><code>
         ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~
         ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~
</code></pre>';
  }

  /**
   * {@inheritdoc}
   */
  public function getConfiguration() {
    return $this->configuration;
  }

  /**
   * {@inheritdoc}
   */
  public function setConfiguration(array $configuration) {
    $this->configuration = NestedArray::mergeDeep(
      $this->defaultConfiguration(),
      $configuration
    );
  }

  /**
   * {@inheritdoc}
   */
  public function calculateDependencies() {
    // This plugin has no additional dependencies.
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [];
  }

}
