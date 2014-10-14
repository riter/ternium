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
    
    public function admin_index() 
    {
       
        $this->set('title_page', 'Dashboard');
    }

    public function admin_home() {
        $this->redirect(array('controller'=>'home', 'action'=>'login', null, 'admin'=>false));
   }
}