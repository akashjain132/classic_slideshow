<?php

/**
 * @file
 * Theme for Classic Slideshow views.
 */

/**
 * Views Classic_slideshow: classic_slideshow.
 *
 * @ingroup themeable
 */
function template_preprocess_views_view_classic_slideshow(&$variables) {
  // View options set by user.
  $options = $variables['view']->style_plugin->options;

  $output = array();

  $variables['#attached']['library'][] = 'classic_slideshow/slideshow';

  foreach ($variables['view']->result as $id => $result) {
    $output[$id]['image'] = $variables['view']->style_plugin->getField($id, $options['image']);
    $output[$id]['caption'] = $variables['view']->style_plugin->getField($id, $options['caption']);
  }

  $options['classic_slideshow'] = $output;

  // Update options for twig.
  $variables['options'] = $options;
}
