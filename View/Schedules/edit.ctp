<legend>Sửa điểm thi</legend>
<div id="loading" style="display:none; position: absolute; left: 45%;"><?php echo $this->Html->image('712.gif'); ?></div>
<?php 
	echo $this->Form->create('Schedule');
	echo $this->Form->input('id');
	echo $this->Form->input('subject_id', $options = array(
		'class' => 'form-control',
		'label' => 'Chọn môn học'
	));
	$date = array(1=>'Thứ 2', 2=>'Thứ 3', 3=>'Thứ 4', 4=>'Thứ 5', 5=>'Thứ 6', 6=>'Thứ 7', 7 => 'Chủ nhật');
	echo $this->Form->input('date', array(
		'class' => 'form-control',
		'label' => 'Chọn thứ ngày',
		'empty' => 'Chọn thứ ngày',
		'options' => $date
	));
	echo $this->Form->input('time_id', $options = array(
		'class' => 'form-control',
		'label' => 'Chọn tiết học'
	));
	echo $this->Form->input('year_id', $options = array(
		'class' => 'form-control years',
		'label' => 'Chọn năm học'
	));
	echo $this->Form->input('classroom_id', $options = array(
		'class' => 'form-control classrooms',
		'label' => 'Chọn lớp học'
	));
	$semester = array(1 => 'Học kỳ I', 2 => 'Học kỳ II');
	echo $this->Form->input('semester', $options = array(
		'class' => 'form-control',
		'label' => 'Chọn học kỳ',
		'options' => $semester,
		'empty' => 'Chọn học kỳ'
	));
	echo $this->Form->end($options = array(
		'class' => 'btn btn-primary',
		'div' => false,
		'label' => 'Sửa'
	));
?>
<script type="text/javascript">
	$(document).ready(function() {
	$(".years").change(function() {
		$('#loading').show();
	    var url = '<?php echo Router::url(array('controller'=>'years','action'=>'classrooms'));?>';
        yearid = $(this).val();
        $.ajax({
            type: 'GET',
            url: url,
            data: { yearid : yearid},
            success: function (data){
                $('.classrooms').html(data);
                $('#loading').fadeOut(500);
            }
        });
    });
});
</script>