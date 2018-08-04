<h2>Recently modified articles</h2>

<?php if(count($recent_articles)): ?>
<!-- echo date("jS F, Y", strtotime("11-12-10")); 
// outputs 11th December, 2010  -->
<ul>
	<?php foreach($recent_articles as $article): ?>
	<li><?php echo anchor('admin/article/edit/' . $article->id, e($article->title)); ?> - <?php echo date('Y-m-d', strtotime($article->modified)); ?></li>
	<?php endforeach; ?>
</ul>
<?php endif; ?>