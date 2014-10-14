<?php

//App::uses('Appcontroller', 'controller');

class HomeController extends AppController 
{       
    var $new_limit=4;
    var $components = array('RequestHandler'); 
    public $helpers = array('Form', 'Html');
    
    public function beforeFilter() 
    {
        parent::beforeFilter(); 
       $this->loadModel('User');
       
    }

    public function index() 
    {   
        $this->redirect(array('controller' => 'home', 'action' => 'login'), null, true);

    }

    public function login()
    {
        $this->layout = false; 
        $this->set('title_page', 'Login');
     
        if ($this->request->is('post')) 
        { 
            if ($this->Auth->login()) 
            {   
                if (AuthComponent::user('rolee') === User::_ADMIN) 
                {  
                   $this->redirect(array('controller' => 'dashboard', 'action' => 'index','admin' => true), null, true);
                }
                else 
                {  
                    return $this->redirect($this->Auth->redirect());
                }
            }  
            else 
            {
                $this->set('login_error', "1");
            }
        } 
}

public function login_ajax()
{ 
   $this->autoRender = false; 
   $this->layout="ajax"; 
   $datos=$this->request->data; 
   $user = $datos; 

   echo json_encode($user);
}

  public function logout() 
  {   
        if($this->Auth->logout($this->data))
        {
            $this->redirect('login');
        }
  }

   
}