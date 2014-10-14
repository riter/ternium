<?php
App::uses('AppController', 'Controller');
/**
 * Galerias Controller
 *
 * @property Galeria $Galeria
 * @property PaginatorComponent $Paginator
 */
class GaleriasController extends AppController 
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
		$this->Galeria->recursive = 0;
		$this->set('galerias', $this->Paginator->paginate());
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
		if (!$this->Galeria->exists($id)) 
		{
			throw new NotFoundException(__('Invalid galeria'));
		}

		$options = array('conditions' => array('galeria.' . $this->Galeria->primaryKey => $id));
		$this->set('galeria', $this->Galeria->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Galeria->create();
			if ($this->Galeria->save($this->request->data)) {
				$this->Session->setFlash(__('La galería ha sido guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La galería no pudo ser guardado. Por favor, intentelo de nuevo.'));
			}
		}
		$users = $this->Galeria->User->find('list');
		$galeriastipos = $this->Galeria->GaleriasTipo->find('list');/*$galeriastipos = $this->Galeria->GaleriasTipo->find('list');*/
		$this->set(compact('users', 'galeriastipos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Galeria->exists($id)) {
			throw new NotFoundException(__('Invalid galeria'));
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			if ($this->Galeria->save($this->request->data)) 
			{
				
				$message='La Galeria ha sido guardada.';
			$this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
				
				return $this->redirect(array('action' => 'index'));
			} else {
				$message='La galeria no pudo ser guardado. Por favor, intentelo de nuevo.';
				$this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));
				
			
			}
		}
		else 
		{
			$options = array('conditions' => array('Galeria.' . $this->Galeria->primaryKey => $id));
			$this->request->data = $this->Galeria->find('first', $options);
		} 

		$users = $this->Galeria->User->find('list');
		$galeriastipos = $this->Galeria->GaleriasTipo->find('list');
		$this->set(compact('users', 'galeriastipos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Galeria->id = $id;
		if (!$this->Galeria->exists()) {
			throw new NotFoundException(__('Invalid galeria'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Galeria->delete()) {
			$message='La galería ha sido eliminada.';
			$this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
				
		} else {
					$message='La galería no pudo ser borrada. Por favor, intente de nuevo.';
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
		$this->Galeria->recursive = 0;
		$this->set('galerias', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Galeria->exists($id)) {
			throw new NotFoundException(__('Invalid galeria'));
		}
		$options = array('conditions' => array('Galeria.' . $this->Galeria->primaryKey => $id));
		$this->set('galeria', $this->Galeria->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
   
	public function admin_add() 
	{	
		 $this->loadModel('GaleriasTipo');          
		 $this->loadModel('User'); 
		
		if ($this->request->is('post')) 
		{	
			$data = $this->UploadPhoto($this->request->data); 

			$this->Galeria->create();  

			if ($this->Galeria->save( $data )) 
			{
			$message='La Galeria ha sido guardada.';	
			$this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));	
		     //	$this->Session->setFlash($message,$layout); //__('El País  ha sido guardado.')
				return $this->redirect(array('action' => 'index'));  
				
			}
			else 
			{
				$message='La Galeria no pudo ser guardada.';
			  $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));	
			   $this->Session->setFlash($message,$layout);//__('El Galería no pudo ser guardado. Por favor, intentelo de nuevo.')
				
			}
		} 
		//$provincias = $this->Proveedore->Provincium->find('list');
		//$this->set(compact('Galería', 'provincias'));
		

		$users = $this->User->find('list'); 
     	$galeriastipos = $this->GaleriasTipo->find('list'); 
  //debug($galeriastipos);

		$this->set('galeriastipos',$galeriastipos); 
		$this->set('users',$users); 
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) 
	{
		if (!$this->Galeria->exists($id)) 
		{
			throw new NotFoundException(__('Invalid galeria'));
		}

		if ( $this->request->is(array('post', 'put') )) 
		{	
	 	   if ( $this->request->data['Galeria']['imagen']['name'] !="")
	 	   {  
	 	   	  $data = $this->UploadPhoto($this->request->data); 
	 	   }
           else 
           	{	
           	   $data=$this->request->data;  
         	   $data['Galeria']['imagen']=$this->request->data['Galeria']['imagen2'];
          	   unset($data['Galeria']['imagen2']);
           	}
           	
            if ($this->Galeria->save( $data )) 
			{	
				$message='La Galería ha sido guardada!';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));	
				//$this->Session->setFlash(__($message),array('elemento'=>'exito');//__('La Galería ha sido guardado.'),$layout
				return $this->redirect(array('action' => 'index')); 
				
			}else 
			{
				$message='La Galería no pudo ser guardada. Por favor, intentelo de nuevo.';	
				$this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));	
				//$this->Session->setFlash(__('La Galería no pudo ser guardado. Por favor, intentelo de nuevo.'));
				
			} 			
		} 
		else
		{
			$options = array('conditions' => array('Galeria.' . $this->Galeria->primaryKey => $id));
			$this->request->data = $this->Galeria->find('first', $options);  

		//	pr($this->request->data); 
		//	exit(); 
		}

		$users = $this->Galeria->User->find('list'); 
		$galeriastipos = $this->Galeria->GaleriasTipo->find('list'); 

		$this->set('imagen', $this->request->data['Galeria']['imagen']); 
		$this->set(compact('users', 'galeriastipos')); 

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
       throw new NotFoundException('Galeria  Invalida');

      if($this->Galeria->delete($id))
      {
       		$message ='La Galerir '.$id.' Ha sido eliminado.';
			$this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));	
            $this->redirect(array('action'=>'index'));
      }


		/*
		$this->Galeria->id = $id;
		if (!$this->Galeria->exists()) {
			throw new NotFoundException(__('Invalid galeria'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Galeria->delete()) {
			$this->Session->setFlash(__('The galeria has been deleted.'));
		} else {
			$this->Session->setFlash(__('The galeria could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
		*/
	}

	private function UploadPhoto($data) 
    {
        try 
           {
            if(!empty($this->data['Galeria']['imagen']['name']))
            {
                $file = $this->data['Galeria']['imagen'];  
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                $arr_ext = array('jpg', 'png', 'gif'); 

                if(in_array($ext, $arr_ext))
                {	
                    $tmp_name=$data['Galeria']['imagen']['tmp_name'];  
                    $name='galeria_d_usuario_'.$data['Galeria']['user_id'].'.jpg';

                    $destination = WWW_ROOT . 'uploads/galerias/' . $name;
                    move_uploaded_file($tmp_name, $destination); 
                    $data['Galeria']['imagen'] = $name ; 
                }
                else
                {
                    $data['Galeria']['imagen'] = '';
                } 
            }
            else
            {
               $data['Galeria']['imagen'] = '';
            }
        }
        catch (Exception $ex) 
        {
            print_r($ex->getMessage());
        }
        
        return $data; 
    } 
    function getGaleriasJSON()
    {
    	$this->autoRender = false; 
	    $this->layout="ajax";

    	$condiciones=array('recursive'=>1); 
    	$galerias=$this->Galeria->find('all',$condiciones); 
    	echo json_encode($galerias); 

    }

    function admin_getGalerias()
    {
    	$condiciones=array('recursive'=>1); 
    	$galerias=$this->Galeria->find('all',$condiciones); 

    	pr($galerias); 

    }
}
