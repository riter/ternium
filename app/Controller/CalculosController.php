<?php

App::uses('AppController', 'Controller');

/**
 * Calculos Controller
 *
 * @property Calculo $Calculo
 * @property PaginatorComponent $Paginator
 */
class CalculosController extends AppController {

    public $components = array('Paginator');

    public function view($id = null) {
        if (!$this->Calculo->exists($id)) {
            throw new NotFoundException(__('Invalid calculo'));
        }

        $options = array('conditions' => array('calculo.' . $this->Calculo->primaryKey => $id));
        $this->set('calculo', $this->Calculo->find('first', $options));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {

        // $mostrar=$this->Calculo->query("select * from calculos");
        //echo "<pre>";print_r($mostrar);echo "</pre>";exit;
        $this->Calculo->recursive = 2;
        $data = $this->Calculo->find('all');
        $this->set('calculos', $data);

        // $this->Calculo->recursive = 0;
        //  $this->set('calculos', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Calculo->exists($id)) {
            throw new NotFoundException(__('Invalid calculo'));
        }
        $options = array('conditions' => array('Calculo.' . $this->Calculo->primaryKey => $id));
        $this->set('calculo', $this->Calculo->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        $this->loadModel('CalculosTipo');
        $this->loadModel('User');
       
        if ($this->request->is('post')) {
            $data = $this->request->data;
               
            $this->Calculo->create();

            if ($this->Calculo->save($data)) {
                $message = 'La Calculo ha sido guardado.';
                $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
                 print_r($data);exit;
                return $this->redirect(array('action' => 'index'));
            } else {
                $message = 'La Calculo no pudo ser guardada.';
                $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));
                $this->Session->setFlash($message, $layout);
            }
        }

        $users = $this->User->find('list');
        $calculostipos = $this->CalculosTipo->find('list');


        $this->set('calculostipos', $calculostipos);
        $this->set('users', $users);
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->loadModel('CalculosTipo');
        $this->loadModel('User');

        /* if (!$this->Calculo->exists($id)) {
          throw new NotFoundException(__('Invalid calculo'));
          }
         */if ($this->request->is(array('post', 'put'))) {
            if ($this->Calculo->save($this->request->data)) {
                $message = 'El calculo ha sido guardado!';
                $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
                return $this->redirect(array('action' => 'index'));
            } else {

                $message = 'El calculo no pudo ser guardado. Por favor, intente de nuevo!';
                $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));
            }
        } else {
            $options = array('conditions' => array('Calculo.' . $this->Calculo->primaryKey => $id));
        }
        $users = $this->User->find('list');
        $calculostipos = $this->CalculosTipo->find('list');
        $this->set('users', 'calculostipos');
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        if (!$id)
            throw new NotFoundException('Calculo  Invalida');

        if ($this->Calculo->delete($id)) {
            $message = 'EL calculo ' . $id . ' Ha sido eliminado.';
            $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
            $this->redirect(array('action' => 'index'));
        }
    }

    function getCalculosJSON() {
        $this->autoRender = false;
        $this->layout = "ajax";

        $condiciones = array('recursive' => 1);
        $calculos = $this->Calculo->find('all', $condiciones);
        echo json_encode($calculos);
    }

    function admin_getCalculos() {
        $condiciones = array('recursive' => 1);
        $calculos = $this->Calculo->find('all', $condiciones);

        pr($calculos);
    }

    public function lists() {
        $this->autoRender = false;
        $this->response->type('json');
        
        
        if ($this->request->is('get')) {
                
            if (!empty($this->request->query['id'])) {
                $calculo = $this->Calculo->find('all'); //,array('conditions' => array('Calculo.pais_id' => $this->request->query['id'])));
            } else {
                $calculo = $this->Calculo->find('all');
            }

            if (!empty($calculo)) {
                return json_encode(array('Default' => $calculo));
            } else {
                return json_encode(array('Default' => null));
            }
        }
        return json_encode(array('Default' => 'Required Request GET'));
    }

    public function insertar_calculo() {

        $this->autoRender = false;
        $this->response->type('json');
        try {
            if ($this->request->is('get')) {
                $this->Calculo->create();
                $calculo = $this->Calculo->save($this->request->query);

                if ($calculo && !empty($calculo)) {
                    return json_encode(array('Default' => $calculo));
                } else {
                    return json_encode(array('Default' => null));
                }
            }
            return json_encode(array('Default' => 'Required Request GETs'));
        } catch (Exception $ex) {
            return json_encode(array('Default' => $ex->getMessage()));
        }
    }

    public function actualizar_calculo() {
        $id = $this->request->query['id'];
        $this->autoRender = false;
        $this->response->type('json');
        try {
            if ($this->request->is(array('get', 'put'))) {
                $this->query = $this->Calculo->findById(array('id' => $id));
                $calculo = $this->Calculo->save($this->request->query);

                if ($calculo && !empty($calculo)) {

                    return json_encode(array('Default' => $calculo));
                } else {
                    return json_encode(array('Default' => null));
                }
            } else {

                return json_encode(array('Default' => 'Required GET'));
            }
            return json_encode(array('Default' => 'Required Request GET'));
        } catch (Exception $ex) {
            return json_encode(array('Default' => $ex->getMessage()));
        }
    }

    public function eliminar_calculo() {
        $id = $this->request->query['id'];
        $this->autoRender = false;
        $this->response->type('json');
        try {
            if ($this->Calculo->delete($id)) {
                if ($calculo && !empty($calculo)) {
                    return json_encode(array('Default' => $calculo));
                } else {
                    return json_encode(array('Default' => null));
                }
            } else {

                return json_encode(array('Default' => 'Required GET'));
            }
            return json_encode(array('Default' => 'Required Request GET'));
        } catch (Exception $ex) {
            return json_encode(array('Default' => $ex->getMessage()));
        }
    }
    public function duplicar_calculo() {
        $id = $this->request->query['id'];
        $this->autoRender = false;
        $this->response->type('json');
        try {
            if ($this->request->is(array('get', 'put'))) {
                $calculos = $this->Calculo->find('first',array('conditions'=>array('Calculo.id'=> $id),'recursive'=>-1));
                //print_r($calculos);exit;
                //$calculos2=$calculos['Calculo'];
                //$calculos2['id']='';
                
               
                if ($calculos && !empty($calculos)) {

                    $this->Calculo->create();
                    unset($calculos['Calculo']['id']);
                    $calculo = $this->Calculo->save($calculos);
                    if($calculo){
                       return json_encode(array('Default' => $calculo)); 
                    }else {
                        return json_encode(array('Default' => null,'Message'=>'No se pudo guardar!'));
                    }
                } else {

                    return json_encode(array('Default' => null));
                }
            }
            return json_encode(array('Default' => 'Required Request GET'));
        } catch (Exception $ex) {
            return json_encode(array('Default' => $ex->getMessage()));
        }
    }



}
