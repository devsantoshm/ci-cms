<div class="col-md-9">
	<div class="row">
		<div class="col-md-12">
			<?php if(count($articles)): foreach($articles as $article): ?> 
				<article><?php echo get_excerpt($article); ?></article>
			<?php endforeach; endif; ?>
		</div>
	</div>
	<?php if($pagination): ?>
		<section><?php echo $pagination; ?></section>
	<?php endif; ?>						
</div>
<div class="col-md-3 sidebar">
	<h2>Recent news</h2>
	<!-- array_slice — Extraer una parte de un array 
		$entrada = array("a", "b", "c", "d", "e");
		$salida = array_slice($entrada, 2);      // devuelve "c", "d", y "e"-->
	<?php $this->load->view('sidebar'); ?>
</div>