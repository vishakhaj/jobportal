<br><br><br><br><br>

<div class="tableContent">
<center>
	<table>
		<th><em>ID</em></th>
		<th><em>Company Name</em></th>
		<th><em>Type of Work</em></th>
		<th><em>Creator's Email Id</em></th>
		<th><em>Created On</em></th>
	
		<?php foreach($jobs as $job):?>

		<tr>
			<td><?php echo $job['Job']['id']; ?></td>
			
			<td>
				<?php
					echo $this->Html->link($job['Job']['company'],array('controller'=>'jobs','action'=>'show',$job['Job']['id']));
				?>
			</td>
			
			<td><?php echo $job['Job']['type_of_work']; ?></td>
			
			<td>
				<?php echo $job['Job']['email']; ?>
			</td>
			
			<td><?php echo $job['Job']['created'] ?></td>
		</tr>

		<?php endforeach; ?>
	
	</table>
</center>
</div>



