
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<a class="navbar-brand" href="<?php echo site_url('admin/dashboard'); ?>"><?php echo $meta_title ?></a>
			<ul class="nav navbar-nav">
				<li class="active">
					<a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a>
				</li>
				<li><?php echo anchor('admin/page', 'pages'); ?></li>
				<li><?php echo anchor('admin/user', 'users'); ?></li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<section>
					<h2>Page name</h2>
				</section>				
			</div>
			<div class="col-md-3">
				<section>
					<?php echo mailto('santos@admin.com', '<i class="glyphicon glyphicon-user"></i> santos@admin.com'); ?>
					<?php echo anchor('admin/user/logout', '<i class="glyphicon glyphicon-off"></i> logout'); ?>
				</section>
			</div>
		</div>
	</div>
	<script src="<?php echo site_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
	<script src="<?php echo site_url('assets/js/bootstrap.min.js'); ?>"></script>
</body>
</html>