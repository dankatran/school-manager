<?php
	$this->Html->script(array('/event/js/jquery.datetimepicker'), array('inline'=>false));
	$this->Html->css(array('/event/css/theme'), null, array('inline'=>false));

    echo $this->Form->input('Event.id');
    echo $this->Form->input('Event.node_id', array('type'=>'hidden', 'value'=>$this->data['Node']['id']));
    echo $this->Form->input('Event.start_date', array('class'=>'datetimepicker', 'type'=>'text','label'=>'Thời gian bắt đầu'));
    echo $this->Form->input('Event.end_date', array('class'=>'datetimepicker', 'type'=>'text','label'=>'Thời gian kết thúc'));
?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#EventStartDate').datetimepicker({
			dateFormat: 'yy-mm-dd',
			timeFormat: 'hh:mm:ss'

		});
		$('#EventEndDate').datetimepicker({
			dateFormat: 'yy-mm-dd',
			timeFormat: 'hh:mm:ss'

		});

	});
</script>