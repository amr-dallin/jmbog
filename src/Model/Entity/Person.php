<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Person Entity
 *
 * @property int $id
 * @property string $last_name
 * @property string $first_name
 * @property string|null $middle_name
 * @property string|null $cell_number
 * @property \Cake\I18n\FrozenTime $date_created
 * @property \Cake\I18n\FrozenTime $date_modified
 *
 * @property \App\Model\Entity\Plot[] $plots
 */
class Person extends Entity
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
        'last_name' => true,
        'first_name' => true,
        'middle_name' => true,
        'cell_number' => true,
        'date_created' => true,
        'date_modified' => true,
        'plots' => true,
    ];

    protected $_virtual = ['full_name'];

    protected function _getFullName()
    {
        $full_name = '';
        if (!empty($this->_properties['last_name'])) {
            $full_name = $this->_properties['last_name'];
        }

        if (!empty($this->_properties['first_name'])) {
            $full_name .= ' ' .  $this->_properties['first_name'];

            if (!empty($this->_properties['middle_name'])) {
                $full_name .= ' ' .  $this->_properties['middle_name'];
            }
        }

        return $full_name;
    }
}
