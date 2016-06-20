<legend><i class="fa fa-table"></i> Thời khóa biểu</legend>
<div id="loading" style="display: none; position: absolute; left: 45%;"><?php echo $this->Html->image('712.gif'); ?></div>
<?php 
	echo $this->Form->input('year_id', $options = array(
		'class' => 'form-control',
		'label' => false,
		'id' => 'search',
		'empty' => 'Chọn năm học'
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
			<?php 
				foreach ($schedules as $key => $s) {
			?>
				<tr>
					<td><?php echo $key + 1; ?></td>
					<td>
						<?php
							echo $this->Html->link(__($s['Classroom']['name']), array('controller'=>'classrooms', 'action'=>'schedule', 'slug' => $s['Classroom']['slug'].'/'.$s['Year']['slug']));
						?>
					</td>
					<td><?php echo $s['Year']['name'];?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<!--Filter Ajax-->
<script type="text/javascript">
	$(document).ready(function(){
		$('#search').change(function(){
			$('#loading').show();
			var yearid = $(this).val();
			$.ajax({
			 	url: "/schedules/ajaxsearch", 
			 	method: "GET",
				data: { yearid : yearid},
				dataType: "html",
			 	success: function(result){
			 		console.log(result);
			        $(".table-responsive").html(result);
			        $('#loading').fadeOut(500);
			    }
			})
		});
	});
</script>
