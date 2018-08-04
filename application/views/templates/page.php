<div class="col-md-9">
	<div class="row">
		<div class="col-md-12">
			<article>
				<h2><?php echo e($page->title); ?></h2>
				<?php echo $page->body; ?>
			</article>
		</div>
	</div>					
</div>
<div class="col-md-3 sidebar">
	<h2>Recent news</h2>
	<!-- array_slice — Extraer una parte de un array 
		$entrada = array("a", "b", "c", "d", "e");
		$salida = array_slice($entrada, 2);      // devuelve "c", "d", y "e"-->
	<?php $this->load->view('sidebar'); ?>
</div>