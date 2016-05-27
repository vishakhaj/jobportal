<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css');
    	echo $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js');

		echo $this->Html->css('style');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

</head>
<body>
	<!--Header-->
	<div class="cover-container">
		<div id="header">
			 <div class="masthead clearfix">
            <div class="inner">
              <h1 class="masthead-brand">Job Board</h1>
              <nav>
                <ul class="nav masthead-nav">
                  <li>
                  	<?php echo $this->Html->link(
    						'Home',
    						 array('controller' => 'jobs', 'action' => 'index')); ?>
                  </li>
                  <li>
                  	<?php echo $this->Html->link(
    						'View all jobs',
    						 array('controller' => 'jobs', 'action' => 'view')); ?>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
		</div>

		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>


		</div>

		<!--Footer-->
		<div id="footer">
           <div class="mastfoot">
            <div class="inner">
              <p><center><label class="footer-style">&copy; CakePHP Project</label> &middot; 
                  <label class="footer-style">Version-2.6</label>
              </center></p>
            </div>
          </div>
		</div>
	</div>

</body>
</html>
