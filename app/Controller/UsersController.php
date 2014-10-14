<?php 

class UsersController extends AppController 
{   
    public function beforeFilter() 
    {       
       parent::beforeFilter(); 
       // Controller spesific beforeFilter 
        $user = AuthComponent::user(); 
        $this->loadModel('User'); 
        $this->loadModel('Paise'); 


       if (!AuthComponent::user()) 
        {
            $this->redirect(array('controller'=>'home', 'action'=>'login', null, 'admin'=>false));
        }
        else
        {
           if (AuthComponent::user('role') != User::_ADMIN)
           {
                $this->redirect(array('controller'=>'home', 'action'=>'login', null, 'admin'=>false));
           } 
        }
    }

    
    function login_ajax()
    {
        // $codigo=$this->params->query['codigo'];  
          if( ($this->RequestHandler->isAjax()))
          {
              $this->autoRender = false;
              $datos=$this->request->data;
              
          }
          else
          {
            echo "noajax";
          }

    }
    public function admin_dashboard() 
    {
           
    }
    public function admin_login() {
        
        if ($this->request->is('post')) 
        {
            if ($this->Auth->login()) 
            {
                return $this->redirect($this->Auth->redirect());
            }
        
        }
 
        
    }
    public function admin_logout() {
        if($this->Auth->logout($this->data)){
             $this->redirect(array('controller'=>'home', 'action'=>'login',null , 'admin'=>false));
        }
    }
    
    public function admin_add()
    {   

        if ($this->request->is('post') ) 
        {   
            $data = $this->UploadPhoto($this->request->data); 
            

          //  $data['User']['username']=$data['User']['email']; 
            $this->User->create();
            if ($this->User->save($data)) 
            {
                $this->enviarEmail($data);
                $message='El Usuario ha sido guardado!';
                 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));  
                return $this->redirect(array('action' => 'index'));
            }
            else
            {
               $message='El Usuario no ha sido guardado. Por favor, intente de nuevo';
                 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));  
                
            }
                
        }
        $pais = $this->Paise->find('list');
        $this->set(compact('pais'));
            
       
    }
    public function admin_index()
    {

        $this->User->recursive = 0;
        var_dump($this->User->recursive);exit;
        //$data= $this->User->find('all');
        //$this->set('users', $data);

    }

    public function admin_edit($id) 
    {
        if(!$id)
        {
            throw new NotFoundException(__('User Invalid'));
            $this->redirect(array('action'=>'index')); 
        } 

        if(empty($this->data))
        {
           $this->data=  $this->User->findById(array('id'=>$id)); 
         //  $this->set('photo', $this->data['User']['photo']);  
        }
        else
        {
            $newdata;
            $data = $this->request->data;
            
            $this->User->id = $id;
            $anData=$this->User->findById(array('id'=>$id)); 


           /*  if($this->request->data['User']['photo']['name'] !="")
               $data = $this->UploadPhoto($this->request->data); 
           else
               $data['User']['photo']=$anData['User']['photo']; */

            
            $newdata['User']['id']=$id;
            $newdata['User']['nombre']=$data['User']['nombre'];
            $newdata['User']['apellido']=$data['User']['apellido'];
            $newdata['User']['telefono']=$data['User']['telefono'];
            $newdata['User']['username']=$data['User']['username'];
            $newdata['User']['email']=$data['User']['email'];
            $newdata['User']['role']=$data['User']['role'];
            $newdata['User']['pais_id']=$data['User']['pais_id'];
          
            
            
            if($data['User']['password'] != '' && $data['User']['password'] === $data['confirm_password']){
                $newdata['User']['password']=$data['User']['password'];
            }
            //echo '<pre>'; print_r($newdata);
            //exit(0);
            if($this->User->save($newdata)){
                //$this->Session->setFlash('User amended.');
                $this->redirect(array('action'=>'index'),NULL,TRUE);
            }  
        }
         $pais = $this->Paise->find('list');
        $this->set(compact('pais'));
       
    }








    /**/
    // using app/Model/ProductCategory.php
// In the following example, do not let a product category be deleted if it
// still contains products.
// A call of $this->Product->delete($id) from ProductsController.php has set
// $this->id .
// Assuming 'ProductCategory hasMany Product', we can access $this->Product
// in the model.
    public function beforeDelete($cascade = true) { /*Agregue esta funcion para personalizar errores */ 
        $count = $this->Product->find("count", array(
            "conditions" => array("user_id" => $this->id)
        ));
        if ($count == 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function admin_delete($id)
    {
        if(!$id)
            throw new NotFoundException('User Invalid.');
        if($this->User->delete($id)){
            //$this->Session->setFlash('The User : '.$id.' been eliminated to.');
            $this->redirect(array('action'=>'index'));
        }
    }
    //---------------------------------------
    private function UploadPhoto($data) {
        try {
            if(!empty($this->data['User']['photo']['name']))
            {
                $file = $this->data['User']['photo'];
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                $arr_ext = array('jpg', 'png', 'gif');
                if(in_array($ext, $arr_ext))
                {
                   
                    $tmp_name=$data['User']['photo']['tmp_name'];
                    $name=$data['User']['firstname'].'_'.$data['User']['lastname'].'.jpg';
                    $destination = WWW_ROOT . 'uploads/photo/' . $name;
                    move_uploaded_file($tmp_name, $destination);         
                    $data['User']['photo'] = $name;
                }else{
                    $data['User']['photo'] = '';
                } 
            }else{
                $data['User']['photo'] = '';
            }
           
        } catch (Exception $ex) {
            print_r($ex->getMessage());
        }
        return $data;
        
    }
    private function enviarEmail($data){
        
        /* try {
            $subject = "Loraxian - Registration on the website";
            $to = $data['User']['email'];
            $from= 'admin@loraxian.com';
			$url="http://".$_SERVER['HTTP_HOST'].$this->webroot."home/login";

            $body = "Your Loraxian Team Portal account has been created.\n\n";
            $body .= "You can login to the team portal by visiting this link:".$url."\n\n";
            $body .= "You can change your password by clicking on the 'My Profile' link in the upper right corner of the team portal. \n\n";
            $body .= "        Loraxian Management \n\n";

			
            $headers = 'From: ' . $from . "\r\n";
            @mail($to, $subject, $body, $headers);  
        } catch (Exception $ex) {
            
        }*/
        
    }
    
}

