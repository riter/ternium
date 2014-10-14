<?php
App::uses('AppController', 'Controller');
/**
 * GaleriasTipos Controller
 *
 * @property GaleriasTipo $GaleriasTipo
 * @property PaginatorComponent $Paginator
 */
class GaleriasTiposController extends AppController 
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
		$this->GaleriasTipo->recursive = 0;
		$this->set('galeriasTipos', $this->Paginator->paginate());
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
		if (!$this->GaleriasTipo->exists($id)) 
		{
			throw new NotFoundException(__('Invalid galerias tipo'));
		}
		$options = array('conditions' => array('GaleriasTipo.' . $this->GaleriasTipo->primaryKey => $id));
		$this->set('galeriasTipo', $this->GaleriasTipo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->GaleriasTipo->create();
			if ($this->GaleriasTipo->save($this->request->data)) {

				$message='La Galería tipo ha sido guardada!';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
					return $this->redirect(array('action' => 'index'));
			} else {
				$message='La galeria tipo no pudo guardarse. Por favor, intente de nuevo.';
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
		if (!$this->GaleriasTipo->exists($id)) 
		{
			throw new NotFoundException(__('Invalid galerias tipo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->GaleriasTipo->save($this->request->data)) {
				$message='La Galería tipo ha sido guardada';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
			return $this->redirect(array('action' => 'index'));
			} else {
				$message='La galeria tipo no pudo guardarse. Por favor, intente de nuevo.';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));
				
			}
		} else {
			$options = array('conditions' => array('GaleriasTipo.' . $this->GaleriasTipo->primaryKey => $id));
			$this->request->data = $this->GaleriasTipo->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) 
	{
		$this->GaleriasTipo->id = $id;
		if (!$this->GaleriasTipo->exists()) {
			throw new NotFoundException(__('Invalid galerias tipo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->GaleriasTipo->delete()) {

				$message='La Galería tipo ha sido eliminada!';
				$this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
	

		} else {
					$message='La galeria tipo no se pudo eliminar. Por favor, intente de nuevo.';
					$this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));
				}
		return $this->redirect(array('action' => 'index'));




	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->GaleriasTipo->recursive = 0;
		$this->set('galeriasTipos', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->GaleriasTipo->exists($id)) {
			throw new NotFoundException(__('Invalid galerias tipo'));
		}
		$options = array('conditions' => array('GaleriasTipo.' . $this->GaleriasTipo->primaryKey => $id));
		$this->set('galeriasTipo', $this->GaleriasTipo->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->GaleriasTipo->create();
			if ($this->GaleriasTipo->save($this->request->data)) {
				$this->Session->setFlash(__('La galeria ha sido guardada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La galeria tipo no pudo guardarse. Por favor, intente de nuevo.'));
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
		if (!$this->GaleriasTipo->exists($id)) {
			throw new NotFoundException(__('Invalid galerias tipo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->GaleriasTipo->save($this->request->data)) {

				$message='La Galería tipo ha sido guardada!';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
				return $this->redirect(array('action' => 'index'));
			} else {

					$message='La galeria tipo no pudo guardarse. Por favor, intente de nuevo.';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));
			
				
			}
		} else {
			$options = array('conditions' => array('GaleriasTipo.' . $this->GaleriasTipo->primaryKey => $id));
			$this->request->data = $this->GaleriasTipo->find('first', $options);
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

      if($this->GaleriasTipo->delete($id))
      {		
      	$message='El usuario '.$id.' ha sido eliminado.';
	   $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
		$this->redirect(array('action'=>'index')); 
      }else
      {
      	$message='El usuario '.$id.' no ha sido eliminado.';
	   $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));
		$this->redirect(array('action'=>'index'));
      }
	}
	/*function getTiposGaleriasJSON()
    {
    	$this->autoRender = false; 
	    $this->layout="ajax";

    	$condiciones=array('recursive'=>1); 
    	$galerias=$this->GaleriasTipos->find('all',$condiciones); 
    	echo json_encode($galerias); 

    }
    */

}
