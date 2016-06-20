<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $title_for_layout; ?> | <?php echo Configure::read('Site.title'); ?></title>
		<!-- Bootstrap CSS -->
		<?php echo $this->Html->css(array('bootstrap.min','font-awesome.min','font-awesome','style','points')); ?>
		<?php echo $this->Html->script(array('jquery','bootstrap.min')); ?>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="page-header">
		  	<div class="container-fluid">
	  			<div class="col-xs-12 col-sm-4 col-md-5 col-lg-5">
	  				<h1 class="site-title"><?php echo $this->Html->link(Configure::read('Site.title'), '/'); ?></h1>
	  				<span class="site-tagline"><?php echo Configure::read('Site.tagline'); ?></span>
	  			</div>
	  			<div class="col-xs-12 col-sm-8 col-md-7 col-lg-7">
	  				<?php echo $this->element('menu'); ?>
	  			</div>
		  	</div>
		</div>
		<section>
			<div class="container-fluid">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<?php
						echo $this->Layout->sessionFlash();
						echo $content_for_layout;
					?>
				</div>
			</div>
		</section>
		<div class="panel panel-default">
			<?php echo $this->element('footer'); ?>
		</div>
	</body>
</html>