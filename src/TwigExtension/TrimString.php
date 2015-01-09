<?php

/**
 * @file
 * Contains \Drupal\trim_string\TwigExtension\TrimString.
 */

namespace Drupal\trim_string\TwigExtension;

use Drupal\Core\Template\TwigExtension;

/**
 * A test Twig extension that adds a custom function and a custom filter.
 */
class TrimString extends TwigExtension {

  /**
   * Generates a list of all Twig filters that this extension defines.
   *
   * @return array
   *   A key/value array that defines custom Twig filters. The key denotes the
   *   filter name used in the tag, e.g.:
   *   @code
   *   {{ foo|trim_string }}
   *   @endcode
   *
   *   The value is a standard PHP callback that defines what the filter does.
   */
  public function getFilters() {
    return array(
      new \Twig_SimpleFilter('trim_string', array('Drupal\trim_string\TwigExtension\TrimString', 'trimString')),
    );
  }

  /**
   * Empty getFunction method because without it everything seems to be broken.
   */
  public function getFunctions() {
    return array();
  }

  /**
   * Gets a unique identifier for this Twig extension.
   *
   * @return string
   *   A unique identifier for this Twig extension.
   */
  public function getName() {
    return 'trim_string';
  }

  /**
   * Limits the length of the string for the set maximum length..
   *
   * @param string $string
   *   The string to be filtered.
   *
   * @param int $length
   *   The length of the string.
   *
   * @return string
   *   The filtered string.
   *
   * @see \Drupal\system\Tests\Theme\TwigExtensionTest::testTwigExtensionFilter()
   */
  public static function trimString($string, $length = 10) {
    return substr($string, 0, $length);
  }

}
