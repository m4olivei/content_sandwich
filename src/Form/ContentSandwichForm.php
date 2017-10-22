<?php

namespace Drupal\content_sandwich\Form;

use Drupal\content_sandwich\Plugin\ContentSandwichArtistManager;
use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class ContentSandwichForm.
 */
class ContentSandwichForm extends EntityForm {

  /**
   * Sandwich artist manager.
   *
   * @var \Drupal\content_sandwich\Plugin\ContentSandwichArtistManager
   */
  protected $sandwichArtistManager;

  /**
   * Constructs a ContentSandwichForm object.
   *
   * @param \Drupal\content_sandwich\Plugin\ContentSandwichArtistManager $sandwich_artist_manager
   *   Sandwich artist manager.
   */
  public function __construct(ContentSandwichArtistManager $sandwich_artist_manager) {
    $this->sandwichArtistManager = $sandwich_artist_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('plugin.manager.content_sandwich_artist')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    /** @var \Drupal\content_sandwich\Entity\ContentSandwich $content_sandwich */
    $content_sandwich = $this->entity;

    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $content_sandwich->label(),
      '#description' => $this->t("Label for the Content sandwich."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $content_sandwich->id(),
      '#machine_name' => [
        'exists' => '\Drupal\content_sandwich\Entity\ContentSandwich::load',
      ],
      '#disabled' => !$content_sandwich->isNew(),
    ];

    $options = [];
    $sandwich_artists = $this->sandwichArtistManager->getDefinitions();
    foreach ($sandwich_artists as $sandwich_artist_id => $sandwich_artist) {
      $options[$sandwich_artist_id] = $sandwich_artist['label'];
    }

    $content_sandwich_artist_id = $content_sandwich->getContentSandwichArtist();

    // When creating a new content sandwich, default to the first found content
    // sandwich artist.
    if (!$content_sandwich_artist_id) {
      $keys = array_keys($options);
      $content_sandwich_artist_id = reset($keys);
    }

    $form['content_sandwich_artist'] = [
      '#type' => 'select',
      '#title' => $this->t('Content sandwich artist'),
      '#description' => $this->t('Choose a content sandwich artist to make your content sandwiches.'),
      '#default_value' => $content_sandwich_artist_id,
      '#options' => $options,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $form_state->cleanValues();

    /** @var \Drupal\content_sandwich\Entity\ContentSandwich $content_sandwich */
    $content_sandwich = $this->entity;

    $status = $content_sandwich->save();

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Content sandwich.', [
          '%label' => $content_sandwich->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Content sandwich.', [
          '%label' => $content_sandwich->label(),
        ]));
    }
    $form_state->setRedirectUrl($content_sandwich->toUrl('collection'));
  }

}
