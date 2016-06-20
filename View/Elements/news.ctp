<div class="home">
	<div class="col-md-12 panel panel-default">
		<div class="panel-body">
			<i class="glyphicon glyphicon-list"></i> Tin hoạt động
		</div>
	</div>
</div>
<?php foreach ($news as $key => $node) { $this->Nodes->set($node); ?>
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div class="thumbnail">
			<?php
				$this->Helpers->load('Multiattach.Multiattach');
			    $this->Multiattach->set($node["Multiattach"]);
			    $images = $this->Multiattach->filter(array('mime'=>'#image#i'));
			    $imageF = array(
			        'plugin' => 'Multiattach',
			        'controller' => 'Multiattach',
			        'action' => 'displayFile', 
			        'admin' => false,
			        );
			    if(!empty($images)){
				    foreach ($images as $image) {
				        ?><img src="<?php echo $this->Html->url($imageF + array('dimension' => 'main_slide', 'filename' => $image["Multiattach"]['filename']) ); ?>" alt="<?php echo $image["Multiattach"]['comment']; ?>" class="img-responsive"/>
				        <?php
				    }
				}else{
					echo $this->Html->image('default-thumbnail.jpg');
				}
			?>
			<div class="caption">
				<h5><?php echo $this->Html->link($this->Nodes->field('title'), $this->Nodes->field('url')); ?></h5>
				<?php echo $this->Nodes->excerpt(); ?>
			</div>
		</div>
	</div>
<?php } ?>