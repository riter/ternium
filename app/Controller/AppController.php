<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller 
{   
    public  $helpers = array( 'Html', 'Form', 'Session');

   /*
    public $components = array(
       'Cookie',
       'Session',
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'username','password' => 'password')
                )
            ),
            'loginRedirect' => array('controller' => 'dashboard', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
            'authorize' => array('Controller')
        )
    );
   */
    
    public $components = array
    (

//$this->redirect(array('controleler' => 'dashboard', 'action' => 'index','admin' => true), null, true);

        'Session',
        'Auth' => array(
               // borrado por l.b
            'loginRedirect' => array('controller' => 'dashboard', 'action' => 'index' ,'admin' => true),
            //'loginRedirect' => array('controller' => 'users', 'action' => 'index' ),
            'logoutRedirect' => array('controller' => 'home', 'action' => 'index'),         
            'authorize' => array('Controller') // Added this line
   
        )
    );
    

    public function isAuthorized($user) 
    {
        
        $this->loadModel('User');
        // Admin and Sub-admin can access every action
        if (isset($user['role']))
            if($user['role'] === User::_ADMIN ) 
            {
                return true;
            }

        return false;

        
        /*
        // Admin can access every action
        if (isset($user['role']) && $user['role'] === User::_ADMIN ) {
            return true;
        }
        // Default deny
        return false;
        */
    }
    
    public function beforeFilter() {
        
        if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {

            $this->Auth->deny();
        } else {

            $this->Auth->allow();
        }
        
    }
    public function beforeRender() 
    {
        // admin layout
    
        if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
            $this->layout = 'admin';
            $this->set('title_page', 'Loraxian');

            // login layout
            if ($this->params['action'] == 'admin_login') {
                $this->layout = false;
            }
        } else { // public layout
            if ($this->params['action'] == 'login') {
                $this->layout = false;
            }else{
                $this->layout = 'home';
                $this->set('title', 'Loraxian');       
            }
        }
    
    }
         

}
