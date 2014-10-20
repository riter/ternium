<?php
App::uses('AppController', 'Controller');
/**
 * Feedbacks Controller
 *
 * @property Feedback $Feedback
 * @property PaginatorComponent $Paginator
 */
class FeedbacksController extends AppController 
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
	

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() 
	{
	  $this->Feedback->recursive = 0;	    //     
	  $this->set('feedbacks', $this->Feedback->find('all'));
	  //$x= $this->Feedback->find('all');
	  //print_r($x);exit;
	  //$this->set('feedbacks', $this->Paginator->paginate());//	var_dump($this->Feedback->recursive);exit;

	    //var_dump($this->Feedback);exit;
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Feedback->exists($id)) {
			throw new NotFoundException(__('Invalid feedback'));
		}
		$options = array('conditions' => array('Feedback.' . $this->Feedback->primaryKey => $id));
		$this->set('feedback', $this->Feedback->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
   
	public function admin_add() 
	{	
		 $this->loadModel('Comentario');          
		 $this->loadModel('User'); 
		
		if ($this->request->is('post')) 
		{	
			$data = $this->UploadPhoto($this->request->data); 

			$this->Feedback->create();  

			if ($this->Feedback->save( $data )) 
			{
			$message='La Feedback ha sido guardada.';	
			$this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));	
		     //	$this->Session->setFlash($message,$layout); //__('El Pais  ha sido guardado.')
				return $this->redirect(array('action' => 'index'));  
				
			}
			else 
			{
			  $message='La Feedback no pudo ser guardada.';
			  $this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message error'));	
			  $this->Session->setFlash($message,$layout);//__('El Galería no pudo ser guardado. Por favor, intentelo de nuevo.')
				
			}
		} 
		//$provincias = $this->Proveedore->Provincium->find('list');	//$this->set(compact('Galería', 'provincias'));
		/*$users = $this->User->find('list'); 
     	$this->set('comentarios',$comentarios); 
		$this->set('users',$users); */


		$users       = $this->User->find('list'); 
	    $comentarios = $this->Comentario->find('list'); 
     	$this->set(compact('users', 'comentarios')); 
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
		$this->loadModel('Comentario');
		$this->loadModel('User');
		if (!$this->Feedback->exists($id)) 
		{
			throw new NotFoundException(__('Invalid feedback'));
		}

		if ( $this->request->is(array('post', 'put') )) 
		{	
	 	   if ( $this->request->data['Feedback']['imagen']['name'] !="")
	 	   {  
	 	   	  $data = $this->UploadPhoto($this->request->data); 
	 	   }
           else 
           	{	
           	   $data=$this->request->data;  
         	   $data['Feedback']['imagen']=$this->request->data['Feedback']['imagen2'];
          	   unset($data['Feedback']['imagen2']);
           	}
           	
            if ($this->Feedback->save( $data )) 
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
			$options = array('conditions' => array('Feedback.' . $this->Feedback->primaryKey => $id));
			$this->request->data = $this->Feedback->find('first', $options);  

		//	pr($this->request->data); 
		//	exit(); 
		}

		$users       = $this->User->find('list'); 
	    $comentarios = $this->Comentario->find('list'); 
     	$this->set(compact('users', 'comentarios')); 

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
       throw new NotFoundException('Feedback  Invalida');

      if($this->Feedback->delete($id))
      {
       		$message ='La Galerir '.$id.' Ha sido eliminado.';
			$this->Session->setFlash(__($message), 'default', array('class' => 'mws-form-message success'));	
            $this->redirect(array('action'=>'index'));
      }


		/*
		$this->Feedback->id = $id;
		if (!$this->Feedback->exists()) {
			throw new NotFoundException(__('Invalid feedback'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Feedback->delete()) {
			$this->Session->setFlash(__('The feedback has been deleted.'));
		} else {
			$this->Session->setFlash(__('The feedback could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
		*/
	}

	private function UploadPhoto($data) 
    {
        try 
           {
            if(!empty($this->data['Feedback']['imagen']['name']))
            {
                $file = $this->data['Feedback']['imagen'];  
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                $arr_ext = array('jpg', 'png', 'gif'); 

                if(in_array($ext, $arr_ext))
                {	
                    $tmp_name=$data['Feedback']['imagen']['tmp_name'];  
                    $name='feedback_d_usuario_'.$data['Feedback']['user_id'].'.jpg';

                    $destination = WWW_ROOT . 'uploads/feedbacks/' . $name;
                    move_uploaded_file($tmp_name, $destination); 
                    $data['Feedback']['imagen'] = $name ; 
                }
                else
                {
                    $data['Feedback']['imagen'] = '';
                } 
            }
            else
            {
               $data['Feedback']['imagen'] = '';
            }
        }
        catch (Exception $ex) 
        {
            print_r($ex->getMessage());
        }
        
        return $data; 
    } 
    function getFeedbacksJSON()
    {
    	$this->autoRender = false; 
	    $this->layout="ajax";

    	$condiciones=array('recursive'=>1); 
    	$feedbacks=$this->Feedback->find('all',$condiciones); 
    	echo json_encode($feedbacks); 

    }

    function admin_getFeedbacks()
    {
    	$condiciones=array('recursive'=>1); 
    	$feedbacks=$this->Feedback->find('all',$condiciones); 

    	pr($feedbacks); 

    }
     public function lists()
    {
        $this->autoRender = false;
         $this->response->type('json');
        if ($this->request->is('get')) {
            $feedback=$this->Feedback->find('all');

            if(!empty($feedback)){
                return json_encode(array('Default' => $feedback));
            }else{
                return json_encode(array('Default' => null));
            }
        }
        return json_encode(array('Default' => 'Required Request GET'));
    }
}
