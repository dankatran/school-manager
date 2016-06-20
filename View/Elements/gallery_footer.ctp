<h4>Hình ảnh</h4>
<?php 
 	$news =  $this->requestAction(array('plugin' => 'nodes','controller'=>'nodes', 'action'=>'gallery'));
?>
<div id="carousel-id" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
		<?php foreach ($news as $key => $g) { ?>
			<div class="<?php if($key==0){ echo 'item active'; } else {echo 'item'; }?>">
				<?php 
					$this->Helpers->load('Multiattach.Multiattach');
				    $this->Multiattach->set($g["Multiattach"]);
				    $images = $this->Multiattach->filter(array('mime'=>'#image#i'));
				    $imageF = array(
				        'plugin' => 'Multiattach',
				        'controller' => 'Multiattach',
				        'action' => 'displayFile', 
				        'admin' => false,
				        );
				    if(!empty($images)){
					    foreach ($images as $image) {
					        ?><img src="<?php echo $this->Html->url($imageF + array('dimension' => 'main_slide', 'filename' => $image["Multiattach"]['filename']) ); ?>" alt="<?php echo $image["Multiattach"]['comment']; ?>"/>
					        <?php
					    }
					}else{
						echo $this->Html->image('default-thumbnail.jpg');
					}
				?>
			</div>
		<?php } ?>
	</div>
	<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
	<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>