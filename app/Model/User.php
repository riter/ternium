<?php

App::uses('AuthComponent', 'Controller/Component'); 
class User extends AppModel 
{   
    const _ADMIN = '1';    
    const _PUBLIC = '2';
    public $displayField = 'email';//email'; 
    /*
    var $validate = array( 
        'email' => array( 
        'identicalFieldValues' => array( 
        'rule' => array('identicalFieldValues', 'confirm_email' ), 
        'message' => 'Please re-enter your password twice so that the values match' 
                ) 
            ) 
        ); 
    */
    
    public $validate = array(
        'nombre' => array(
            'rule' => 'notEmpty',
            'required' => true,
        ),
        'apellido' => array(
            'rule' => 'notEmpty',
            'required' => true,
        ),        
        'email' => array(
            'rule' => 'notEmpty',
            'required' => true,
        ),
        'role' => array(
            'rule' => 'notEmpty',
            'required' => false, 
       /* ),
        'pais_id' => array(
            'rule' => 'notEmpty',
            'required' => true,*/
        ));//,
       /* 'password' => array
        (   
            'rule' => 'notEmpty',
            'required' => false,
        ),
        'confirm_password'=> array
                        (
                           'rule' => array('verifcarPasswords', 'password'),
                           'message' => 'Las contraseñas no coinciden' 
                        )
       
       ); */

    function verifcarPasswords($data, $field=null)
    {
        $keys = array_keys($data);
        $key = $keys[0];
        if(!is_string($field)) {
                if( ($pos = strpos($key, "_verification")) === FALSE ) {
                        return FALSE;
                }
                $field = substr($key, 0, $pos);
        }
        return ($data[$key] == $this->data[$this->name][$field]);


    }
    
    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
             //$this->data['User']['digest_hash'] = DigestAuthenticate::password( $this->data['User']['username'],$this->data['User']['password'], env('SERVER_NAME') );
        return true;
        }        
        return true;
    }
    public $belongsTo = array
    (
        'Paise' => array 
        (
            'className' =>  'Paise',
            'foreignKey' => 'pais_id',
            'conditions' => '',
            'fields' => '',
            'order' =>  ''
        )
       
    );

    /*'dependent'=>false,/*agregue 10-14-2014*/
}

