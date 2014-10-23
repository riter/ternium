<?php
App::uses('AppController', 'Controller');
/**
 * Proveedores Controller
 *
 * @property Proveedore $Proveedore
 * @property PaginatorComponent $Paginator
 */
class ProveedoresController extends AppController {

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
		$this->Proveedore->recursive = 0;
		$this->set('proveedores', $this->Paginator->paginate());
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
		if (!$this->Proveedore->exists($id)) 
		{
			throw new NotFoundException(__('Invalid proveedore'));
		}
		$options = array('conditions' => array('Proveedore.' . $this->Proveedore->primaryKey => $id));
		$this->set('proveedore', $this->Proveedore->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Proveedore->create();
			if ($this->Proveedore->save($this->request->data)) {
				$this->Session->setFlash(__('El Proveedror ha sido guardado.'));/*The proveedore has been saved*/
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El proveedor no pudo guardarse. Por favor, intente de nuevo.'));/*The proveedore could not be saved. Please, try again*/
			}
		}
		$pais = $this->Proveedore->Pai->find('list');
		$provincias = $this->Proveedore->Provincium->find('list');
		$this->set(compact('pais', 'provincias'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Proveedore->exists($id)) {
			throw new NotFoundException(__('Proveedor invalido'));/*Invalid proveedore*/
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Proveedore->save($this->request->data)) {
				$this->Session->setFlash(__('El proveedor ha sido guardado.'));/*('The proveedore has been saved.')*/
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El proveedore no pudo guardarse. Por favor intente de nuevo.'));/*The proveedore could not be saved. Please, try again.'*/
			}
		} else {
			$options = array('conditions' => array('Proveedore.' . $this->Proveedore->primaryKey => $id));
			$this->request->data = $this->Proveedore->find('first', $options);
		}
		$pais = $this->Proveedore->Pai->find('list');
		$provincias = $this->Proveedore->Provincium->find('list');
		$this->set(compact('pais', 'provincias'));
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
		$this->Proveedore->id = $id;
		if (!$this->Proveedore->exists()) {
			throw new NotFoundException(__('Invalid proveedore'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Proveedore->delete()) {
			$this->Session->setFlash(__('The proveedore has been deleted.'));
		} else {
			$this->Session->setFlash(__('The proveedore could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Proveedore->recursive = 0;
		$this->set('proveedores', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Proveedore->exists($id)) {
			throw new NotFoundException(__('Invalid proveedore'));
		}
		$options = array('conditions' => array('Proveedore.' . $this->Proveedore->primaryKey => $id));
		$this->set('proveedore', $this->Proveedore->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Proveedore->create();
			if ($this->Proveedore->save($this->request->data)) {
				 $message='El Proveedor ha sido guardado!';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El proveedor no pudo ser guardado. Por favor, intente de nuevo.'));/*The proveedore could not be saved. Please, try again.*/
			}
		}
		$pais = $this->Proveedore->Paise->find('list');
		$provincias = $this->Proveedore->Provincia->find('list');
		$this->set(compact('pais', 'provincias'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Proveedore->exists($id)) {
			throw new NotFoundException(__('Invalid proveedore'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Proveedore->save($this->request->data)) {
				 $message='El Proveedor ha sido guardado!';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				 $message='El proveedor no pudo ser guardado. Por favor, intentelo de nuevo.!';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));
				
			}
		} else {
			$options = array('conditions' => array('Proveedore.' . $this->Proveedore->primaryKey => $id));
			$this->request->data = $this->Proveedore->find('first', $options);
		}
		$pais = $this->Proveedore->Paise->find('list');
		$provincias = $this->Proveedore->Provincia->find('list');
		$this->set(compact('pais', 'provincias'));
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
       throw new NotFoundException('Proveedores Invalidos.');

      if($this->Proveedore->delete($id))
      {

 		$message='El proveedor ha sido borrado!';
		 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
   		$this->redirect(array('action'=>'index'));
      }       
      else
      {
      	 $message='La proveedor no ha sido borrado';
		$this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));	

      }
	}

function getListaProveedoresJson()
{	
 	$this->autoRender = false; 
        $this->layout="ajax"; 

	$pais_id=$this->request->data['pais_id']; 
	$provincia_id=$this->request->data['provincia_id']; 

	$condiciones=array('Proveedore.pais_id'=>$pais_id,'Proveedore.provincia_id'=>$provincia_id); 
	$this->Proveedore->recursive=1; 
	$proveedores=$this->Proveedore->find('all',array('conditions'=> $condiciones)); 

	echo json_encode($proveedores);
	
}

function getProveedor()
{		
 	$this->autoRender = false; 
    $this->layout="ajax"; 
	$proveedore_id=$this->request->data['proveedore_id']; 
    
	$condiciones=array('Proveedore.id'=>$proveedore_id); 
	$this->Proveedore->recursive=1; 
	$proveedor=$this->Proveedore->find('first',array('conditions'=> $condiciones)); 

	echo json_encode($proveedor);  
}

function admin_listar_proveedoresroveedoresXPaisYProv($pais=null,$provincia=null) 
{	 		
	$pais_id=$pais; 
	$provincia_id=$provincia;	
	$condiciones=array('Proveedore.pais_id'=> $pais_id,'Proveedore.provincia_id'=>$provincia_id ); 

	$this->Proveedore->recursive=1; 
	$proveedores=$this->Proveedore->find('all',array('conditions'=> $condiciones)); 

	pr($proveedores); 
    // echo json_encode($proveedores);  
}


function getListaProveedoresJsonp()
{
 	$this->autoRender = false;
    $this->layout="ajax"; 
    $proveedores=$this->Proveedore->find('all');
    
    // echo $jsoncallback.'('.json_encode($datos).')';  
} 


/// Método de prueba...
public function admin_listar_proveedores()
{	
	$condiciones=array('recursive'=>1);
	$proveedores=$this->Proveedore->find('all',$condiciones);
	pr($proveedores);
}

    public function lists()
    {
        $this->autoRender = false;
         $this->response->type('json');
        if ($this->request->is('get')) {
            $proveedores=$this->Proveedore->find('all');

            if(!empty($proveedores)){
                return json_encode(array('Default' => $proveedores));
            }else{
                return json_encode(array('Default' => null));
            }
        }
        return json_encode(array('Default' => 'Required Request GET'));
    }
    
    public function proveedores_params()//$pais, $provincia
    { 
        //$pais = 9;
        $this->autoRender = false;
        $this->response->type('json');//$proveedore_id=$this->request->data['proveedore_id']; 
     
        $pais=$this->request->query['pais_id'];//$this->request->data['pais_id'];//$this->request->data['pais_id'];$this->request->query('pais_id');
        $provincia=$this->request->query['provincia_id'];//6;//'Buenos Aires';
         
          //$opciones=array('conditions' => array('pais_id' => $pais,'provincia_id'=>$provincia));
          //$opciones=array('pais_id' => $pais,'provincia_id'=>$provincia);
          $condiciones=array('conditions'=>array('Proveedore.pais_id'=>$pais,'Proveedore.provincia_id'=>$provincia),'recursive'=>0);//array('recursive'=>0);
            
          
         // var_dump($condiciones);exit;
          
         if(empty($pais)||empty($provincia)){
             
             echo "Olvido un campo!";
         }  
         if ($this->request->is('get')) {
              // print_r($this->request->query, false);
          $proveedores=$this->Proveedore->find('all',$condiciones);//exit;

          if(!empty($proveedores)){
                return json_encode(array('Default' => $proveedores));
            }else{
                return json_encode(array('Default' => null));
            }
        }
        return json_encode(array('Default' => 'Required Request GET'));
    }
    


}