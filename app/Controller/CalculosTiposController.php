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
		$this->set('calculoTipos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) 
	{
		if (!$this->CalculosTipo->exists($id)) 
		{
			throw new NotFoundException(__('Invalid calculos tipo'));
		}
		$options = array('conditions' => array('CalculosTipo.' . $this->CalculoTipo->primaryKey => $id));
		$this->set('calculosTipo', $this->CalculoTipo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CalculosTipo->create();
			if ($this->CalculosTipo->save($this->request->data)) {

				$message='El Calculo tipo ha sido guardado!';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
					return $this->redirect(array('action' => 'index'));
			} else {
				$message='La Calculo tipo no pudo guardarse. Por favor, intente de nuevo.';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));
				
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) 
	{
		if (!$this->CalculoTipo->exists($id)) 
		{
			throw new NotFoundException(__('Invalid calculos tipo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CalculosTipo->save($this->request->data)) {
				$message='El Calculo tipo ha sido guardado';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
			return $this->redirect(array('action' => 'index'));
			} else {
				$message='La Calculo tipo no pudo guardarse. Por favor, intente de nuevo.';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));
				
			}
		} else {
			$options = array('conditions' => array('CalculoTipo.' . $this->CalculosTipo->primaryKey => $id));
			$this->request->data = $this->CalculosTipo->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function delete($id = null) 
	{
		$this->CalculosTipo->id = $id;
		if (!$this->CalculosTipo->exists()) {
			throw new NotFoundException(__('Invalid calculos tipo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CalculosTipo->delete()) {

				$message='El Calculo tipo ha sido eliminada!';
				$this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
	

		} else {
					$message='El calculo tipo no se pudo eliminar. Por favor, intente de nuevo.';
					$this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));
				}
		return $this->redirect(array('action' => 'index'));




	}*/

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->CalculoTipo->recursive = 0;
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
		$options = array('conditions' => array('CalculoTipo.' . $this->CalculosTipo->primaryKey => $id));
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
      	$message='El Comentario '.$id.' ha sido eliminado.';
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

}
