<?php
/**
 * @file
 * Preprocess functions to improve the theme.
 */

/**
 * Implements hook_preprocess_page().
 *
 * Find the right layout class based on the regions content.
 */
function nebula_preprocess_page(&$variables) {
  // Default one col.
  $class = 'layout--one-col';

  if (!empty($variables['page']['secondary_content'])) {
    $class = 'layout--two-col--left';
  }

  if (!empty($variables['page']['tertiary_content'])) {
    $class = 'layout--two-col--right';
  }

  if (!empty($variables['page']['secondary_content']) && !empty($variables['page']['tertiary_content'])) {
    $class = 'layout--three-col';
  }

  // Set the class.
  $variables['classes_array'][] = $class;
}

function nebula_preprocess_field(&$variables, $hook) {
  $t = 1;
}
