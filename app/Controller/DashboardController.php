<?php

class DashboardController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

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
            $this->redirect(array('controller' => 'home', 'action' => 'login', null, 'admin' => false));
        } else {
            if (AuthComponent::user('role') != User::_ADMIN) {
                $this->redirect(array('controller' => 'home', 'action' => 'login', null, 'admin' => false));
            }
        }
    }

    public function admin_index() {
       // $up = $this->UsuariosPais();
        $upa = $this->UsuariosPaisFecha();
        $ue = $this->UsuariosEdad();
        $uprof = $this->UsuariosProfesion();
        $prov = $this->UsuariosProvincia();

        $recibir = array($up, $upa, $ue, $uprof, $prov);
        $listados_calculos=array($this->listadosUsuarios("Calculos realizados"));
        $listados_usu=array($this->listadosUsuarios("Usuarios registrados "));
        $this->set('recibir', $recibir);
        $this->set('listados_calculos',$listados_calculos);
        $this->set('listados_usuarios',$listados_usu);
    }

    public function listadosUsuarios($listado) {
        $listados[] = array();
        switch ($listado) {
            case "Usuarios registrados";
                $listados = $this->User->find('count', array('conditions' => array('User.uid >' => 0)));
                return "Usuarios registrados".$listados;
                break;
            case "Calculos realizados";
                $cont = $this->Calculo->find('count', array('conditions' => array('Calculo.id >' => 0)));
                return  "Calculos realizados ".$cont;
                break;
             case "Paises registrados";
                $cont = $this->User->find('count', array('conditions' => array('User.id >' => 0,'User.pais_id'=>0)));
                echo "Calculos paises " . $cont;
                break;
            case "Descargas de la apps";
                echo "en veremos!";
                break;
            case "Descargas pdf";
                break;
        }
    }

    public function calcular_edad($fechanacimiento) {
        list($ano, $mes, $dia) = explode("-", $fechanacimiento);
        $ano_diferencia = date("Y") - $ano;
        $mes_diferencia = date("m") - $mes;
        $dia_diferencia = date("d") - $dia;
        if ($dia_diferencia < 0 || $mes_diferencia < 0)//si no funciona en todos los casos probar con &&
            $ano_diferencia--;
        return $ano_diferencia;
    }

    public function UsuariosPais() {
        $cargar[] = array();
        $fecha_entrada = strtotime("19-11-2008 21:00:00");
        $fields = array('User.uid', 'User.pais_id');
        $contarUpaiss = $this->User->find('all', array(
            'conditions' => array('User.uid >' => 0, array('User.fecha_nacimiento <=' => $fecha_entrada)),
            'group' => 'User.pais_id',
            'recursive' => 0));
        $i = 0;

        foreach ($contarUpaiss as $contar) {
            $cargar[$i][0] = $contar['User']['contar_usuario'] . " ";
            $cargar[$i][1] = $contar['User']['nombre'] . " ";
            $cargar[$i][2] = $contar['User']['fecha_nacimiento'] . " <br/>";
            $i++;
        }

        return $cargar;
    }

    public function UsuariosEdad() {
        $cargar[] = array();
        $fields = array('User.uid', 'User.contar_usuario');
        $contarEdad = $this->User->find('all', array(
            'conditions' => array('User.uid >' => 0, array('User.fecha_nacimiento BETWEEN ? AND ?' => array('2000-10-19', '2014-10-27'))),
            'limit' => 10, //'group' => 'User.fecha_nacimiento',
            'recursive' => 0)); //,'fields'=>$fields
        $edad = 0;
        $i = 0;
        foreach ($contarEdad as $contar) {

            $fechaaa = $contar['User']['fecha_nacimiento'];
            $edad = $this->calcular_edad($fechaaa);

            if ($edad>=10 &&$edad <= 25) {// && $edad<26)
                $cargar[$i][0] = $contar['User']['contar_usuario'] . " usuarios 23/25 a&ntilde;os <br/>";
            } elseif ($edad>25 && $edad <= 29) {
                $cargar[$i][0] = $contar['User']['edad_usuario'] . " usuarios 26/29 a&ntilde;os <br/>";
            } elseif ($edad>29 &&$edad <= 35) {
                $cargar[$i][0] = $contar['User']['edad_usuario'] . " usuarios 30/35 a&ntilde;os <br/>";
            } elseif ($edad>35 &&$edad <= 42) {
                $cargar[$i][0] = $contar['User']['edad_usuario'] . " usuarios 36/42 a&ntilde;os <br/>";
            }
            $i++;
        }
        return $cargar;
    }

    public function UsuariosPaisFecha() {

        $cargar[] = array();
          //$fecha_entrada = new DateTime('2014-10-02 09:38:20');  $fecha_entrada1=strtotime("19-11-2008 21:00:00");
        
        $contarUpanio = $this->User->find('all', array(
            'conditions' => array('User.uid >' => 0, 'User.created <=' =>'2014-10-15 00:00:00'),
            'group' => 'User.pais_id',
            'recursive' => 0)); //,'fields'=>$fields

        $i = 0;
        foreach ($contarUpanio as $contar) {
            $cargar[$i][0] = $contar['User']['contar_usuario'] . " ";
            $cargar[$i][1] = $contar['User']['nombre'] . " ";
            $cargar[$i][2] = $contar['User']['created'] . " <br/>";
            $i++;
        }
        return $cargar;
    }

    public function UsuariosProfesion() {
        $cargar[] = array();

        $fields = array('User.uid', 'User.profesion_id');
        $contarUs = $this->User->find('all', array(
            'conditions' => array('User.uid >' => 0, array('User.fecha_nacimiento BETWEEN ? AND ?' => array('2000-10-19', '2014-10-27'))),
            'group' => 'User.profesion_id',
            'recursive' => 0)); //,'fields'=>$fields

        $i = 0;
        foreach ($contarUs as $contar) {
            $cargar[$i][0] = $contar['User']['contar_usuario'] . " ";
            $cargar[$i][1] = $contar['Profesione']['nombre'] . "<br/>";
            $i++;
        }
        return $cargar;
    }

    public function UsuariosProvincia() {
        $cargar[] = array();

        $fields = array('User.uid', 'User.provincia_id');
        $contarUs = $this->User->find('all', array(
            'conditions' => array('User.uid >' => 0, array('User.fecha_nacimiento BETWEEN ? AND ?' => array('2000-10-19', '2014-10-27'))),
            'group' => 'User.provincia_id',
            'recursive' => 0)); //,'fields'=>$fields
        $i = 0;

        foreach ($contarUs as $contar) {
            $cargar[$i][0] = $contar['User']['contar_usuario'] . " ";
            $cargar[$i][1] = $contar['Provincia']['nombre'] . "<br/>";
            $i++;
        }//  echo "<br/>";
        return $cargar;
    }

    public function admin_home() {
        $this->redirect(array('controller' => 'home', 'action' => 'login', null, 'admin' => false));
    }

    public function consulta() {
        
    }

}
