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

 public $components = array('Paginator');
public function admin_index() {
		$this->Galeria->recursive = 0;
		$this->set('galerias', $this->Paginator->paginate());
	}
	public function admin_view($id = null) {
		if (!$this->Galeria->exists($id)) {
			throw new NotFoundException(__('Invalid imagen'));
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
			$message='La Imagen ha sido guardada.';	
			$this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));	
		     //	$this->Session->setFlash($message,$layout); //__('El País  ha sido guardado.')
				return $this->redirect(array('action' => 'index'));  
				
			}
			else 
			{
				$message='La Imagen no pudo ser guardada.';
			  $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));	

			}
		} 

		$users = $this->User->find('list'); 
     	$galeriastipos = $this->GaleriasTipo->find('list'); 

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
		if (!$this->Galeria->exists($id)) {
			throw new NotFoundException(__('Invalid imagen'));
		}

		if ( $this->request->is(array('post', 'put') )) {

	 	   if ( $this->request->data['Galeria']['imagen']['name'] != ""){
	 	   	  $data = $this->UploadPhoto($this->request->data); 
	 	   }else {
           	   $data = $this->request->data;
          	   unset($data['Galeria']['imagen']);
           }

            if ($this->Galeria->save( $data )) {
				$message='La Imagen ha sido guardada!';
                $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));
				return $this->redirect(array('action' => 'index'));
			}else {
				$message='La Imagen no pudo ser guardada!';	
				$this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));	
			}
		}else{
			$options = array('conditions' => array('Galeria.' . $this->Galeria->primaryKey => $id));
			$this->request->data = $this->Galeria->find('first', $options);  
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
       throw new NotFoundException('Imagen  Invalida');

      if($this->Galeria->delete($id))
      {
       		$message ='La Imagen  Ha sido eliminado.';
			$this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));	
            $this->redirect(array('action'=>'index'));
      }
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
                    $name = 'galeria_'.$data['Galeria']['id'].'.'.$ext;

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
    
     public function lists()
    {
        $this->autoRender = false;
         $this->response->type('json');
        if ($this->request->is('get')) {
            $galerias=$this->Galeria->find('all');

            if(!empty($galerias)){
                return json_encode(array('Default' => $galerias));
            }else{
                return json_encode(array('Default' => null));
            }
        }
        return json_encode(array('Default' => 'Required Request GET'));
    }
    
    
     public function galerias_params()//$pais, $provincia
    { 
        //$pais = 9;
        $this->autoRender = false;
        $this->response->type('json');//$proveedore_id=$this->request->data['proveedore_id']; 
     
        $tipo_galeria=$this->request->query['galeriastipo_id'];
        
        $condiciones=array('conditions'=>array('Galeria.galeriastipo_id'=>$tipo_galeria),'recursive'=>0);
            
           if(empty($tipo_galeria)){
             
             echo "Olvido un campo!";
         }  
         if ($this->request->is('get')) {
              // print_r($this->request->query, false);
          $proveedores=$this->Galeria->find('all',$condiciones);//exit;

          if(!empty($proveedores)){
                return json_encode(array('Default' => $proveedores));
            }else{
                return json_encode(array('Default' => null));
            }
        }
        return json_encode(array('Default' => 'Required Request GET'));
    }
}
