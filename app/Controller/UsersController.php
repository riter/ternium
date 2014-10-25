<?php

class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        // Controller spesific beforeFilter 
        $user = AuthComponent::user();
        $this->loadModel('User');
        $this->loadModel('Paise');
        $this->loadModel('Provincia');
        $this->loadModel('Profesione');



        if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
            if (!AuthComponent::user()) {
                $this->redirect(array('controller' => 'home', 'action' => 'login', null, 'admin' => false));
            } else {
                if (AuthComponent::user('role') != User::_ADMIN) {
                    $this->redirect(array('controller' => 'home', 'action' => 'login', null, 'admin' => false));
                }
            }
        }
    }

    function login_ajax() {
        // $codigo=$this->params->query['codigo'];  
        if (($this->RequestHandler->isAjax())) {
            $this->autoRender = false;
            $datos = $this->request->data;
        } else {
            echo "noajax";
        }
    }

    public function admin_dashboard() {
        
    }

    public function admin_test($user, $password) {

        $this->autoRender = false;

        $data['user'] = $user;
        $data['password'] = $password;

        $data['password'] = AuthComponent::password($data['password']);

        $oUser = $this->User->find('first', array(
            'conditions' => array(
                'User.email' => $data['user'],
                'User.password' => $data['password']
        )));

        if ($oUser) {
            return array(
                'body' => $oUser,
                'fault' => ''
            );
        } else {
            return array(
                'body' => $oUser,
                'fault' => array(
                    'faultcode' => 0,
                    'faultdesc' => 'The user or password is incorrect'
                )
            );
        }
        return json_encode(array('Default' => 'Share OK'));
        $this->request->query('oauth_token');
    }

    public function admin_login() {

        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            }
        }
    }

    public function admin_logout() {
        if ($this->Auth->logout($this->data)) {
            $this->redirect(array('controller' => 'home', 'action' => 'login', null, 'admin' => false));
        }
    }

    public function admin_add() {
        if ($this->request->is('post')) { // $data = $this->UploadPhoto($this->request->data);   //  $data['User']['username']=$data['User']['email']; 
                $this->User->create();
            if ($this->User->save($this->request->data)) {//  $this->enviarEmail($data);
                      $message = 'El Usuario ha sido guardado!';
                      $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $message = 'El Usuario no ha sido guardado. Por favor, intente de nuevo';
                $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));
            }
        }
        $pais      = $this->User->Paise->find('list');
        $provincia = $this->User->Provincia->find('list');
        $profesion = $this->User->Profesione->find('list');
       
        $this->set('pais',$pais);
        $this->set('provincia',$provincia);
        $this->set('profesion',$profesion);
        
    }

    public function admin_index() {

        $this->User->recursive = 2;
        $data = $this->User->find('all');
        $this->set('users', $data);
    }

    public function admin_edit($id) {
        if (!$id) {
            throw new NotFoundException(__('User Invalid'));
            $this->redirect(array('action' => 'index'));
        }

        if (empty($this->data)) {
            $this->data = $this->User->findById(array('id' => $id));
           } else {
            $newdata;
            $data = $this->request->data;

            $this->User->id = $id;
            $anData = $this->User->findById(array('id' => $id));


            $newdata['User']['id'] = $id;
            $newdata['User']['nombre'] = $data['User']['nombre'];
            $newdata['User']['apellido'] = $data['User']['apellido'];
            $newdata['User']['telefono'] = $data['User']['telefono'];
            $newdata['User']['fecha_nacimiento'] = $data['User']['fecha_nacimiento'];
            $newdata['User']['username'] = $data['User']['username'];
            $newdata['User']['email'] = $data['User']['email'];
            $newdata['User']['role'] = $data['User']['role'];
            $newdata['User']['pais_id'] = $data['User']['pais_id'];
            if(empty($newdata['User']['provincia_id']))
                
          //  $newdata['User']['provincia_id'] = "";//$data['User']['provincia_id'];
            
            $newdata['User']['profesion_id'] = $data['User']['profesion_id'];

            if ($this->User->save($newdata)) {
              $message = 'El Usuario ha sido guardado!';
              $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
                $this->redirect(array('action' => 'index'), NULL, TRUE);
            }
        }
        $pais      = $this->User->Paise->find('list');
        $provincia = $this->User->Provincia->find('list');
        $profesion = $this->User->Profesione->find('list');
       
        $this->set('pais',$pais);
        $this->set('provincia',$provincia);
        $this->set('profesion',$profesion);
    }

    /*The compact function returns an associative array, built by taking the names specified in the input array, using them as keys, and taking the values of the variables referenced by those names and making those the values*/


    /* Agregue esta funcion para personalizar errores */
    public function beforeDelete($cascade = true) {
        $count = $this->Paise->find("count", array("conditions" => array("user_id" => $this->id)
                //deleteAll(mixed $conditions, $cascade = true, $callbacks = false)
        ));
        if ($count == 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        ///$this->User->id = $id;//var_dump($id);exit;
        if (!$id)
            throw new NotFoundException('Usuario Invalido.');

        try {
            if ($this->User->delete($id)) {
                $message = 'El usuario ha sido eliminado';
                $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
                $this->redirect(array('action' => 'index'));
            }
        } catch (Exception $ex) {
            $message = 'Esta eliminando un usuario que es necesario en otra entidad';
            $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));
            $this->redirect(array('action' => 'index'));
        }
    }

    //---------------------------------------
    private function UploadPhoto($data) {
        try {
            if (!empty($this->data['User']['photo']['name'])) {
                $file = $this->data['User']['photo'];
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                $arr_ext = array('jpg', 'png', 'gif');
                if (in_array($ext, $arr_ext)) {

                    $tmp_name = $data['User']['photo']['tmp_name'];
                    $name = $data['User']['nombre'] . '_' . $data['User']['apellido'] . '.jpg';
                    $destination = WWW_ROOT . 'uploads/photo/' . $name;
                    move_uploaded_file($tmp_name, $destination);
                    $data['User']['photo'] = $name;
                } else {
                    $data['User']['photo'] = '';
                }
            } else {
                $data['User']['photo'] = '';
            }
        } catch (Exception $ex) {
            print_r($ex->getMessage());
        }
        return $data;
    }

    private function enviarEmail($data) {

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

          } */
    }

    public function registro() {
        $this->autoRender = false;
        $this->response->type('json');
        try {
            $nombre = $this->request->query['nombre'];
            $apellido = $this->request->query['apellido'];
            $email = $this->request->query['email'];
            $telefono = $this->request->query['telefono'];
            $fecha_nacimiento=$this->request->query['fecha_nacimiento'];
            $username = $this->request->query['username'];
            $password = $this->request->query['password'];
            $pais = $this->request->query['pais_id'];
            $provincia = $this->request->query['provincia_id'];
            $profesion = $this->request->query['profesion_id'];

            //$password = AuthComponent::password($password);
            $condiciones = array('User.nombre' => $nombre, 'User.apellido' => $apellido, 'User.email' => $email, 'User.telefono' => $telefono, 'User.fecha_nacimiento'=>$fecha_nacimiento,'User.username' => $username, 'User.password' => $password, 'User.pais_id' => $pais,'User.provincia_id'=>$provincia,'User.profesion_id'=>$profesion);


            if ($this->request->is('get')) {
                $this->User->create();
                if ($this->User->save($this->request->query)) {
                    $user = $this->User->find('all', array('conditions' => $condiciones));
                    echo "Guadado!";
                }
            }
        } catch (Exception $ex) {
            echo 'no se pudo guardar!';
        }
        if (!empty($user)) {
            return json_encode(array('Default' => $user));
        } else {
            return json_encode(array('Default' => null));
        }

        return json_encode(array('Default' => 'Required Request POST'));
    }

    /*    API Method */

    public function login() {
        $this->autoRender = false;
        $this->response->type('json');
        
        $username = $this->request->data['username'];
        $password = $this->request->data['password'];

        $password = AuthComponent::password($password);
        $condiciones = array('username' => $username, 'password' => $password);

        if ($this->request->is('post')) {
            $user = $this->User->find('first', array('conditions' => $condiciones));

            if (!empty($user)) {
                return json_encode(array('Default' => $user));
            } else {
                return json_encode(array('Default' => null));
            }
        }
        return json_encode(array('Default' => 'Required Request POST'));
    }

    /*****************ADMIN LOGIN FACEBOOK**********************/

    public function login_facebook() {

        $this->autoRender = false;
        $this->response->type('json');
        $email = $this->request->query['email'];
       
        $uid=$this->request->query['uid'];
       $condiciones = array('email' => $email);

        if ($this->request->is('get')) {
                    $user = $this->User->find('first', array('conditions' => $condiciones));
                   
                    if($user)
                   {
                       if(empty($user['User']['uid'])||$user['User']['uid']==null)
                       {
                           
                        $user['User']['uid']=$uid;//$this->request->data['uid'];
                        
                        
                        $this->User->create();
                      
                        $this->User->save($user);//exit;
                       
                       }
                      }  else {
                       $condiciones = array('uid' => $uid);
                       $user = $this->User->find('first', array('conditions' => $condiciones));
                       
                   }
               if (!empty($user)) {
                return json_encode(array('Default' => $user));
            } else {
                return json_encode(array('Default' => null));
            }
        }
        return json_encode(array('Default' => 'Required Request POST'));
    }

   

}
