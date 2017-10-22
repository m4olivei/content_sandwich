<?php

namespace Drupal\content_sandwich\Plugin\ContentSandwichArtist;

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

}
