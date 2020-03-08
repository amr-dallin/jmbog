<?php
namespace Published\Model\Entity;

use Cake\ORM\Entity;

/**
 * PublicationMode Entity
 *
 * @property string $id
 * @property int $foreign_key
 * @property string $model
 * @property \Cake\I18n\FrozenTime|null $date
 * @property bool $mode
 */
class PublicationMode extends Entity
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
        'foreign_key' => true,
        'model' => true,
        'date' => true,
        'mode' => true
    ];
}
