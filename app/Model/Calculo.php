<?php
App::uses('AppModel', 'Model');

class Calculo extends AppModel {
 public $displayField = 'nombre'; 

    public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CalculosTipo' => array
			(
			'className' => 'CalculosTipo',
			'foreignKey' => 'calculo_tipo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);



}
