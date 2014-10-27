<?php

class DashboardController extends AppController {

    public function beforeFilter() {   
        parent::beforeFilter();
        // Controller spesific beforeFilter
        
        $user = AuthComponent::user();
        $this->loadModel('User');
        
        
        if (!AuthComponent::user()) {
            $this->redirect(array('controller'=>'home', 'action'=>'login', null, 'admin'=>false));
        }else{
           if (AuthComponent::user('role') != User::_ADMIN){
                $this->redirect(array('controller'=>'home', 'action'=>'login', null, 'admin'=>false));
            } 
        }            
    }
    
    public function index() 
    {
        
        $this->loadModel('Calculo');
    //$usuarios = $this->User->find('count',array('conditions'=>array('User.uid <>'=>0)));
       
    $usuarios = $this->Calculo->find('count',array('conditions'=>array('Calculo.id >'=>1)));
       $cal= $this->Calculo->query("SELECT * FROM calculos LIMIT 2");
    
    print_r($cal);exit;
    $this->set('title_page', 'Dashboard');
    }

    public function admin_home() {
        $this->redirect(array('controller'=>'home', 'action'=>'login', null, 'admin'=>false));
   }
   public function consulta()
   {
      
   }
}