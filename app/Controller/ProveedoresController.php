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
                      if (!id){//$this->Proveedore->exists($id)) {
                            throw new NotFoundException(__('Invalid proveedore'));
                             $this->redirect(array('action' => 'index'));
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
                    //$provincias = $this->Proveedore->find('all',array('conditions'=>array('Proveedore.provincia_id'=>$id)));
              
                    $this->set('pais',$pais);
                    $this->set('provincias',$provincias);
              
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
        $this->response->type('json');
     
        $pais=$this->request->query['pais_id'];
        $provincia=$this->request->query['provincia_id'];
        
        $condiciones=array('conditions'=>array('Proveedore.pais_id'=>$pais,'Proveedore.provincia_id'=>$provincia),'recursive'=>0);//array('recursive'=>0);
            
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