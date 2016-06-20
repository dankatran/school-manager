<nav class="navbar navbar-default row" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li>
					<?php
						echo $this->Html->link('<i class="glyphicon glyphicon-home"></i> Trang chủ', array('plugin' => 'nodes','controller' => 'nodes', 'action' => 'home'), array('escape'=>false));
					?>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-info-circle"></i> Giới thiệu <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li>
							<?php echo $this->Html->link(__('<i class="fa fa-info"></i> Giới thiệu trường'), array('plugin'=>'nodes', 'controller'=>'nodes','action'=>'view','type'=>'page','slug'=>'gioi-thieu-truong-thpt-tran-hung-dao'), array('escape'=>false)); ?>
						</li>
						<li>
							<?php echo $this->Html->link(__('<i class="fa fa-maxcdn"></i> Ban giám hiệu'), array('plugin'=>'users', 'controller'=>'users','action'=>'managers'), array('escape' => false)); ?>
						</li>
						<li>
							<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-book"></i> Tổ chuyên môn'), array('plugin'=>'', 'controller'=>'departments','action'=>'index'), array('escape' => false)); ?>
						</li>
						<li>
							<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-briefcase"></i> Danh sách giáo viên'), array('plugin'=>'users', 'controller'=>'users','action'=>'teachers'), array('escape'=>false)); ?>
						</li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-dashboard"></i> Quản lý <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li>
							<?php echo $this->Html->link(__('<i class="fa fa-list-ul"></i> Danh sách lớp học'), array(
								'plugin'=>'',
								'controller' => 'classrooms',
								'action' => 'index',
								), array(
									'escape' => false
								));
							?>
						</li>
						<li>
							<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-education"></i> Danh sách học sinh'), array(
								'plugin'=>'users',
								'controller' => 'users',
								'action' => 'students',
								), array('escape' => false));
							?>
						</li>
						<li>
							<?php echo $this->Html->link(__('<i class="fa fa-table"></i> Thời khóa biểu'), array(
								'plugin'=>'',
								'controller' => 'schedules',
								'action' => 'index'
								), array(
									'escape' => false
								));
							?>
						</li>
						<li>
							<?php echo $this->Html->link(__('<i class="fa fa-list-ol"></i> Xem điểm'), array(
								'plugin'=>'',
								'controller' => 'points',
								'action' => 'index'
								), array(
									'escape' => false
								));
							?>
						</li>
						<li>
						<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-book"></i> Tài liệu'), array(
								'plugin'=>'file_manager',
								'controller' => 'attachments',
								'action' => 'index'
								), array(
									'escape' => false
								));
							?>
						</li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-pushpin"></i> Hoạt động <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li>
							<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-list"></i> Tin tức'), array('plugin'=>'nodes','controller'=>'nodes','action'=>'index','type' => 'tin-tuc'), array('escape'=>false)); ?>
						</li>
						<li>
							<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-bell"></i> Thông báo'), array('plugin'=>'nodes','controller'=>'nodes','action'=>'thongbao'), array('escape'=>false)); ?>
						</li>
						<li>
							<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-calendar"></i> Lịch công tác'), array('plugin'=>'nodes','controller'=>'nodes','action'=>'lich_cong_tac'), array('escape'=>false)); ?>
						</li>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<?php if($this->Session->read('Auth.User.username') == null) {?>
							<i class="glyphicon glyphicon-user"></i> Tài khoản
						<?php } else{ 
							echo '<i class="glyphicon glyphicon-user"></i> '.$this->Session->read('Auth.User.name');
						} ?>
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<?php 
							if($this->Session->read('Auth.User.username') == null) {
								echo '<li>'.$this->Html->link(__('<i class="glyphicon glyphicon-log-in"></i> Đăng nhập'), array('plugin'=>'users','controller'=>'users','action'=>'login'), array('escape'=>false)).'</li>';
								echo '<li>'.$this->Html->link(__('<i class="glyphicon glyphicon-registration-mark"></i> Đăng ký'), array('plugin'=>'users','controller'=>'users','action'=>'add'), array('escape'=>false)).'</li>';
							}else{
								echo '<li>'.$this->Html->link(__('<i class="glyphicon glyphicon-info-sign"></i> Thông tin tài khoản'), array('plugin'=>'users','controller'=>'users','action'=>'index'), array('escape'=>false)).'</li>';
								echo '<li>'.$this->Html->link(__('<i class="glyphicon glyphicon-edit"></i> Sửa thông tin'), array('plugin'=>'users','controller'=>'users','action'=>'edit','id' => $this->Session->read('Auth.User.id').'-'.$this->Session->read('Auth.User.username')), array('escape'=>false)).'</li>';
								echo '<li>'.$this->Html->link(__('<i class="glyphicon glyphicon-cog"></i> Thay mật khẩu'), array('plugin'=>'users','controller'=>'users','action'=>'reset_password', 'username' => $this->Session->read('Auth.User.username')), array('escape'=>false)).'</li>';
								echo '<li>'.$this->Html->link(__('<i class="glyphicon glyphicon-log-out"></i> Thoát'), array('plugin'=>'users','controller'=>'users','action'=>'logout'), array('escape'=>false)).'</li>';
							}
						?>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>