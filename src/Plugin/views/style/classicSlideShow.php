<?php

/**
 * @file
 * Definition of Drupal\classic_slideshow\Plugin\views\style\Tardis.
 */

namespace Drupal\classic_slideshow\Plugin\views\style;

use Drupal\core\form\FormStateInterface;
use Drupal\views\Plugin\views\style\StylePluginBase;

/**
 * Style plugin to render a list of years and months
 * in reverse chronological order linked to content.
 *
 * @ingroup views_style_plugins
 *
 * @ViewsStyle(
 *   id = "classic_slideshow",
 *   title = @Translation("Classic Slideshow"),
 *   help = @Translation("Render a list of years and months in reverse chronological order linked to content."),
 *   theme = "views_view_classic_slideshow",
 *   display_types = { "normal" }
 * )
 *
 */
class classicSlideShow extends StylePluginBase {

  /**
   * Does the style plugin support custom css class for the rows.
   *
   * @var bool
   */
  protected $usesRowClass = TRUE;

  /**
   * Does the style plugin support grouping of rows.
   *
   * @var bool
   */
  protected $usesGrouping = FALSE;

  /**
   * Does the style plugin for itself support to add fields to it's output.
   *
   * @var bool
   */
  protected $usesFields = TRUE;

  /**
   * Set default options
   */
  protected function defineOptions() {
    $options = parent::defineOptions();

    $options['image'] = array('default' => '');
    $options['caption'] = array('default' => '');
    $options['arrows'] = array('default' => TRUE);
    $options['pager'] = array('default' => TRUE);

    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);

    // Create an array of allowed columns from the data we know:
    $field_names = $this->displayHandler->getFieldLabels();

    // Image field for slider.
    $form['image'] = array(
      '#title' => $this->t('Image'),
      '#type' => 'select',
      '#options' => $field_names,
      '#default_value' => $this->options['image'],
    );

    // Caption that appear on image.
    $form['caption'] = array(
      '#title' => $this->t('Caption'),
      '#type' => 'select',
      '#options' => $field_names,
      '#default_value' => $this->options['caption'],
    );

    // Arrows for moving image left and right.
    $form['arrows'] = array(
      '#title' => $this->t('Show Next and Previous Icons'),
      '#type' => 'checkbox',
      '#default_value' => $this->options['arrows'],
    );

    // Pager for showing number of slides.
    $form['pager'] = array(
      '#title' => $this->t('Show Pager'),
      '#type' => 'checkbox',
      '#default_value' => $this->options['pager'],
    );

  }

}
