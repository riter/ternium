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
        $listados_calculos=array($this->listadosCantidadTotal("Calculos realizados"));
        $listados_usuarios=array($this->listadosCantidadTotal("Usuarios registrados"));
        $listados_paises= array($this->listadosCantidadTotal("Paises registrados"));
        $this->set('recibir', $recibir);
        $this->set('listados_calculos',$listados_calculos);
        $this->set('listados_usuarios',$listados_usuarios);
        $this->set('listados_paises',$listados_paises);
        
    }

    public function listadosCantidadTotal($listado) {
        $listados[] = array();
        switch ($listado) {
            case "Usuarios registrados";
                $listado = $this->User->find('count', array('conditions' => array('User.uid >' => 0)));
                return $listado;
                break;
            case "Calculos realizados";
                $cont = $this->Calculo->find('count', array('conditions' => array('Calculo.id >' => 0)));
                return  $cont;
                break;
             case "Paises registrados";
                $cont = $this->User->find('count', array('conditions' => array('User.id >' => 0,'User.pais_id >'=>0)));
                return $cont;
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

    public function UsuariosPais() {//prueba
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
        $contarEdad = $this->User->find('all', array(
            'conditions' => array('User.uid >' => 0, array('User.fecha_nacimiento BETWEEN ? AND ?' => array('2000-10-19', '2014-10-27'))),
            'limit' => 10,
            'recursive' => 0));
        $edad = 0;
        $i = 0;
        foreach ($contarEdad as $contar) {

            $fechaaa = $contar['User']['fecha_nacimiento'];
            $edad = $this->calcular_edad($fechaaa);

            if ($edad>=10 &&$edad <= 25) {
                $cargar[$i][0] = $contar['User']['contar_usuario'] . " USUARIO 23/25 A&Ntilde;OS";
            } elseif ($edad>25 && $edad <= 29) {
                $cargar[$i][0] = $contar['User']['edad_usuario'] . " USUARIOS 26/29 A&Ntilde;OS";
            } elseif ($edad>29 &&$edad <= 35) {
                $cargar[$i][0] = $contar['User']['edad_usuario'] . " USUARIOS 30/35 A&Ntilde;OS <br/>";
            } elseif ($edad>35 &&$edad <= 42) {
                $cargar[$i][0] = $contar['User']['edad_usuario'] . " USUARIOS 36/42 A&Ntilde;OS <br/>";
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
            'recursive' => 0));

        $i = 0;
        foreach ($contarUpanio as $contar) {
            $cargar[$i][0] = $contar['User']['contar_usuario'] . " ";
            $cargar[$i][1] = strtoupper($contar['Paise']['nombre']) . " <br/>";
            
            $i++;
        }
        return $cargar;
    }

    public function UsuariosProfesion() {
        $cargar[] = array();

       
        $contarUs = $this->User->find('all', array(
            'conditions' => array('User.uid >' => 0, array('User.fecha_nacimiento BETWEEN ? AND ?' => array('2000-10-19', '2014-10-27'))),
            'group' => 'User.profesion_id',
            'recursive' => 0)); 

        $i = 0;
        foreach ($contarUs as $contar) {
            $cargar[$i][0] = $contar['User']['contar_usuario'] . " ";
            $cargar[$i][1] = strtoupper($contar['Profesione']['nombre']) . "<br/>";
            $i++;
        }
        return $cargar;
    }

    public function UsuariosProvincia() {
        $cargar[] = array();

        
        $contarUs = $this->User->find('all', array(
            'conditions' => array('User.uid >' => 0, array('User.fecha_nacimiento BETWEEN ? AND ?' => array('2000-10-19', '2014-10-27'))),
            'group' => 'User.provincia_id',
            'recursive' => 0)); //,'fields'=>$fields
        $i = 0;

        foreach ($contarUs as $contar) {
            $cargar[$i][0] = $contar['User']['contar_usuario'] . " ";
            $cargar[$i][1] = strtoupper($contar['Provincia']['nombre']) . "<br/>";
            $i++;
        }
        return $cargar;
    }

    public function admin_home() {
        $this->redirect(array('controller' => 'home', 'action' => 'login', null, 'admin' => false));
    }

    public function consulta() {
        
    }

}
