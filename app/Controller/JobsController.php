<?php

/*In this file, all the actions in the PostsController are added - index, view, show, add, edit and delete
View action shows all the jobs created.
Show action shows detailed information about each job.
Add action generates token in the database and sends email to the creator of the job.
The Email Configuration is via gmail.
*/

App::uses('AppController','Controller');
App::uses('CakeEmail','Network/Email');

class JobsController extends AppController{

	//index action
	public function index(){
	}

	//view action
	public function view(){
		//retrieves all jobs from the database
		$this->set('jobs',$this->Job->find('all'));
	}

	//show action
	public function show($id=null){
		
		if(!$id){
			$this->Session->setFlash('Invalid Choice','info');
			return $this->redirect(array('action' => 'view'));
		}

		$job=$this->Job->findById($id);

		if(!$job){
			$this->Session->setFlash('Invalid Choice','info');
			 return $this->redirect(array('action' => 'view'));
		}

		//shows all the details of the selected company name
		$this->set('job',$job);
	}

	//add action
	public function add(){
		if($this->request->is('post')){
			$this->Job->create();

			//token generator
			$token=md5(uniqid(mt_rand(), true));
			$this->Job->set('token',$token);

			if($this->Job->save($this->request->data)){

				//retrieve id from database
				$id=$this->Job->query("select id from jobs where token='".$token."';");

				//creates link to be sent via email
				$link='http://localhost/jobboard/jobs/edit/'.$id[0]['jobs']['id'].'?Token='.$token;

				//email generator
				 $mailId=$this->request->data['Job']['email'];
				 $Email = new CakeEmail();
            	 $Email->config('gmail');
				 $Email->from(array('cakephp.2016@gmail.com' => 'no-reply'))
    			  ->to($mailId)
    			  ->subject('Job Board Link')
    			  ->send("Thankyou for creating a job by using our services.\r\nWe are happy to help you!\r\n\r\nYou will be able to edit and delete your job with the link provided below.\r\n\r\nPlease click on the following Link: \r\n"
    			  	.$link);

    			  $this->Session->setFlash('Hurray! Your Job was successfully created! Please check your email for further services.','add_success');
                  return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash('Sorry, we were unable to add your job.','add_error');
		}
	}

	//edit action
	public function edit($id=null){


		if(!$id){
			$this->Session->setFlash('Invalid Choice','info');
			return $this->redirect(array('action' => 'index'));
		}
		
		if($this->request->query['Token']==null)
    	{
        	$this->Session->setFlash('UnAuthorized Access','warning');
        	return $this->redirect(array('action' => 'index'));	
    	}

    	//retrieves token from the database
	    $token=$this->request->query['Token'];
	    $idCheck=$this->Job->query('select id from jobs where token="'.$token.'";');

	    if($idCheck[0]['jobs']['id']==$id){

	     		$job=$this->Job->findById($id);

				if($this->request->is(array('post','put'))){
					$this->Job->id=$id;
					
					if($this->Job->save($this->request->data)){
						$this->Session->setFlash("Your job was successfully updated!",'edit_success');
						return $this->redirect(array('action'=>'index'));
					}
					$this->Session->setFlash('Sorry, we were unable to update your job.', 'edit_error');
				}

				if(!$this->request->data){
					$this->request->data=$job;
				}
	     }else{
	     	  $this->Session->setFlash('UnAuthorised Access','warning');
	     	  return $this->redirect(array('action' => 'index'));	
	     }
	}

	//delete action
	public function delete(){
		

		$id=$this->request->data['Job']['id'];
		
		if(!$id){
			$this->Session->setFlash('Invalid Choice','info');
			return $this->redirect(array('action' => 'index'));
		}
		
		if($this->request->data['Job']['token']==null)
    	{
        	$this->Session->setFlash('UnAuthorized Access','warning');
        	return $this->redirect(array('action' => 'index'));	
    	}

	    $token=$this->request->data['Job']['token'];
	    $idCheck=$this->Job->query('select id from jobs where token="'.$token.'";');

	    if($idCheck[0]['jobs']['id']==$id){

	    		$job=$this->Job->findById($id);

	    		if($this->request->is(array('post','put'))){
					
					$this->Job->id=$id;

					if($this->Job->delete($id)){
						$this->Session->setFlash("Your job was deleted succesfully!",'edit_success');
						return $this->redirect(array('action'=>'index'));
					}else{
						$this->Session->setFlash("Your job could not be deleted!",'edit_success');
						return $this->redirect(array('action'=>'index'));
					}

					return $this->redirect(array('action'=>'index'));

				}
		}
	}
}
?>