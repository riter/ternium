<?php
App::uses('AppModel', 'Model');
/**
 * ProveedoresRepresentante Model
 *
 * @property Proveedore $Proveedore
 */
class ProveedoresRepresentante extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Proveedore' => array(
			'className' => 'Proveedore',
			'foreignKey' => 'proveedore_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
