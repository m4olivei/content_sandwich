<?php

namespace Drupal\content_sandwich\Plugin\ContentSandwichArtist;

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
  public function getBread() {
    return str_repeat('🍞', 10);
  }

  /**
   * {@inheritdoc}
   */
  public function getSauce() {
    return str_repeat('🍝', 10);
  }

}
