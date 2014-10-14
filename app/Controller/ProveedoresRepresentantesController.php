<?php
App::uses('AppController', 'Controller');
/**
 * ProveedoresRepresentantes Controller
 *
 * @property ProveedoresRepresentante $ProveedoresRepresentante
 * @property PaginatorComponent $Paginator
 */
class ProveedoresRepresentantesController extends AppController 
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
		$this->ProveedoresRepresentante->recursive = 0;
		$this->set('proveedoresRepresentantes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProveedoresRepresentante->exists($id)) {
			throw new NotFoundException(__('Invalid proveedores representante'));
		}
		$options = array('conditions' => array('ProveedoresRepresentante.' . $this->ProveedoresRepresentante->primaryKey => $id));
		$this->set('proveedoresRepresentante', $this->ProveedoresRepresentante->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProveedoresRepresentante->create();
			if ($this->ProveedoresRepresentante->save($this->request->data)) {
				 $message='El proveedor representante ha sido guardado!';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				 $message='El proveedor representante no pudo ser guardado. Por favor, intente de nuevo.';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));
				}
		}
		$proveedores = $this->ProveedoresRepresentante->Proveedore->find('list');
		$this->set(compact('proveedores'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ProveedoresRepresentante->exists($id)) {
			throw new NotFoundException(__('Invalid proveedores representante'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProveedoresRepresentante->save($this->request->data)) {
				 $message='El proveedor representante ha sido guardado!';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
				 return $this->redirect(array('action' => 'index'));
			} else {
				 $message='El proveedor representante no pudo ser guardado. Por favor, intente de nuevo.';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));
				
			}
		} else {
			$options = array('conditions' => array('ProveedoresRepresentante.' . $this->ProveedoresRepresentante->primaryKey => $id));
			$this->request->data = $this->ProveedoresRepresentante->find('first', $options);
		}
		$proveedores = $this->ProveedoresRepresentante->Proveedore->find('list');
		$this->set(compact('proveedores'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ProveedoresRepresentante->id = $id;
		if (!$this->ProveedoresRepresentante->exists()) {
			throw new NotFoundException(__('Invalid proveedor representante'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProveedoresRepresentante->delete()) {
			 $message='El proveedor representante ha sido guardado!';
		    $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
			
		} else {
			 $message='El proveedor representante no pudo ser guardado. Por favor, intente de nuevo!';
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
		$this->ProveedoresRepresentante->recursive = 0;
		$this->set('proveedoresRepresentantes', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ProveedoresRepresentante->exists($id)) {
			throw new NotFoundException(__('Invalid proveedores representante'));
		}
		$options = array('conditions' => array('ProveedoresRepresentante.' . $this->ProveedoresRepresentante->primaryKey => $id));
		$this->set('proveedoresRepresentante', $this->ProveedoresRepresentante->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ProveedoresRepresentante->create();
			if ($this->ProveedoresRepresentante->save($this->request->data)) {
				 $message='El proveedor representante ha sido guardado!';
		        $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
				return $this->redirect(array('action' => 'index'));
			} else {
		    $message='El proveedor representante no pudo ser guardado. Por favor, intente de nuevo!';
		    $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));
								}
		}
		$proveedores = $this->ProveedoresRepresentante->Proveedore->find('list');
		$this->set(compact('proveedores'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->ProveedoresRepresentante->exists($id)) {
			throw new NotFoundException(__('Invalid proveedores representante'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProveedoresRepresentante->save($this->request->data)) {
				 $message='El proveedor representante ha sido guardado!';
		         $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
				return $this->redirect(array('action' => 'index'));
			} else {
			 $message='El proveedor representante no pudo ser guardado. Por favor, intente de nuevo!';
		    $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));
			
			}
		} else {
			$options = array('conditions' => array('ProveedoresRepresentante.' . $this->ProveedoresRepresentante->primaryKey => $id));
			$this->request->data = $this->ProveedoresRepresentante->find('first', $options);
		}
		$proveedores = $this->ProveedoresRepresentante->Proveedore->find('list');
		$this->set(compact('proveedores'));
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
       throw new NotFoundException('Proveedores representante Invalido.');
		
      if($this->ProveedoresRepresentante->delete($id))
      {
 			$message='El Proveedor representante ' .$id.' ha sido eliminado!';
			$this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
			$this->redirect(array('action'=>'index'));
      }
      
	}

	public function admin_delete2($id = null) 
	{
		$this->ProveedoresRepresentante->id = $id;
		if (!$this->ProveedoresRepresentante->exists()) {
			throw new NotFoundException(__('Invalid proveedores representante'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProveedoresRepresentante->delete()) {
				
				$message='El proveedor representante ha sido eliminado!';
              $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));  
          } else {
				$message='El Usuario ha sido guardado!';
                 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));  
               

			$this->Session->setFlash(__('El proveedor representante no pudo ser borrado. Por favor, intente de nuevo.'));
		}
		return $this->redirect(array('action' => 'index'));
		


    
        if(!$id)
            throw new NotFoundException('ProveedoresRepresentante Invalido.');
        if($this->ProveedoresRepresentante->delete($id)){
            //$this->Session->setFlash('The User : '.$id.' been eliminated to.');
            $this->redirect(array('action'=>'index'));
        }
    
    
	}

	public function  admin_listaProveedoresRepresentantes()
	{
	   //---- 
		// $lista=$this->ProveedoresRepresentante->find('all', $options);
		// pr($lista); 			
		// echo "Hola";
		
		$representantes=array('recursive'=>1);
		$representantes=$this->ProveedoresRepresentante->find('all',$condiciones); 

		pr($representantes);


	}
}
