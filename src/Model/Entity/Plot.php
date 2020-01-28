<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Plot Entity
 *
 * @property int $id
 * @property int $person_id
 * @property int $number
 * @property string|null $notes
 * @property \Cake\I18n\FrozenTime $date_created
 * @property \Cake\I18n\FrozenTime|null $date_modified
 *
 * @property \App\Model\Entity\Person $person
 * @property \App\Model\Entity\Event[] $events
 */
class Plot extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'person_id' => true,
        'number' => true,
        'notes' => true,
        'date_created' => true,
        'date_modified' => true,
        'person' => true,
        'events' => true,
    ];
}
