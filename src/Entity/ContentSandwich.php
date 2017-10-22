<?php

namespace Drupal\content_sandwich\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;

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

}
