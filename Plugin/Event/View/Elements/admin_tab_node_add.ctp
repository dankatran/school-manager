<?php
	$this->Html->script(array('/event/js/jquery.datetimepicker'), array('inline'=>false));
	$this->Html->css(array('/event/css/theme'), array('inline'=>false));

    echo $this->Form->input('Event.start_date', array('class'=>'datetimepicker', 'type'=>'text','label'=>false,'placeholder'=>'Thời gian bắt đầu'));
    echo $this->Form->input('Event.end_date', array('class'=>'datetimepicker', 'type'=>'text','label'=>false,'placeholder'=>'Thời gian kết thúc'));
?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#EventStartDate').datetimepicker({
			dateFormat: 'yy-mm-dd',
			timeFormat: 'hh:mm'

		});
		$('#EventEndDate').datetimepicker({
			dateFormat: 'yy-mm-dd',
			timeFormat: 'hh:mm'

		});

	});
</script>