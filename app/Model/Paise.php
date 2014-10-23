<?php
App::uses('AppModel', 'Model');
/**
 * Paise Model
 *
 */
class Paise extends AppModel 
{
  public $displayField = 'nombre'; 

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array
	(
		'Provincia' => array
		(
			'className' => 'Provincia', 
			'foreignKey' => 'pais_id',
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
