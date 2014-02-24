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

  $item = menu_get_item();
  if ($item['path'] == 'contact') {
    $variables['classes_array'][] = 'contact--page';
  }
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
    if (isset($variables['content']['field_profile_position'])) {
      $title .= ' <span class="position">(' . $variables['content']['field_profile_position'][0]['#markup'] . ')</span>';
    }
    $variables['content']['field_profile_name'][0]['#markup'] = '<h2 class="staff--titel">' . $title . '</h2>';
    unset($variables['content']['field_profile_position']);
  }
}

/**
 * Implements hook_preprocess_views_view_responsive_grid().
 *
 * Adds the correct classes to rows and columns to the news list view based on
 * the number of news posts promoted to the front page.
 */
function nebula_preprocess_views_view_responsive_grid(&$vars) {
  // Handle news view.
  if ($vars['view']->name == 'news') {
    // Defined column classes.
    $columns_classes = array(
      ' news--list--first-item',
      ' news--list--second-item',
      ' news--list--third-item',
    );
  }

  // Handle photo album view.
  if ($vars['view']->name == 'photoalbum') {
    // Defined column classes.
    $columns_classes = array(
      ' photoalbum-list--first-item',
      ' photoalbum-list--second-item',
      ' photoalbum-list--third-item',
    );
  }

  // Set the row classes.
  _nebula_grid_row_classes($vars['rows'], $columns_classes);
}

/**
 * Add classes to each element in the grid rows.
 *
 * @param array $rows
 *   Rows from the responsive grid view.
 * @param array $columns_classes
 *   The classes to add to the column elements index by id.
 */
function _nebula_grid_row_classes(&$rows, $columns_classes) {
  // Loop over the rows to add the correct classes to the columns.
  foreach ($rows as $row_number => $row) {
    // Add column classes to the current row.
    $column_id = 0;
    foreach ($row as $column_id => $column) {
      $rows[$row_number][$column_id]['classes'] .= $columns_classes[$column_id];
    }

    // Add last class to last column.
    $rows[$row_number][$column_id]['classes'] .= ' last';
  }
}
