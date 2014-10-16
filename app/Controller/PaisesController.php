<?php
App::uses('AppController', 'Controller');
/**
 * Paises Controller
 *
 * @property Paise $Paise
 * @property PaginatorComponent $Paginator
 */
class PaisesController extends AppController 
{

/**
 *  Components  
 *  @var array
 */

 public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Paise->recursive = 0;
		$this->set('paises', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Paise->exists($id)) {
			throw new NotFoundException(__('Invalid paise'));
		}
		$options = array('conditions' => array('Paise.' . $this->Paise->primaryKey => $id));
		$this->set('paise', $this->Paise->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Paise->create();
			if ($this->Paise->save($this->request->data)) {
				 $message='El Pais ha sido guardada!';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
				return $this->redirect(array('action' => 'index'));
			} else {

				 $message='El pais no pudo ser guardado. Por favor, intentelo de nuevo.';
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
	public function edit($id = null) {
		if (!$this->Paise->exists($id)) {
			throw new NotFoundException(__('Invalid paise'));
		}
		
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Paise->save($this->request->data)) {
				 $message='El Pais ha sido guardado!';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
							return $this->redirect(array('action' => 'index'));
			} else 
	     	{
			  $message='El pais no pudo ser guardado. Por favor, intentelo de nuevo.';
			  $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));
				
			 }
			$options = array('conditions' => array('Paise.' . $this->Paise->primaryKey => $id));
			$this->request->data = $this->Paise->find('first', $options);
		
	}
}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Paise->id = $id;
		if (!$this->Paise->exists()) {
			throw new NotFoundException(__('Invalid paise'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Paise->delete()) {
			 $message='El pais ha sido eliminado.';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
			} else {
				 $message='El pais no ha sido eliminado. Por favor intente de nuevo';
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
		$this->Paise->recursive = 0;
		$this->set('paises', $this->Paise->find('all'));
		
		//$this->set('paises', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Paise->exists($id)) {
			throw new NotFoundException(__('Invalid paise'));
		}
		$options = array('conditions' => array('Paise.' . $this->Paise->primaryKey => $id));
		$this->set('paise', $this->Paise->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Paise->create();
			if ($this->Paise->save($this->request->data)) {
				 $message='El pais ha sido guardado.';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
					return $this->redirect(array('action' => 'index'));
			} else {
				 $message='El pais no pudo ser guardado. Por favor, intentelo de nuevo.';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));
				
		
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
		if (!$this->Paise->exists($id)) {
			throw new NotFoundException(__('Invalid paise'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Paise->save($this->request->data)) {

				 $message='El pais ha sido guardado.';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
				return $this->redirect(array('action' => 'index'));
			} else {
 			$message='El pais no pudo ser guardado. Por favor, intentelo de nuevo.';
		  $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));
			
			}
		} else {
			$options = array('conditions' => array('Paise.' . $this->Paise->primaryKey => $id));
			$this->request->data = $this->Paise->find('first', $options);
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
       throw new NotFoundException('Pais Invalido.');

      if($this->Paise->delete($id))
      {
      	$message='El pais ha sido eliminado!';//$paise['Paise']['nombre']
		 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
		  $this->redirect(array('action'=>'index'));
      }else {
      		$message='El pais no se pudo eliminar!';
		 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));
		 $this->redirect(array('action'=>'index'));
		
      }
      
	}

    /*    API Method*/
    public function lists()
    {
        $this->autoRender = false;
        //  $this->response->type('json');
        if ($this->request->is('get')) {
            $paises=$this->Paise->find('all');

            if(!empty($paises)){
                return json_encode(array('Default' => $paises));
            }else{
                return json_encode(array('Default' => null));
            }
        }
        return json_encode(array('Default' => 'Required Request GET'));
    }
}
