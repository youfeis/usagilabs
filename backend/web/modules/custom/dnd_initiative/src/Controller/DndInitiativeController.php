<?php

namespace Drupal\dnd_initiative\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for DnD Initiative routes.
 */
class DndInitiativeController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('It works!'),
    ];

    return $build;
  }

}
