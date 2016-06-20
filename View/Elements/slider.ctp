<div id="carousel" class="carousel slide" data-ride="carousel" data-type="multi">
	<div class="carousel-inner">
		<?php foreach ($sliders as $key => $node) { $this->Nodes->set($node); ?>
			<div class="<?php if($key == 0 ){echo 'item active';}else{echo 'item'; }?>">
				<div class="col-md-6 col-xs-12 col-sm-6 col-lg-6 slider">
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
					    foreach ($images as $image) {
					        ?><img src="<?php echo $this->Html->url($imageF + array('dimension' => 'main_slide', 'filename' => $image["Multiattach"]['filename']) ); ?>" alt="<?php echo $image["Multiattach"]['comment']; ?>" class="img-responsive" />
					        <?php
					    }
					?>
					<div class="container">
						<div class="carousel-caption">
							<h3><?php echo $node['Node']['title']; ?></h3>
							<p><?php echo $this->Nodes->excerpt(); ?></p>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
	<a class="left carousel-control" href="#carousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
	<a class="right carousel-control" href="#carousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>