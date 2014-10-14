<?php
App::uses('AppModel', 'Model');
/**
 * Provincia Model
 *
 * @property Pais $Pais
 * @property Proveedore $Proveedore
 */
class Provincia extends AppModel 
{

public $displayField = 'nombre'; 
	//The Associations below have been created with all possible keys, those that are not needed can be removed

public $validate = array
(
        'nombre' => array
        (
            'rule' => 'notEmpty',
            'required' => true,
        ),
        'pais_id' => array(
            'rule' => 'notEmpty',
            'required' => true,
        )
    );

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array
	(
		'Paise' => array
		(
			'className' => 'Paise',
			'foreignKey' => 'pais_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Proveedore' => array(
			'className' => 'Proveedore',
			'foreignKey' => 'provincia_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
