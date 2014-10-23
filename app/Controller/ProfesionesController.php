<?php
App::uses('AppController', 'Controller');
/**
 * Profesiones Controller
 *
 * @property Profesione $Profesione
 * @property PaginatorComponent $Paginator
 */
class ProfesionesController extends AppController 
{

/**
 *  Components  
 *  @var array
 */

 public $components = array('Paginator');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Profesione->recursive = 0;
		$this->set('profesiones', $this->Profesione->find('all'));
		
		//$this->set('profesiones', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Profesione->exists($id)) {
			throw new NotFoundException(__('Invalid profesion'));
		}
		$options = array('conditions' => array('Profesione.' . $this->Profesione->primaryKey => $id));
		$this->set('profesion', $this->Profesione->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Profesione->create();
			if ($this->Profesione->save($this->request->data)) {
				 $message='La profesion ha sido guardado.';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
					return $this->redirect(array('action' => 'index'));
			} else {
				 $message='La profesion no pudo ser guardado. Por favor, intentelo de nuevo.';
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
		if (!$this->Profesione->exists($id)) {
			throw new NotFoundException(__('Invalid profesion'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Profesione->save($this->request->data)) {

				 $message='La profesion ha sido guardado.';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
				return $this->redirect(array('action' => 'index'));
			} else {
 			$message='La profesion no pudo ser guardado. Por favor, intentelo de nuevo.';
		  $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));
			
			}
		} else {
			$options = array('conditions' => array('Profesione.' . $this->Profesione->primaryKey => $id));
			$this->request->data = $this->Profesione->find('first', $options);
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
       throw new NotFoundException('Profesion Invalida.');

      if($this->Profesione->delete($id))
      {
      	$message='La Profesion ha sido eliminado!';//$profesion['Profesione']['nombre']
		 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
		  $this->redirect(array('action'=>'index'));
      }else {
      		$message='La profesion no se pudo eliminar!';
		 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));
		 $this->redirect(array('action'=>'index'));
		
      }
      
	}

    /*    API Method*/
    public function lists()
    {
        $this->autoRender = false;
         $this->response->type('json');
        if ($this->request->is('get')) {
            $profesiones=$this->Profesione->find('all');

            if(!empty($profesiones)){
                return json_encode(array('Default' => $profesiones));
            }else{
                return json_encode(array('Default' => null));
            }
        }
        return json_encode(array('Default' => 'Required Request GET'));
    }
}
