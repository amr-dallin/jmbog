<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Event Entity
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property string $result
 * @property \Cake\I18n\FrozenTime $date_beginning
 * @property string|null $coordinates
 * @property string|null $location
 * @property bool $completed
 * @property \Cake\I18n\FrozenTime $date_created
 * @property \Cake\I18n\FrozenTime|null $date_modified
 *
 * @property \App\Model\Entity\Plot[] $plots
 */
class Event extends Entity
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
        'title' => true,
        'body' => true,
        'result' => true,
        'date_beginning' => true,
        'coordinates' => true,
        'location' => true,
        'completed' => true,
        'date_created' => true,
        'date_modified' => true,
        'plots' => true,
        'meta_tags' => true
    ];
}
