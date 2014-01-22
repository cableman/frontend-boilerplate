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

/**
 * Implements hook_preprocess_node().
 *
 * Add suggestion for nodes based on view mode.
 */
function nebula_preprocess_node(&$variables) {
  // Add tpl suggestions for node view modes.
  if (isset($variables['view_mode'])) {
    $variables['theme_hook_suggestions'][] = 'node__view_mode__' . $variables['view_mode'];
  }

  // If it is a staff profile node, move the name and position together.
  if ($variables['type'] == 'staff_profile') {
    // This is a evil hack.
    $title = $variables['content']['field_profile_name'][0]['#markup'];
    $title .= ' <span class="position">(' . $variables['content']['field_profile_position'][0]['#markup'] . ')</span>';
    $variables['content']['field_profile_name'][0]['#markup'] = '<h2 class="staff--titel">' . $title . '</h2>';
    unset($variables['content']['field_profile_position']);
  }
}
