<?php $this->load->view('components/page_head'); ?>
<body>
	<div class="container">
		<section>
			<h1><?php echo config_item('site_name') ?></h1>
		</section>
		<nav class="navbar navbar-default">
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
			      <li><a href="#">Link</a></li>
			      <li class="dropdown">
			        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
			        <ul class="dropdown-menu">
			          <li><a href="#">Action</a></li>
			          <li><a href="#">Another action</a></li>
			          <li><a href="#">Something else here</a></li>
			          <li><a href="#">Separated link</a></li>
			        </ul>
			      </li>
			    </ul>
			</div>
		</nav>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<h2>Main page</h2>						
			</div>
			<div class="col-md-3">
				<h2>Sidebar</h2>
			</div>
		</div>
	</div>
<?php $this->load->view('components/page_tail'); ?>