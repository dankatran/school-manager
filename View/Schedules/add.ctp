<legend><i class="glyphicon glyphicon-plus"></i> Thêm thời khóa biểu</legend>
<div id="loading" style="display:none; position: absolute; left:45%; top: 60%">
	<?php echo $this->Html->image('712.gif'); ?>
</div>
<?php
	echo $this->Form->create('Schedule');
	echo $this->Form->input('subject_id', array(
		'class' => 'form-control',
		'label' => false,
		'empty' => 'Chọn môn học',
		'required' => true
	));
	$date = array(1=>'Thứ 2', 2=>'Thứ 3', 3=>'Thứ 4', 4=>'Thứ 5', 5=>'Thứ 6', 6=>'Thứ 7', 7 => 'Chủ nhật');
	echo $this->Form->input('date', array(
		'class' => 'form-control',
		'label' => false,
		'empty' => 'Chọn thứ ngày',
		'required' => true,
		'options' => $date
	));
	echo $this->Form->input('time_id', array(
		'class' => 'form-control',
		'label' => false,
		'empty' => 'Chọn tiết học',
		'required' => true
	));
	echo $this->Form->input('year_id', array(
		'class' => 'form-control years',
		'label' => false,
		'empty' => 'Chọn năm học',
		'required' => true
	));
	echo $this->Form->input('classroom_id', array(
		'class' => 'form-control classrooms',
		'label' => false,
		'empty' => 'Chọn lớp học',
		'required' => true
	));
	$semester = array(1=>'Học kỳ 1', 2=>'Học kỳ 2');
	echo $this->Form->input('semester', array(
		'class' => 'form-control',
		'label' => false,
		'empty' => 'Chọn học kỳ',
		'options' => $semester,
		'required' => true
	));
	echo $this->Form->end(array(
		'label' => 'Xác nhận',
		'div' => false,
		'class' => 'btn btn-info'
	));
?>
<script type="text/javascript">
	$(document).ready(function() {
	$(".years").change(function() {
		$("#loading").show();
	    var url = '<?php echo Router::url(array('controller'=>'years','action'=>'classrooms'));?>';
        yearid = $(this).val();
        $.ajax({
            type: 'GET',
            url: url,
            data: { yearid : yearid},
            success: function (data){
                $('.classrooms').html(data);
                $("#loading").fadeOut(500);
            }
        });
    });
});
</script>