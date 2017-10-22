<?php

namespace Drupal\content_sandwich\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\Core\Plugin\DefaultSingleLazyPluginCollection;

/**
 * Defines the Content sandwich entity.
 *
 * @ConfigEntityType(
 *   id = "content_sandwich",
 *   label = @Translation("Content sandwich"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\content_sandwich\ContentSandwichListBuilder",
 *     "form" = {
 *       "add" = "Drupal\content_sandwich\Form\ContentSandwichForm",
 *       "edit" = "Drupal\content_sandwich\Form\ContentSandwichForm",
 *       "delete" = "Drupal\content_sandwich\Form\ContentSandwichDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\content_sandwich\ContentSandwichHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "content_sandwich",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/content_sandwich/{content_sandwich}",
 *     "add-form" = "/admin/structure/content_sandwich/add",
 *     "edit-form" = "/admin/structure/content_sandwich/{content_sandwich}/edit",
 *     "delete-form" = "/admin/structure/content_sandwich/{content_sandwich}/delete",
 *     "collection" = "/admin/structure/content_sandwich"
 *   }
 * )
 */
class ContentSandwich extends ConfigEntityBase implements ContentSandwichInterface {

  /**
   * The Content sandwich ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Content sandwich label.
   *
   * @var string
   */
  protected $label;

  /**
   * Sandwich artist plugin id.
   *
   * @var string
   */
  protected $content_sandwich_artist;

  /**
   * Sandwich artist settings.
   *
   * @var array
   */
  protected $content_sandwich_artist_settings = [];

  /**
   * The plugins this config entity is dependent on.
   *
   * This is used to allow plugins to declare config dependencies.
   *
   * @var \Drupal\Core\Plugin\DefaultSingleLazyPluginCollection
   */
  protected $sandwichArtistPluginCollection;

  /**
   * {@inheritdoc}
   */
  public function getLabel() {
    return $this->label;
  }

  /**
   * {@inheritdoc}
   */
  public function getContentSandwichArtist() {
    return $this->content_sandwich_artist;
  }

  /**
   * {@inheritdoc}
   */
  public function getContentSandwichArtistSettings() {
    return $this->content_sandwich_artist_settings;
  }

  /**
   * {@inheritdoc}
   */
  public function getPluginCollections() {
    // This method serves to flag to Drupal which of the properties of our
    // entity store plugin configuration. Plugins themselves can't store
    // configuration, entities do. This is a way to delegate the handling of
    // the configuration that belongs to the plugin from the entity, where it is
    // actually stored, to the plugin in a standard way.
    if (!$this->content_sandwich_artist) {
      return [
        'content_sandwich_artist_settings' => [],
      ];
    }

    if (!isset($this->sandwichArtistPluginCollection)) {
      $this->sandwichArtistPluginCollection = new DefaultSingleLazyPluginCollection(\Drupal::service('plugin.manager.content_sandwich_artist'), $this->getContentSandwichArtist(), $this->getContentSandwichArtistSettings());
    }

    return [
      'content_sandwich_artist_settings' => $this->sandwichArtistPluginCollection,
    ];
  }

}
