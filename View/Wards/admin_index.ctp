<legend>Xã phường</legend>
<div class="table-responsive">
	<?php echo $this->Form->input('district_id', array('empty'=>'Chọn quận huyện', 'label'=>false,'id'=>'search')); ?>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Xã phường</th>
				<th>Mã xã phường</th>
				<th>Quận huyện</th>
				<th>Mã quận huyện</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($wards as $key => $w) { ?>
				<tr>
					<td><?php echo $w['Ward']['id']; ?></td>
					<td><?php echo $w['Ward']['name']; ?></td>
					<td><?php echo $w['Ward']['slug']; ?></td>
					<td><?php echo $w['District']['name']; ?></td>
					<td><?php echo $w['District']['slug']; ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<?php echo $this->Html->link(__('Thêm xã phường'), array('controller'=>'wards','action'=>'add'), array('class'=>'btn btn-primary')); ?>
</div>
<!--Filter Ajax-->
<script type="text/javascript">
	$(document).ready(function(){
		$('#search').change(function(){
			$('#loadding').show();
			var districtid = $(this).val();
			$.ajax({
			 	url: "<?php echo Router::url(array('controller'=>'wards','action'=>'ajaxsearch','admin'=>false));?>", 
			 	method: "GET",
				data: { districtid : districtid},
				dataType: "html",
			 	success: function(result){
			 		console.log(result);
			        $(".table-hover").html(result);
			    }
			}).always(function(){
				setTimeout(function() {
					$('#loadding').hide();
				},500);
            });
		});
	});
</script>