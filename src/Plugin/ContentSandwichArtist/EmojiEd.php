<?php

namespace Drupal\content_sandwich\Plugin\ContentSandwichArtist;

use Drupal\Component\Utility\NestedArray;
use Drupal\content_sandwich\Plugin\ContentSandwichArtistBase;

/**
 * Emoji Ed the sandwich artist.
 *
 * Creating content sandwiches from emojis!!
 *
 * @ContentSandwichArtist(
 *   id = "emoji_ed",
 *   label = "Emoji Ed"
 * )
 */
class EmojiEd extends ContentSandwichArtistBase {

  /**
   * {@inheritdoc}
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);

    $this->setConfiguration($configuration);
  }

  /**
   * {@inheritdoc}
   */
  public function getBread() {
    return str_repeat($this->configuration['bread'], $this->configuration['num_slices']);
  }

  /**
   * {@inheritdoc}
   */
  public function getSauce() {
    return str_repeat($this->configuration['sauce'], $this->configuration['sauce_level']);
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
  public function defaultConfiguration() {
    return [
      'num_slices' => 5,
      'bread' => '🍞',
      'sauce_level' => 5,
      'sauce' => '🍝',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function calculateDependencies() {
  }

}
