<?php 

class UsersServicesController extends AppController
{   
    // var $components = array('RequestHandler'); 
    // public $helpers = array('Form', 'Html');

    public function beforeFilter()     
    {   
        parent::beforeFilter();  
        $this->loadModel('User'); 
    } 


    public function login_post()
    {

      $this->autoRender = false;
      $this->layout="ajax";

      $usuario=$this->request->data;
      $login= $usuario['User']['username'];
      $password= $usuario['User']['password'];
      $password = AuthComponent::password($password);

      $condiciones= array('username'=>$login,'password'=>$password);
      $tuplaUsuario=$this->User->find('first',array('conditions'=> $condiciones ));


      if(!empty($tuplaUsuario))
      {
         $user = $tuplaUsuario ;
         print_r($user);
      }
      else
      {
        // echo "No validoooooooooooo";
        // echo "noexito";
        echo 'noexito';
      }
    }

    public function loginjsonpjson()
    {
       $this->autoRender = false ;
       $this->layout="ajax";

      // print_r($this->params->query);

       $login= $this->params->query['data']['User']['username'];
       $password= $this->params->query['data']['User']['password'];
       $jsoncallback= $this->params->query['jsoncallback'];

       $datos['User']['login']=$login;
       $datos['User']['password']=$password;


       // print_r($datos);
       echo $jsoncallback.'('.json_encode($datos).')';

      /*
         $condiciones= array('username'=>$login,'password'=>$password);
         $tuplaUsuario=$this->User->find('first',array('conditions'=> $condiciones ));
      // print_r($tuplaUsuario);

        if(!empty($tuplaUsuario))
        {
          // $user = $tuplaUsuario ;
          // echo  "exito";
           echo $jsoncallback.'('.json_encode($tuplaUsuario).')';
        }
        else
        {
           echo null;
        }
      */

    } 


    public function login_jsonp_get()
    {  
       $this->autoRender = false ;
       $this->layout="ajax";

       $login= $this->params->query['data']['User']['username'];  
       $password= $this->params->query['data']['User']['password'];  
       $jsoncallback= $this->params->query['jsoncallback']; 

      // $datos['User']['login']=$login;
      // $datos['User']['password']=$password; 

       $condiciones= array('username'=>$login,'password'=>$password);           
       $tuplaUsuario=$this->User->find('first',array('conditions'=> $condiciones )); 

     //  print_r($tuplaUsuario); 

      if(!empty($tuplaUsuario)) 
      { 
        // $user = $tuplaUsuario ; 
        // echo  "exito"; 
         echo $jsoncallback.'('.json_encode($tuplaUsuario).')'; 
      }
      else
      {
         echo null;
      }

    } 
    public function loginJSonGet()
    {
       $this->autoRender = false ;
       $this->layout="ajax"; 

       $usuario=$this->params->query;        
       $login= $usuario['data']['User']['username']; 
       $password= $usuario['data']['User']['password'];         
       $password = AuthComponent::password($password); 

       $condiciones= array('username'=>$login,'password'=>$password);           
       $tuplaUsuario=$this->User->find('first',array('conditions'=> $condiciones )); 

      if(!empty($tuplaUsuario)) 
      {   
         echo json_encode($tuplaUsuario); 
      }
      else
      {
         echo json_encode("noexito");
      }

    }
    public function login_jsonp_post($login_jsonp_post=null)
    {  

       $this->autoRender = false ;
       $this->layout="ajax" ; 

       echo "login_jsonp_post".$login_jsonp_post;
       print_r($this->request->data) ;

      /* 

       $login= $this->params->query['data']['User']['username'];  
       $password= $this->params->query['data']['User']['password'];  
       $jsoncallback= $this->params->query['jsoncallback'];  

      // $datos['User']['login']=$login;
      // $datos['User']['password']=$password;  

       $condiciones= array('username'=>$login,'password'=>$password);           
       $tuplaUsuario=$this->User->find('first',array('conditions'=> $condiciones )); 

     // print_r($tuplaUsuario); 

      if(!empty($tuplaUsuario)) 
      { 
        // $user = $tuplaUsuario ; 
        // echo  "exito"; 
         echo $jsoncallback.'('.json_encode($tuplaUsuario).')'; 
      }
      else
      {
         echo null;
      }
    } 
  */ 
     }

 }