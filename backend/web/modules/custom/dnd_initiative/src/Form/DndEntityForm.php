<?php

namespace Drupal\dnd_initiative\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the dnd entity entity edit forms.
 */
class DndEntityForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $result = parent::save($form, $form_state);

    $entity = $this->getEntity();

    $message_arguments = ['%label' => $entity->toLink()->toString()];
    $logger_arguments = [
      '%label' => $entity->label(),
      'link' => $entity->toLink($this->t('View'))->toString(),
    ];

    switch ($result) {
      case SAVED_NEW:
        $this->messenger()->addStatus($this->t('New dnd entity %label has been created.', $message_arguments));
        $this->logger('dnd_initiative')->notice('Created new dnd entity %label', $logger_arguments);
        break;

      case SAVED_UPDATED:
        $this->messenger()->addStatus($this->t('The dnd entity %label has been updated.', $message_arguments));
        $this->logger('dnd_initiative')->notice('Updated dnd entity %label.', $logger_arguments);
        break;
    }

    $form_state->setRedirect('entity.dnd_entity.canonical', ['dnd_entity' => $entity->id()]);

    return $result;
  }

}
