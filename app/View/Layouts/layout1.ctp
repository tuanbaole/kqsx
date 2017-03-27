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

$cakeDescription = __d('cake_dev', 'Phần mềm hỗ trợ xổ số');
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
		echo $this->Html->meta(
			'favicon.ico',
			'anh-upload/index.jpg',
    		array('type' => 'icon')
    	);
		echo $this->Html->css('kqxs.css');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<link href="/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="/bootstrap-3.3.7-dist/jquery-1.12.4/dist/jquery.min.js"></script>
	<script src="/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<link href="/bootstrap-datepicker/css/datepicker.css" rel="stylesheet">

	<script src="/js/global.js"></script>
</head>
<body>
	<!-- menu -->
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <span class="navbar-brand" href="#"><?php echo __('Ứng Dụng') ?></span>
	    </div>
	    <ul class="nav navbar-nav">
	      <li class="active">
	      <?php echo $this->Html->link(__('Trang chủ'), array('controller'=>'ketquas','action'=>'index'), array('escape'=>false)); ?>
	      </li>
	      <li>
	      	<?php echo $this->Html->link(__('Cập nhật hôm nay'), array('controller'=>'ketquas','action'=>'cap_nhat_hom_nay'), array('escape'=>false)); ?>
	      </li>
	      <li>
	      	<?php echo $this->Html->link(__('Cập nhật tất cả'), array('controller'=>'ketquas','action'=>'cap_nhat_tat_ca'), array('escape'=>false)); ?>
	      </li>
	      <li>
	      	<?php 
	      		echo $this->Form->create('session', array(
				    'url' => array('controller' => 'ketquas', 'action' => 'session'),
				    'id' => 'session',
				    'class' => 'navbar-form navbar-left',
				    'inputDefaults' => array(
				        'label' => false,
				        'div' => false
				    )
				));
	      	?>
	      	<div class="input-group" >
		      	<?php 
		      		echo $this->Form->input( 'date',array('class' => 'form-control',"id" => "datepicker","value" => $this->Session->read('Session.date') ) );
		      	?>
		      	<div class="input-group-btn">
			      <button class="btn btn-default" style="padding: 6.5px 12px;">
			        <i class="glyphicon glyphicon-search"></i>
			      </button>
			    </div>
		    </div>
		    <?php echo $this->Form->end(array('class' => 'hidden','div' => false)); ?>
	      </li>
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	     <!--  <li><a href="#">Tác giả : Lê Tuấn Bảo</a></li>
	      <li><a href="#">Liên hệ : 01663.153.993</a></li>
	      <li><a href="#">Email : letuanbao1993@gmail.com</a></li> -->
	    </ul>
	  </div>
	</nav>
	<!-- end menu -->
	<div class="container-fluid">
		<div class="fixed" id="alert-notification" style="display: none;"></div>			
		<?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
