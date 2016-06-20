<div>
	<div class="home">
		<div class="col-md-12 panel panel-default">
			<div class="panel-body">
				Thông báo
			</div>
		</div>
	</div>
	<div class="home">
		<?php foreach ($notices as $key => $n) { ?>
			<span class="col-md-4">
				<?php echo '<i class="glyphicon glyphicon-bell"></i> '.$n['Node']['title']; ?>
			</span>
			<span class="col-md-4">
				<?php echo '<i class="glyphicon glyphicon-time"></i> '.$n['Event']['start_date']; ?>
			</span>
			<span class="col-md-4">
				<?php echo '<i class="glyphicon glyphicon-time"></i> '.$n['Event']['end_date']; ?>
			</span>
		<?php } ?>
	</div>
</div>