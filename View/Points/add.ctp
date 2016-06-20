<legend><i class="glyphicon glyphicon-plus"></i> Thêm điểm</legend>
<div id='ajax_loader' style="position: absolute; left: 45%; top: 40%; display: none; z-index:999;">
	<img src="/img/712.gif?1465115094" alt=""/>    
</div>
<div id='loading' style="position: absolute; left: 45%; top: 52%; display: none; z-index:999;">
	<img src="/img/712.gif?1465115094" alt=""/>    
</div>
<?php
	echo $this->Form->create('Point');
	echo $this->Form->input('subject_id', $options = array(
		'class' => 'form-control',
		'empty' => 'Chọn môn học',
		'label' => false,
		'required' => true
	));
	echo $this->Form->input('year_id', $options = array(
		'class' => 'form-control years',
		'empty' => 'Chọn năm học',
		'label' => false,
		'required' => true
	));
	$semester = array(1=>'Học kỳ 1', 2=>'Học kỳ 2');
	echo $this->Form->input('semester', $options = array(
		'class' => 'form-control',
		'empty' => 'Chọn học kỳ',
		'label' => false,
		'options' => $semester,
		'required' => true
	));
	echo $this->Form->input('classroom_id', $options = array(
		'class' => 'form-control classrooms',
		'empty' => 'Chọn lớp học',
		'label' => false,
		'required' => true
	));
	echo $this->Form->input('user_id', $options = array(
		'class' => 'form-control students',
		'empty' => 'Chọn học sinh',
		'label' => false,
		'required' => true
	));
	$type = array(1=>'Kiểm tra miệng', 2=>'Kiểm tra 15 phút', 3=>'Kiểm tra 1 tiết', 4=>'Kiểm tra học kỳ');
	echo $this->Form->input('type', $options = array(
		'class' => 'form-control',
		'empty' => 'Chọn loại điểm thi',
		'label' => false,
		'options' => $type,
		'required' => true
	));
	echo $this->Form->input('point', $options = array(
		'class' => 'form-control',
		'label' => false,
		'placeholder' => 'Nhập điểm',
		'required' => true
	));
	echo $this->Form->end($options = array(
		'label' => 'Xác nhận',
		'div' => false,
		'class' => 'btn btn-info'
	));
?>
<!--Load class-->
<script type="text/javascript">
	$(document).ready(function() {
		$(".years").change(function() {
			$("#ajax_loader").show();
		    var url = "/years/classrooms";
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
	    $(".classrooms").change(function() {
			$("#loading").show();
		    var url = "/classrooms/ajax";
	        var classid = $(this).val();
	        $.ajax({
	            type: 'GET',
	            url: url,
	            data: { classid : classid },
	            success: function (data){
	            	console.log(data);
	            	$("#loading").fadeOut(1000);
	            	$('.students').html(data);
	            }
	        });
	    });
	});
</script>

