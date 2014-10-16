<?php
App::uses('AppController', 'Controller');
/**
 * CalculoTipos Controller
 *
 * @property CalculoTipo $CalculoTipo
 * @property PaginatorComponent $Paginator
 */
class CalculosTiposController extends AppController 
{

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CalculosTipo->recursive = 0;
		$this->set('calculosTipos', $this->Paginator->paginate());
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->CalculosTipo->recursive = 0;
		$this->set('calculosTipos', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->CalculosTipo->exists($id)) {
			throw new NotFoundException(__('Invalid calculos tipo'));
		}
		$options = array('conditions' => array('CalculosTipo.' . $this->CalculosTipo->primaryKey => $id));
		$this->set('calculosTipo', $this->CalculosTipo->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CalculosTipo->create();
			if ($this->CalculosTipo->save($this->request->data)) {

			$message='El tipo de Calculo ha sido guardado.';
		   $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
	  		return $this->redirect(array('action' => 'index'));
			} else {
					$message='El tippo de Calculo no pudo guardarse. Por favor, intente de nuevo.';
	   $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));
	
				$this->Session->setFlash(__('La calculo tipo no pudo guardarse. Por favor, intente de nuevo.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		// echo $id; exit();
		
		if (!$this->CalculosTipo->exists($id)) {
			throw new NotFoundException(__('Invalid calculos tipo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CalculosTipo->save($this->request->data)) {

				$message='El Calculo tipo ha sido guardado!';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
				return $this->redirect(array('action' => 'index'));
			} else {

					$message='La calculo tipo no pudo guardarse. Por favor, intente de nuevo.';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));
			
				
			}
		} else {
			$options = array('conditions' => array('CalculosTipo.' . $this->CalculosTipo->primaryKey => $id));
			$this->request->data = $this->CalculosTipo->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) 
	{
	   if(!$id)
	   	throw new NotFoundException('Tipos de Galerias  Invalidos');

      if($this->CalculosTipo->delete($id))
      {		
      	$message='El Comentario ha sido eliminado.';
	   $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
		$this->redirect(array('action'=>'index')); 
      }else
      {
      	$message='El Comentario '.$id.' no ha sido eliminado.';
	   $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));
		$this->redirect(array('action'=>'index'));
      }
	}
	/*function getTiposGaleriasJSON()
    {
    	$this->autoRender = false; 
	    $this->layout="ajax";

    	$condiciones=array('recursive'=>1); 
    	$calculos=$this->CalculoTipos->find('all',$condiciones); 
    	echo json_encode($calculos); 

    }
    */
      public function lists()
    {
        $this->autoRender = false;
         $this->response->type('json');
        if ($this->request->is('get')) {
            $calculosTipos=$this->CalculosTipo->find('all');

            if(!empty($calculosTipos)){
                return json_encode(array('Default' => $calculosTipos));
            }else{
                return json_encode(array('Default' => null));
            }
        }
        return json_encode(array('Default' => 'Required Request GET'));
    }

}
