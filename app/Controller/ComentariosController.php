<?php
App::uses('AppController', 'Controller');
/**
 * Comentarioss Controller
 *
 * @property Comentarios $Comentarios
 * @property PaginatorComponent $Paginator
 */
class ComentariosController extends AppController 
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
		$this->Comentario->recursive = 0;
		$this->set('Comentarios', $this->Paginator->paginate());
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
		if (!$this->Comentario->exists($id)) 
		{
			throw new NotFoundException(__('Invalid comentario tipo'));
		}
		$options = array('conditions' => array('Comentario.' . $this->Comentario->primaryKey => $id));
		$this->set('comentario', $this->Comentario->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Comentario->create();
			var_dump($this->Comentario->create());exit;
			if ($this->Comentario->save($this->request->data)) {

				$message='La Comentario tipo ha sido guardada!';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
					return $this->redirect(array('action' => 'index'));
			} else {
				$message='La comentario tipo no pudo guardarse. Por favor, intente de nuevo.';
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
		if (!$this->Comentario->exists($id)) 
		{
			throw new NotFoundException(__('Invalid comentarios tipo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Comentario->save($this->request->data)) {
				$message='La Comentario tipo ha sido guardada';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
			return $this->redirect(array('action' => 'index'));
			} else {
				$message='La comentario tipo no pudo guardarse. Por favor, intente de nuevo.';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));
				
			}
		} else {
			$options = array('conditions' => array('Comentario.' . $this->Comentario->primaryKey => $id));
			$this->request->data = $this->Comentario->find('first', $options);
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
		$this->Comentario->id = $id;
		if (!$this->Comentario->exists()) {
			throw new NotFoundException(__('Invalid comentario tipo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Comentario->delete()) {

				$message='La Comentario tipo ha sido eliminada!';
				$this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
	

		} else {
					$message='La comentario tipo no se pudo eliminar. Por favor, intente de nuevo.';
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
		$this->Comentario->recursive = 0;
		$this->set('comentarios', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Comentario->exists($id)) {
			throw new NotFoundException(__('Invalid comentario tipo'));
		}
		$options = array('conditions' => array('Comentario.' . $this->Comentario->primaryKey => $id));
		$this->set('comentario', $this->Comentario->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Comentario->create();
			if ($this->Comentario->save($this->request->data)) {
				

				$message='El Comentario  ha sido guardado.';
	   		    $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
				return $this->redirect(array('action' => 'index'));
			} else {

				$message='La comentario tipo no pudo guardarse. Por favor, intente de nuevo.';
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
		if (!$this->Comentario->exists($id)) {
			throw new NotFoundException(__('Invalid comentario tipo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Comentario->save($this->request->data)) {

				$message='La Comentario tipo ha sido guardada!';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
				return $this->redirect(array('action' => 'index'));
			} else {

					$message='La comentario tipo no pudo guardarse. Por favor, intente de nuevo.';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));
			
				
			}
		} else {
			$options = array('conditions' => array('Comentario.' . $this->Comentario->primaryKey => $id));
			$this->request->data = $this->Comentario->find('first', $options);
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
       throw new NotFoundException('Tipos de Comentario  Invalidos');

      if($this->Comentario->delete($id))
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
	/*function getTiposComentarioJSON()
    {
    	$this->autoRender = false; 
	    $this->layout="ajax";

    	$condiciones=array('recursive'=>1); 
    	$comentario=$this->Comentarioss->find('all',$condiciones); 
    	echo json_encode($comentario); 

    }
    */

}
