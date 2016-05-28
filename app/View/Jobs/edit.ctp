<br><br><br><br><br>
<div id="editDetails">
	<?php
		echo $this->Form->create('Job');
		echo $this->Form->input('company');
		echo $this->Form->input('type_of_work');
		echo $this->Form->input('city');
		echo $this->Form->input('job_description',array('rows'=>'2'));
		echo $this->Form->input('email');
		echo $this->Form->input ('id',array('type'=>'hidden'));
		echo $this->Form->end('UPDATE YOUR JOB');

		echo $this->Form->create('Job',array('action'=>'delete'));
		echo $this->Form->input('id',array('type'=>'hidden'));
		echo $this->Form->input('token',array('type'=>'hidden'));
		echo $this->Form->end('DELETE YOUR JOB');
	?>
</div>
