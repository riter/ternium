<?php
App::uses('AppModel', 'Model');
/**
 * Galeria Model
 *
 * @property User $User
 * @property Galeriastipo $Galeriastipo
 */
class Feedback extends AppModel {
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
		'Comentario' => array
			(
			'className' => 'Comentario',
			'foreignKey' => 'comentario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);




}
