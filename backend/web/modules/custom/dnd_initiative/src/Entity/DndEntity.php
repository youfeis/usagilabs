<?php

namespace Drupal\dnd_initiative\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\dnd_initiative\DndEntityInterface;

/**
 * Defines the dnd entity entity class.
 *
 * @ContentEntityType(
 *   id = "dnd_entity",
 *   label = @Translation("Dnd Entity"),
 *   label_collection = @Translation("Dnd Entities"),
 *   label_singular = @Translation("dnd entity"),
 *   label_plural = @Translation("dnd entities"),
 *   label_count = @PluralTranslation(
 *     singular = "@count dnd entities",
 *     plural = "@count dnd entities",
 *   ),
 *   handlers = {
 *     "list_builder" = "Drupal\dnd_initiative\DndEntityListBuilder",
 *     "views_data" = "Drupal\views\EntityViewsData",
 *     "form" = {
 *       "add" = "Drupal\dnd_initiative\Form\DndEntityForm",
 *       "edit" = "Drupal\dnd_initiative\Form\DndEntityForm",
 *       "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     }
 *   },
 *   base_table = "dnd_entity",
 *   admin_permission = "administer dnd entity",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid",
 *   },
 *   links = {
 *     "collection" = "/admin/content/dnd-entity",
 *     "add-form" = "/dnd-entity/add",
 *     "canonical" = "/dnd-entity/{dnd_entity}",
 *     "edit-form" = "/dnd-entity/{dnd_entity}/edit",
 *     "delete-form" = "/dnd-entity/{dnd_entity}/delete",
 *   },
 *   field_ui_base_route = "entity.dnd_entity.settings",
 * )
 */
class DndEntity extends ContentEntityBase implements DndEntityInterface {

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {

    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['label'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Label'))
      ->setRequired(TRUE)
      ->setSetting('max_length', 255)
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -5,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'string',
        'weight' => -5,
      ])
      ->setDisplayConfigurable('view', TRUE);

    $fields['description'] = BaseFieldDefinition::create('text_long')
      ->setLabel(t('Description'))
      ->setDisplayOptions('form', [
        'type' => 'text_textarea',
        'weight' => 10,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayOptions('view', [
        'type' => 'text_default',
        'label' => 'above',
        'weight' => 10,
      ])
      ->setDisplayConfigurable('view', TRUE);

    return $fields;
  }

}
