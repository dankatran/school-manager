<legend>Cập nhật thông tin giáo viên</legend>
<div id="loading" style="display: none; position: absolute; left: 45%;">
	<?php echo $this->Html->image('712.gif'); ?>
</div>
<?php 
	echo $this->Form->create('Teacher');
	echo $this->Form->input('name', $options = array(
		'label' => false,
		'class' => 'form-control',
		'value' => $this->Session->read('Auth.User.name'),
		'placeholder' => 'Họ tên'
	));
	echo $this->Form->input('department_id', $options = array(
		'class' => 'form-control',
		'label' => false,
		'empty' => 'Chọn phòng ban',
		'required' => true
	));
	echo $this->Form->input('district_id', $options = array(
		'class' => 'form-control districts',
		'label' => false,
		'empty' => 'Chọn quận huyện',
		'required' => true
	));
	echo $this->Form->input('ward_id', $options = array(
		'class' => 'form-control wards',
		'label' => false,
		'empty' => 'Chọn xã phường',
		'required' => true
	));
	echo $this->Form->input('address', $options = array(
		'label' => false,
		'class' => 'form-control',
		'placeholder' => 'Địa chỉ'
	));
	echo $this->Form->input('phone', $options = array(
		'label' => false,
		'class' => 'form-control',
		'placeholder' => 'Số điện thoại'
	));
	echo $this->Form->input('birthday', $options = array(
		'label' => 'Sinh nhật',
		'class' => 'form_datetime',
		'minYear' => date('Y') - 70
	)).'</br>';
	echo $this->Form->input('university', $options = array(
		'label' => false,
		'class' => 'form-control',
		'placeholder' => 'Trường tốt nghiệp'
	));
	echo $this->Form->input('subject_id', $options = array(
		'class' => 'form-control',
		'label' => false,
		'empty' => 'Ngành học',
		'required' => true
	));
	echo $this->Form->input('body', $options = array(
		'label' => false,
		'class' => 'form-control',
		'placeholder' => 'Giới thiệu bản thân'
	));
	echo $this->Form->button('<i class="glyphicon glyphicon-floppy-save"></i> Cập nhật', $options = array(
		'class' => 'btn btn-primary',
		'escape' => false
	));
?>
<script type="text/javascript">
	$(document).ready(function() {
	$(".districts").change(function() {
		$("#loading").show();
	    var url = '<?php echo Router::url(array('controller'=>'districts','action'=>'wards'));?>';
        ward = $(this).val();
        $.ajax({
            type: 'GET',
            url: url,
            data: { ward : ward},
            success: function (data){
                $('.wards').html(data);
                $("#loading").fadeOut(500);
            }
        });
    });
});
</script>