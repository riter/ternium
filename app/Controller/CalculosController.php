<?php
App::uses('AppController', 'Controller');
/**
 * Calculos Controller
 *
 * @property Calculo $Calculo
 * @property PaginatorComponent $Paginator
 */
class CalculosController extends AppController 
{	

 public $components = array('Paginator');

	public function view($id = null) 
	{
		if (!$this->Calculo->exists($id)) 
		{
			throw new NotFoundException(__('Invalid calculo'));
		}

		$options = array('conditions' => array('calculo.' . $this->Calculo->primaryKey => $id));
		$this->set('calculo', $this->Calculo->find('first', $options));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		//$this->Calculo->recursive  = 0;
                  
                //$this->Calculo->recursive = 2;
              //  $data = $this->Calculo->find('all');
              //  $this->set('calculos', $data);
             //   print_r($this->set('calculos', $data));
             //    print_r($this->Calculo->query("SELECT * FROM calculos LIMIT 2"));
              //  exit;
		//print_r($this->set('calculos', $this->Paginator->paginate()));
                
                $mostrar=$this->Calculo->query("select * from calculos");
                var_dump($mostrar);echo "alsjdflksdfjlasjd";exit;
        $this->Calculo->recursive = 0;
        $data = $this->Calculo->find('all');
        $this->set('calculos', $data);
               
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Calculo->exists($id)) {
			throw new NotFoundException(__('Invalid calculo'));
		}
		$options = array('conditions' => array('Calculo.' . $this->Calculo->primaryKey => $id));
		$this->set('calculo', $this->Calculo->find('first', $options));
                

	}

/**
 * admin_add method
 *
 * @return void
 */
   
	public function admin_add() 
	{	
		 $this->loadModel('CalculosTipo');          
		 $this->loadModel('User'); 
		
		if ($this->request->is('post')) 
		{	
			$data = $this->request->data; 

			$this->Calculo->create();  

			if ($this->Calculo->save( $data )) 
			{
			$message='La Calculo ha sido guardado.';	
			$this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));	
		     
				return $this->redirect(array('action' => 'index'));  
				
			}
			else 
			{
                          $message='La Calculo no pudo ser guardada.';
			  $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));	
			   $this->Session->setFlash($message,$layout);
				
			}
		} 
	
		$users = $this->User->find('list'); 
         	$calculostipos = $this->CalculosTipo->find('list'); 
  

		$this->set('calculostipos',$calculostipos); 
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
		if (!$this->Calculo->exists($id)) 
		{
			throw new NotFoundException(__('Invalid calculo'));
		}

		if ( $this->request->is(array('post', 'put') )) 
		{	
	 	            	
            if ($this->Calculo->save( $data )) 
			{	
				$message='EL calculo ha sido guardada!';
				 $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));	
				//$this->Session->setFlash(__($message),array('elemento'=>'exito');//__('La Galería ha sido guardado.'),$layout
				return $this->redirect(array('action' => 'index')); 
				
			}else 
			{
				$message='EL calculo no pudo ser guardada. Por favor, intentelo de nuevo.';	
				$this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));	
				//$this->Session->setFlash(__('La Galería no pudo ser guardado. Por favor, intentelo de nuevo.'));
				
			} 			
		} 
		else
		{
			$options = array('conditions' => array('Calculo.' . $this->Calculo->primaryKey => $id));
			$this->request->data = $this->Calculo->find('first', $options);  

		}

		$users = $this->Calculo->User->find('list'); 
		$calculostipos = $this->Calculo->CalculosTipo->find('list'); 

		$this->set('imagen', $this->request->data['Calculo']['imagen']); 
		$this->set(compact('users', 'calculostipos')); 

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
       throw new NotFoundException('Calculo  Invalida');

      if($this->Calculo->delete($id))
      {
       	    $message ='EL calculo '.$id.' Ha sido eliminado.';
	    $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));	
            $this->redirect(array('action'=>'index'));
      }

	}

	private function UploadPhoto($data) 
    {
        try 
           {
            if(!empty($this->data['Calculo']['imagen']['name']))
            {
                $file = $this->data['Calculo']['imagen'];  
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                $arr_ext = array('jpg', 'png', 'gif'); 

                if(in_array($ext, $arr_ext))
                {	
                    $tmp_name=$data['Calculo']['imagen']['tmp_name'];  
                    $name='calculo_d_usuario_'.$data['Calculo']['user_id'].'.jpg';

                    $destination = WWW_ROOT . 'uploads/calculos/' . $name;
                    move_uploaded_file($tmp_name, $destination); 
                    $data['Calculo']['imagen'] = $name ; 
                }
                else
                {
                    $data['Calculo']['imagen'] = '';
                } 
            }
            else
            {
               $data['Calculo']['imagen'] = '';
            }
        }
        catch (Exception $ex) 
        {
            print_r($ex->getMessage());
        }
        
        return $data; 
    } 
    function getCalculosJSON()
    {
    	$this->autoRender = false; 
	    $this->layout="ajax";

    	$condiciones=array('recursive'=>1); 
    	$calculos=$this->Calculo->find('all',$condiciones); 
    	echo json_encode($calculos); 

    }

    function admin_getCalculos()
    {
    	$condiciones=array('recursive'=>1); 
    	$calculos=$this->Calculo->find('all',$condiciones); 

    	pr($calculos); 

    }
}
