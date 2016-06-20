<legend>Cập nhật thông tin học sinh</legend>
<div id="ajax_loader" style="position: fixed; left: 60%; top: 20%; display: none; z-index:999;">
	<img src="/img/712.gif?1465115094" alt="">    
</div>
<?php
	echo $this->Form->create('Student');
	echo '<div class="col-md-6 col-sm-6 col-xs-12">'.$this->Form->input('name', array(
		'label' => false,
		'class' => 'form-control',
		'placeholder' => 'Họ tên',
		'value' => $this->Session->read('Auth.User.name')
	)).'</div>';
	echo '<div class="col-md-6 col-sm-6 col-xs-12">'.$this->Form->input('code', array(
		'label' => false,
		'class' => 'form-control',
		'placeholder' => 'Mã học sinh',
		'required' => true
	)).'</div>';
	echo '<div class="col-md-6 col-xs-12">'.$this->Form->input('year_id', $options = array('label' => false, 'empty' => 'Chọn năm học', 'class' => 'form-control years', 'required' => true)).'</div>';
	echo '<div class="col-md-6 col-xs-12">'.$this->Form->input('classroom_id', $options = array('label' => false, 'empty' => 'Chọn lớp học', 'class' => 'form-control classrooms', 'required' => true)).'</div>';
	echo '<div class="col-md-6 col-xs-12">'.$this->Form->input('address', $options = array('label' => false, 'placeholder' => 'Địa chỉ', 'class' => 'form-control', 'required' => true)).'</div>';
	echo '<div class="col-md-6 col-xs-12">'.$this->Form->input('phone', $options = array('label' => false, 'placeholder' => 'Số điện thoại', 'class' => 'form-control', 'required' => true)).'</div>';
	$position = array(1=>'Bí thư',2=>'Phó bí thư',3=>'Ủy viên',4=>'Lớp trưởng',5=>'Lớp phó học tập',6=>'Lớp phó văn thể mỹ',7=>'Lớp phó lao động',8=>'Thủ quỹ');
	echo '<div class="col-md-6 col-xs-12">'.$this->Form->input('position', $options = array(
		'label' => false, 
		'empty' => 'Chức vụ', 
		'class' => 'form-control', //'required' => true,
		'type'=>'select','options'=>$position)).'</div>';
	echo '<div class="col-md-6 col-xs-12">'.$this->Form->input('birthday', $options = array('label' => 'Sinh nhật', 'placeholder' => 'Ngày sinh nhật', 'class' => 'form_datetime', 'required' => true)).'</div>';
	echo '<div class="col-md-12">'.$this->Form->button('<i class="glyphicon glyphicon-floppy-save"></i> Xác nhận', array('class' => 'btn btn-primary', 'escape' => false)).'</div>';
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
	});
</script>