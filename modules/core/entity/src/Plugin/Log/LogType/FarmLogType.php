<?php

namespace Drupal\farm_entity\Plugin\Log\LogType;

use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Provides a farmOS log type base class.
 */
class FarmLogType extends LogTypeBase {

  use StringTranslationTrait;

  /**
   * {@inheritdoc}
   */
  public function buildFieldDefinitions() {
    $fields = [];

    // Geometry field.
    // This is added as a bundle field definition to all log types rather than
    // a base field definition so that data is stored in a dedicated database
    // table.
    $options = [
      'type' => 'geofield',
      'label' => $this->t('Geometry'),
      'description' => $this->t('Add geometry data to this log to describe where it took place.'),
      'weight' => [
        'form' => 95,
        'view' => 95,
      ],
    ];
    $fields['geometry'] = \Drupal::service('farm_field.factory')->bundleFieldDefinition($options);

    return $fields;
  }

}
