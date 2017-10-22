<?php

namespace Drupal\content_sandwich\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class ContentSandwichForm.
 */
class ContentSandwichForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

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

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
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
