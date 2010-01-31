<?php

/**
* Add body classes if certain regions have content.
*/
function kiwi_preprocess_page(&$variables) {
  if (!empty($variables['secondary_menu'])) {
    $variables['classes_array'][] = 'secondary-links';
  }
}

/**
 * Theme the breadcrumb with divs.
 */
function kiwi_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

    $output .= '<div class="breadcrumb"><div class="breadcrumb-element">' . implode('</div> <div class="breadcrumb-separator">&raquo;</div> <div class="breadcrumb-element">', $breadcrumb) . '</div></div>';
    return $output;
  }
}

/**
 * Separate the status messages out into their own divs.
 */
function kiwi_status_messages($variables) {
  $display = $variables['display'];
  $output = '';

  $status_heading = array(
    'status' => t('Status message'),
    'error' => t('Error message'),
    'warning' => t('Warning message'),
  );
  foreach (drupal_get_messages($display) as $type => $messages) {
    if (!empty($status_heading[$type])) {
      $output .= '<h2 class="element-invisible">' . $status_heading[$type] . "</h2>\n";
    }
    foreach ($messages as $message) {
      $output .= "<div class=\"message message-$type\">\n";
      $output .= $message;
      $output .= "</div>\n";
    }
  }
  return $output;
}

/**
 * Add a class for the block position.
 */
function kiwi_preprocess_block(&$variables) {
  $variables['classes_array'][] = 'block-position-' . $variables['block_id'];
}

