<div>
	<div class="home">
		<div class="col-md-12 panel panel-default">
			<div class="panel-body">
				Lịch công tác
			</div>
		</div>
	</div>
	<div class="home">
		<?php foreach ($calendars as $key => $c) { ?>
			<span class="col-md-4">
				<?php echo '<i class="glyphicon glyphicon-calendar"></i> '.$c['Node']['title']; ?>
			</span>
			<span class="col-md-4">
				<?php echo '<i class="glyphicon glyphicon-time"></i> '.$c['Event']['start_date']; ?>
			</span>
			<span class="col-md-4">
				<?php echo '<i class="glyphicon glyphicon-time"></i> '.$c['Event']['end_date']; ?>
			</span>
		<?php } ?>
	</div>
</div>