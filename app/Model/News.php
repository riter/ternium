<?php

class News extends AppModel {
    public $name='News';
    public $validate = array(
        'description' => array(
            'rule' => 'notEmpty',
            'required' => true
        )
        
    );
}
