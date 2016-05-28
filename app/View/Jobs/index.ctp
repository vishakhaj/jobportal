<div class="cover-container">
   <!--Inner Content-->
    <div class="content">
       
      <br>
      <p class="content"><h1 class="cover-heading">Job Board - The online Job Portal</h1></p>
      <p><h2>"Hiring the best is your Most Important Task!"</h2></p>
      <p><em>-Steve Jobs</em></p>

      <p class="btn-content">
                
      <?php
        echo $this->HTML->link('CREATE YOUR JOB',array('controller'=>'jobs','action'=>'add'),array('class'=>'btnCreateJob'));
      ?> 
                
      </p>
      <br>

    </div>  
</div>