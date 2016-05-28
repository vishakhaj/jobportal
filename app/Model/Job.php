<?php


//Validation across all the fields.

class Job extends AppModel{

	public $validate=array(
		'company'=>array(
			'rule'=>'notEmpty',
			),
		'type_of_work'=>array(
			'rule'=>'notEmpty',
			),
		'city'=>array(
			'rule'=>'notEmpty',
			),
		'job_description'=>array(
			'rule'=>array('maxlength',255),
			),
		'email'=>'email'
		);
}

?>