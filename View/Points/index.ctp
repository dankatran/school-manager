<legend><i class="fa fa-list-ol"></i> Điểm thi</legend>
<div id="loading" style="display: none; position: absolute; left: 45%">
	<?php echo $this->Html->image('712.gif'); ?>
</div>
<?php 
	echo $this->Form->input('year_id', $options = array(
		'class' => 'form-control years',
		'empty' => 'Chọn năm học',
		'label' => false
	));
?>
<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Lớp học</th>
				<th>Năm học</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($points as $key => $p) { ?>
				<tr>
					<td><?php echo $key + 1; ?></td>
					<td>	
						<?php 
							echo $this->Html->link($p['Classroom']['name'], array('controller' => 'classrooms', 'action' => 'points', 'slug' => $p['Classroom']['slug'].'/'.$p['Year']['slug']));
						?>
					</td>
					<td><?php echo $p['Year']['name']; ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.years').change(function(){
			$('#loading').show();
			var yearid = $(this).val();
			$.ajax({
			 	url: "/points/years", 
			 	method: "GET",
				data: { yearid : yearid},
				dataType: "html",
			 	success: function(result){
			 		console.log(result);
			 		$("#loading").fadeOut(500);
			        $(".table-responsive").html(result);
			    }
			})
		});
	});
</script>