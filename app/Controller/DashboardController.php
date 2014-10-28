<?php

class DashboardController extends AppController {

    public function beforeFilter() {   
        parent::beforeFilter();
        // Controller spesific beforeFilter
        
        $user = AuthComponent::user();
        $this->loadModel('User');
        $this->loadModel('Paise');
        $this->loadModel('Calculo');
        $this->loadModel('Provincia');
        $this->loadModel('Profesione');
        
        
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
        $this->UsuariosPais();
        echo "<br>";
        $this->UsuariosProfesion();
        echo "<br>";
        $this->UsuariosEdad();
        echo "<br/>";
        $this->UsuariosProvincia();
        echo "<br/>";
        $this->listadosUsuarios('Usuarios registrados');
       $this->set('title_page', 'Dashboard');
      
    }

       public function UsuariosEdad()
       {
           $fields=array('User.uid','User.contar_usuario');
           $contarUs = $this->User->find('all',array(
          'conditions'=>array('User.uid >'=>0),//,array('User.fecha_nacimiento'=>'2001-08-09')),
          'recursive'=>0,
          'group'=>'User.nombre',
          'limit'=>10,
          'recursive'=>0,$fields));
           
           
        $edad=0;
         foreach ($contarUs as $contar){
                
             $fechaaa= $contar['User']['fecha_nacimiento'];
              $edad= $this->calcular_edad($fechaaa);
              if($edad>=10 && $edad<=25)
                  echo $contar['User']['edad_usuario']. " usuarios 23/25 a&ntilde;os <br/>";
                  elseif ($edad>=26 && $edad<=29)
                       echo $contar['User']['edad_usuario']. " usuarios 26/29 a&ntilde;os <br/>";
                  elseif ($edad>=30 && $edad<=35) 
                       echo $contar['User']['edad_usuario']. " usuarios 30/35 a&ntilde;os <br/>";
                  elseif ($edad>=36 && $edad<=42) 
                       echo $contar['User']['edad_usuario']. " usuarios 36/42 a&ntilde;os <br/>";
              }
                            
       }
      public function listadosUsuarios($listado){
          switch ($listado){
              case "Usuarios registrados";
                  $cont = $this->User->find('count',array('conditions'=>array('User.uid >'=>0)));
                  echo "Usuarios registrados ".$cont;
                   break;
              case "Calculos realizados";
                     $cont = $this->Calculo->find('count',array('conditions'=>array('Calculo.id >'=>0)));
                     echo "Calculos realizados ".$cont;
                   break;
              case "Descargas de la apps";
                  echo "en veremos!";
                  break;
              case "Descargas pdf";
                  break;
          
          }
          
      }
      public function calcular_edad($fechanacimiento){
       list($ano,$mes,$dia) = explode("-",$fechanacimiento);
        $ano_diferencia  = date("Y") - $ano;
        $mes_diferencia = date("m") - $mes;
        $dia_diferencia   = date("d") - $dia;
        if ($dia_diferencia < 0 || $mes_diferencia < 0)
            $ano_diferencia--;
        return $ano_diferencia;
}
    
          
      public function UsuariosPais(){
      $fields=array('User.uid','User.pais_id');
      $contarUs = $this->User->find('all',array(
          'conditions'=>array('User.uid >'=>0,array('User.fecha_nacimiento BETWEEN ? AND ?'=> array('2000-10-19','2014-10-27'))),
          'group'=>'User.pais_id',
          'recursive'=>0,$fields));
      
      foreach ($contarUs as $contar){
        echo " <td>". $contar['User']['contar_usuario']."</td>";
        echo " <td>". $contar['Paise']['nombre']."</td>";
        echo " <td>". $contar['User']['fecha_nacimiento']."</td><br>";
          
        }
      }
      public function UsuariosPaisAnio(){
      $fields=array('User.uid','User.pais_id');
      $contarUs = $this->User->find('all',array(
          'conditions'=>array('User.uid >'=>0,'User.created'=>'2014-10-02 09:38:20'),
          'group'=>'User.pais_id',
          'recursive'=>0,$fields));
      
      foreach ($contarUs as $contar){
        echo " <td>". $contar['User']['contar_usuario']."</td>";
        echo " <td>". $contar['Paise']['nombre']."</td>";
        echo " <td>". $contar['User']['fecha_nacimiento']."</td><br>";
          
        }
      }
       public function UsuariosProfesion(){
        
           
      $fields=array('User.uid','User.profesion_id');
      $contarUs = $this->User->find('all',array(
          'conditions'=>array('User.uid >'=>0,array('User.fecha_nacimiento BETWEEN ? AND ?'=> array('2000-10-19','2014-10-27'))),
          'group'=>'User.profesion_id',
          'recursive'=>0,$fields));
      
      foreach ($contarUs as $contar){
        echo " <td>". $contar['User']['contar_usuario']."</td> ";
         echo "<td>". $contar['Profesione']['nombre']."</td><br/>";
          
        }
      }
       public function UsuariosProvincia(){
        
           
      $fields=array('User.uid','User.provincia_id');
      $contarUs = $this->User->find('all',array(
          'conditions'=>array('User.uid >'=>0,),
          'group'=>'User.provincia_id',
          'recursive'=>0,$fields));
      
      foreach ($contarUs as $contar){
        echo " <td>". $contar['User']['contar_usuario']."</td> ";
        echo "<td>". $contar['Provincia']['nombre']."</td><br/>";
        
        
          
        }
      }
      
      

 

      
      
    public function admin_home() {
        $this->redirect(array('controller'=>'home', 'action'=>'login', null, 'admin'=>false));
   }
   public function consulta()
   {
      
   }
}