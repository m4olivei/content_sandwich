<?php

namespace Drupal\content_sandwich\Plugin\ContentSandwichArtist;

use Drupal\Component\Utility\NestedArray;
use Drupal\content_sandwich\Plugin\ContentSandwichArtistBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\PluginFormInterface;

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
class EmojiEd extends ContentSandwichArtistBase implements PluginFormInterface {

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

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form['num_slices'] = [
      '#type' => 'number',
      '#title' => $this->t('Number of slices'),
      '#description' => $this->t('How much bread would you like?'),
      '#default_value' => $this->getConfiguration()['num_slices'],
    ];

    $form['bread'] = [
      '#type' => 'select',
      '#title' => $this->t('Bread'),
      '#description' => $this->t('Which tasty emoji would you like envelope your content?'),
      '#options' => [
        '🌭' => '🌭',
        '🍞' => '🍞',
        '🍔' => '🍔',
        '🌮' => '🌮',
        '🌯' => '🌯',
        '🍩' => '🍩',
      ],
      '#default_value' => $this->getConfiguration()['bread'],
    ];

    $form['sauce_level'] = [
      '#type' => 'number',
      '#title' => $this->t('Sauce level'),
      '#description' => $this->t('Just how saucy could one be if given the option?'),
      '#default_value' => $this->getConfiguration()['sauce_level'],
    ];

    $form['sauce'] = [
      '#type' => 'select',
      '#title' => $this->t('Sauce'),
      '#description' => $this->t('Choose from my wide selection of sauces.'),
      '#options' => [
        '🍝' => '🍝',
        '🍼' => '🍼',
        '🍾' => '🍾',
        '🦄' => '🦄',
        '😭' => '😭',
      ],
      '#default_value' => $this->getConfiguration()['sauce'],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateConfigurationForm(array &$form, FormStateInterface $form_state) {
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    $this->configuration = $form_state->getValues();
  }

}
