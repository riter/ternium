<?php
App::uses('AppModel', 'Model');
/**
 * Proveedore Model
 *
 * @property Pais $Pais
 * @property Provincia $Provincia
 */

class Proveedore extends AppModel 
{ 	  
  public $displayField = 'nombres';  
// The Associations below have been created with all possible keys, those that are not needed can be removed

public $validate = array(
        'nombres' => array(
            'rule' => 'notEmpty',
            'required' => true,
        ),
        'direccion' => array(
            'rule' => 'notEmpty',
            'required' => true,
        ),        
        'contactos' => array(
            'rule' => 'notEmpty',
            'required' => true,
        ),
        'pais_id' => array(
            'rule' => 'notEmpty',
            'required' => true,
        ),
        'provincia_id' => array(
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
			'className' =>  'Paise',
			'foreignKey' => 'pais_id',
			'conditions' => '',
			'fields' => '',
			'order' =>  ''
		),
		'Provincia' => array
		(
			'className' => 'Provincia',
			'foreignKey' => 'provincia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		) 
	);

    public $hasMany = array
    (
        'ProveedoresRepresentante' => array
        (
            'className' => 'ProveedoresRepresentante', 
            'foreignKey' => 'proveedore_id', 
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
