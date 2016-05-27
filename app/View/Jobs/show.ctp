<br><br><br>

<center>
<article id="showDetails">
	<h1><u><?php echo h($job['Job']['company']); ?></u></h1>

	<p><b><u>Created</u></b><br> 
		<?php echo $job['Job']['created']; ?>
	</p>

	<p><b><u>Type of Work</u></b><br>
		<?php echo $job['Job']['type_of_work']; ?>
	</p>

	<p><b><u>City</u></b><br> 
		<?php echo $job['Job']['city']; ?>
	</p>

	<p><b><u>Creator's Email address</u></b><br> 
		<?php echo $job['Job']['email']; ?>
	</p>

	<body><b><u>Job Description</u></b><br>
		<?php echo $job['Job']['job_description']; ?>
	</body>
</article>
</center>