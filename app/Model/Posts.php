<?php

class Posts extends AppModel 
{
    public $name='Posts';
    public $validate = array
    (
        'description' => array
        (
            'rule' => 'notEmpty',
            'required' => true,
        )
        
    );
}
