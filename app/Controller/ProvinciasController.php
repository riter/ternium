<?php
App::uses('AppController', 'Controller');
/**
 * Provincias Controller
 *
 * @property Provincia $Provincia
 * @property PaginatorComponent $Paginator
 */
class ProvinciasController extends AppController {

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
		$this->Provincia->recursive = 0;
		$this->set('provincias', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Provincia->exists($id)) {
			throw new NotFoundException(__('Invalid provincia'));
		}
		$options = array('conditions' => array('Provincia.' . $this->Provincia->primaryKey => $id));
		$this->set('provincia', $this->Provincia->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Provincia->create();
			if ($this->Provincia->save($this->request->data)) {
				$message='La Provincia ha sido guardada!';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));	
					return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));	
				//$this->Session->setFlash(__('La provincia no pudo ser guardada. Por favor, intente de nuevo.'));
			}
		}
		$pais = $this->Provincia->Pai->find('list');
		$this->set(compact('pais'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Provincia->exists($id)) {
			throw new NotFoundException(__('Invalid provincia'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Provincia->save($this->request->data)) {
				$message='La provincia ha sido guardada!';
				$this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));	
				return $this->redirect(array('action' => 'index'));
			} else {
				$message='La provincia no pudo ser guardada. Por favor, intente de nuevo.';
				$this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));	
			}
		} else {
			$options = array('conditions' => array('Provincia.' . $this->Provincia->primaryKey => $id));
			$this->request->data = $this->Provincia->find('first', $options);
		}
		$pais = $this->Provincia->Pai->find('list');
		$this->set(compact('pais'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Provincia->id = $id;
		if (!$this->Provincia->exists()) {
			throw new NotFoundException(__('Invalid provincia'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Provincia->delete()) {

           $message='La provincia ha sido eliminada.';
			$this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));	
			} else {
			$message='La provincia no ha sido eliminada. Por favor intente de nuevo';
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
		$this->Provincia->recursive = 0;
		$this->set('provincias', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Provincia->exists($id)) {
			throw new NotFoundException(__('Invalid provincia'));
		}
		$options = array('conditions' => array('Provincia.' . $this->Provincia->primaryKey => $id));
		$this->set('provincia', $this->Provincia->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Provincia->create();
			if ($this->Provincia->save($this->request->data)) {
		    $message='La provincia ha sido guardada!';
			$this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));	
     		return $this->redirect(array('action' => 'index'));
			} else {
			$message='La provincia no ha sido guardada. Por favor intente de nuevo';
			$this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));	
			}
		}
		$pais = $this->Provincia->Paise->find('list');
		$this->set(compact('pais'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Provincia->exists($id)) {
			throw new NotFoundException(__('Invalid provincia'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Provincia->save($this->request->data)) {
			$message='La provincia ha sido guardada!';
			$this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));	
			 	return $this->redirect(array('action' => 'index'));
			} else {
					
				$message='La provincia no pudo ser guardada. Por favor, intente de nuevo!';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));
			
			}
		} else {
			$options = array('conditions' => array('Provincia.' . $this->Provincia->primaryKey => $id));
			$this->request->data = $this->Provincia->find('first', $options);
		}
		$pais = $this->Provincia->Paise->find('list');
		$this->set(compact('pais'));
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
       throw new NotFoundException('Provincias Invalido.');

      if($this->Provincia->delete($id))
      {

      		$message='La provincia'. $message .' ha sido eliminada!';
			$this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
			$this->redirect(array('action'=>'index'));
      }
      
	}
}
