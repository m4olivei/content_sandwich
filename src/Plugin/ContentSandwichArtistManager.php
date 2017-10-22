<?php

namespace Drupal\content_sandwich\Plugin;

use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;

/**
 * Provides the Content sandwich artist plugin manager.
 */
class ContentSandwichArtistManager extends DefaultPluginManager {


  /**
   * Constructs a new ContentSandwichArtistManager object.
   *
   * @param \Traversable $namespaces
   *   An object that implements \Traversable which contains the root paths
   *   keyed by the corresponding namespace to look for plugin implementations.
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   *   Cache backend instance to use.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler to invoke the alter hook with.
   */
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler) {
    parent::__construct('Plugin/ContentSandwichArtist', $namespaces, $module_handler, 'Drupal\content_sandwich\Plugin\ContentSandwichArtistInterface', 'Drupal\content_sandwich\Annotation\ContentSandwichArtist');

    $this->alterInfo('content_sandwich_content_sandwich_artist_info');
    $this->setCacheBackend($cache_backend, 'content_sandwich_content_sandwich_artist_plugins');
  }

}
