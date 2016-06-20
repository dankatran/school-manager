<div class="table-responsive">
	<table class="table table-hover" id="mt">
		<thead>
			<tr>
				<th>#</th>
				<th>Họ tên</th>
				<th>Lớp</th>
				<th>Năm học</th>
				<th>Địa chỉ</th>
				<th>Số điện thoại</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($students as $key => $s) { ?>
				<tr class="resultblock header" data-tag="<?php echo $s['Year']['id'];?>">
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