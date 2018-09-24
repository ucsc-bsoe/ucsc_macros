<?php

namespace Drupal\ucsc_macros\Plugin\Filter;

use Drupal\filter\FilterProcessResult;
use Drupal\filter\Plugin\FilterBase;

/**
 * @Filter(
 *   id = "filter_macros",
 *   title = @Translation("UCSC Macros Filter"),
 *   description = @Translation("Allow use of Macros!"),
 *   type = Drupal\filter\Plugin\FilterInterface::TYPE_MARKUP_LANGUAGE,
 * )
 */
class FilterMacros extends FilterBase {
  public function process($text, $langcode) {

    $text = preg_replace_callback(
      "/soe:contact:([A-Za-z0-9]+)/",
      "ucsc_macros_do_contact",
      $text
    );

    $text = preg_replace_callback(
      "/soe:e-mail:([A-Za-z0-9]+)/",
      "ucsc_macros_do_e_mail",
      $text
    );

    $text = preg_replace_callback(
      "/soe:user:([A-Za-z0-9]+)/",
      "ucsc_macros_do_user",
      $text
    );

    $text = preg_replace_callback(
      "/soe:link:([A-Za-z0-9]+)/",
      "ucsc_macros_do_link",
      $text
    );

    $text = preg_replace_callback(
      "/soe:photo:([A-Za-z0-9]+)/",
      "ucsc_macros_do_photo",
      $text
    );

//    $text = preg_replace_callback(
//      "/soe:biography:([A-Za-z0-9]+)/",
//      "ucsc_macros_do_biography",
//      $text
//    );

    $text = preg_replace_callback(
      "/soe:course:([A-Za-z0-9]+)/",
      "ucsc_macros_do_course",
      $text
    );

    $text = preg_replace_callback(
      "/soe:google-calendar:([A-Za-z0-9@%#\._-]+)/",
      "ucsc_macros_do_google_calendar",
      $text
    );

    $text = preg_replace_callback(
      "/soe:youtube:([A-Za-z0-9]+)/",
      "ucsc_macros_do_youtube",
      $text
    );

    return new FilterProcessResult($text);
  }
}

