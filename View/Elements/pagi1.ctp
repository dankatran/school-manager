<?php 
      echo $this->Html->css(array('smartpaginator'));
      echo $this->Html->script(array('smartpaginator'));
?>
<div id="green" style="margin: auto;" class="pager green col-md-12">
      <div class="btn" style="display: none;">First</div>
      <div class="btn" style="display: none;">Prev</div>
      <ul>
      	<li>
      		<a id="1" class="green normal active" href="javascript:void(0)">1</a>
      	</li>
      	<li>
      		<a id="2" class="green normal" href="javascript:void(0)">2</a>
      	</li>
      	<li>
      		<a id="3" class="green normal" href="javascript:void(0)">3</a>
      	</li>
      	<li>
      		<a id="4" class="green normal" href="javascript:void(0)">4</a>
      	</li>
      </ul>
      <div class="btn" style="display: none;">Next</div>
      <div class="btn" style="display: none;">Last</div>
      <div class="short">
      	<input type="text">
      	<input type="button" value="Go" class="btn">
      </div>
      <span><b>1</b></span>
      <span>-</span>
      <span><b>3</b></span>
      <span>of</span>
      <span><b>10</b></span>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#green').smartpaginator({ totalrecords: <?php echo $total; ?>, recordsperpage: 15, datacontainer: 'mt', dataelement: 'tr', initval: 0, next: 'Next', prev: 'Prev', first: 'First', last: 'Last', theme: 'green' });
    });
</script>