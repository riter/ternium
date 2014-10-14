<?php


class Question extends AppModel {
    public $name='Question';
    public $validate = array(
        'question' => array(
            'rule' => 'notEmpty',
            'required' => true,
        ),
        'answer' => array(
            'rule' => 'notEmpty',
            'required' => true,
        ),
        'position' => array(
            'rule' => 'notEmpty',
            'number' => true,
        )
       
    );
}