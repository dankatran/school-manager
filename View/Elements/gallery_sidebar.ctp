<?php 
 	$galleries =  $this->requestAction(array('plugin' => 'nodes','controller'=>'nodes', 'action'=>'gallery'));
 	foreach ($galleries as $key => $g) {
 		$this->Helpers->load('Multiattach.Multiattach');
	    $this->Multiattach->set($g["Multiattach"]);
	    $images = $this->Multiattach->filter(array('mime'=>'#image#i'));
	    $imageF = array(
	        'plugin' => 'Multiattach',
	        'controller' => 'Multiattach',
	        'action' => 'displayFile', 
	        'admin' => false,
	        );
	    echo '<div class="col-md-4 col-xs-12 col-sm-6 col-lg-4 row">';
		    if(!empty($images)){
			    foreach ($images as $image) {
			        ?><img src="<?php echo $this->Html->url($imageF + array('dimension' => 'main_slide', 'filename' => $image["Multiattach"]['filename']) ); ?>" alt="<?php echo $image["Multiattach"]['comment']; ?>" class="img-responsive"/>
			        <?php
			    }
			}else{
				echo $this->Html->image('default-thumbnail.jpg', array('class' => "img-responsive"));
			}
		echo '</div>';
 	}
?>