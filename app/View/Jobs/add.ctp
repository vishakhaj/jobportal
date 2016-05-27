<br><br><br><br><br>
<?php 
echo $this->Form->create('Job');
echo $this->Form->input('company');
echo $this->Form->input('type_of_work');
echo $this->Form->input('city');
echo $this->Form->input('job_description',array('rows'=>'2'));
echo $this->Form->input('email');
echo $this->Form->end('CREATE');
?>
