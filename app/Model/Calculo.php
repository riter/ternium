<?php
App::uses('AppModel', 'Model');
/**
 * Galeria Model
 *
 * @property User $User
 * @property Galeriastipo $Galeriastipo
 */
class Galeria extends AppModel {
 public $displayField = 'nombre'; 

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'GaleriasTipo' => array
			(
			'className' => 'GaleriasTipo',
			'foreignKey' => 'galeriastipo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $validate = array(
    'image' => array(
        'rule' => array('extension', array('gif', 'jpeg', 'png', 'jpg'),
        'message' => 'Por favor indique una imágen válida.'
    ))
	);


}
