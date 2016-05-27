<br><br><br><br><br>
<div class="content">
<?php 
echo $this->Form->create('Job');
echo $this->Form->input('company');
echo $this->Form->input('type_of_work');
echo $this->Form->input('city');
echo $this->Form->input('job_description',array('rows'=>'2'));
echo $this->Form->input('email');
?>
<button>
<?php
echo $this->Form->input('id',array('type'=>'hidden'));
echo $this->Form->end('UPDATE YOUR JOB');

// echo $this->Form->end('DELETE YOUR JOB',array('confirm'=>'Are you sure?'));
echo $this->Form->postButton('Delete',array('action'=>'delete'),array('confirm'=>'Are you sure?'));
?>
 </button>

</div>
