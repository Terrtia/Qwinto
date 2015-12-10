<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Party Entity.
 *
 * @property int $ID
 * @property int $TOUR
 * @property string $ORDRE
 * @property int $DE_ROUGE
 * @property int $DE_JAUNE
 * @property int $DE_VIOLET
 */
class Party extends Entity
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
        '*' => true,
        'ID' => false,
        'VAL' => 0,
    ];

	public function DesOk(){
		return (($this->DE_ROUGE == 0) and ($this->DE_ORANGE == 0) and ($this->DE_VIOLET == 0));
		
	}	


}
