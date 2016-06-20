<div>
	<legend>Danh sách học sinh</legend>
	<div id='ajax_loader' style="position: fixed; left: 58%; top: 20%; display: none; z-index:999;">
		<?php echo $this->Html->image('712.gif'); ?>
    </div>
	<?php 
		echo '<div class="col-md-6 col-xs-12 col-sm-6 row">'.$this->Form->input('year_id', array(
			'label' => false,
			'class' => 'form-control years',
			'empty' => 'Chọn năm học',
			'id' =>'years'
		)).'</div>';
		echo '<div class="col-md-6 col-xs-12 col-sm-6">'.$this->Form->input('classroom_id', array(
			'label' => false,
			'empty' => 'Chọn lớp học',
			'class' => 'form-control classrooms',
			'id' => 'search'
		)).'</div>'; 
	?>
	<div class="table-responsive col-md-12 row">
		<table class="table table-hover" id="mt">
			<thead>
				<tr class="header">
					<th>#</th>
					<th><i class="glyphicon glyphicon-user"></i></th>
					<th>Lớp</th>
					<th>Năm học</th>
					<th><i class="glyphicon glyphicon-home"></i> Địa chỉ</th>
					<th><i class="glyphicon glyphicon-phone"></i></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($students as $key => $s) { ?>
					<tr class="resultblock" data-tag="<?php echo $s['Year']['id'];?>">
						<td>
							<?php echo $key + 1; ?>
						</td>
						<td>
							<?php echo $s['Student']['name']; ?>
						</td>
						<td>
							<?php echo $s['Classroom']['name']; ?>
						</td>
						<td>
							<?php echo $s['Year']['name']; ?>
						</td>
						<td>
							<?php echo $s['Student']['address']; ?>
						</td>
						<td>
							<?php echo $s['Student']['phone']; ?>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<?php echo $this->element('pagi'); ?>
	</div>
</div>
<!--Load class-->
<script type="text/javascript">
	$(document).ready(function() {
		$(".years").change(function() {
			$("#ajax_loader").show();
		    var url = "<?php echo Router::url(array('admin'=>false, 'controller'=>'years','action'=>'classrooms'));?>";
	        var yearid = $(this).val();
	        $.ajax({
	            type: 'GET',
	            url: url,
	            data: { yearid : yearid },
	            success: function (data){
	            	console.log(data);
	            	$("#ajax_loader").fadeOut(1000);
	            	$('.classrooms').html(data);
	            }
	        });
	    });
	});
</script>
<!--Filter Ajax by year-->
<script type="text/javascript">
	$(document).ready(function(){
		$('#years').change(function(){
			var yearid = $(this).val();
			$.ajax({
			 	url: "<?php echo Router::url(array('controller'=>'students','action'=>'years'));?>", 
			 	method: "GET",
				data: { yearid : yearid},
				dataType: "html",
			 	success: function(result){
			 		console.log(result);
			        $(".table-responsive").html(result);
			    }
			})
		});
	});
</script>
<!--Filter Ajax by class-->
<script type="text/javascript">
	$(document).ready(function(){
		$('#search').change(function(){
			$("#ajax_loader").show();
			var classid = $(this).val();
			$.ajax({
			 	url: "<?php echo Router::url(array('controller'=>'students','action'=>'ajaxsearch'));?>", 
			 	method: "GET",
				data: { classid : classid},
				dataType: "html",
			 	success: function(result){
			 		console.log(result);
			        $(".table-responsive").html(result);
			        $("#ajax_loader").fadeOut(1000);
			    }
			})
		});
	});
</script>