
	<h3><?php echo empty($article->id) ? 'Add a new article' : 'Edit article '.$article->title; ?></h3>

	<?php echo validation_errors() ?>
	<?php echo form_open() ?>
	<table class="table">	
		<tr>
			<td>Publication date</td>
			<td><?php echo form_input('pubdate', set_value('pubdate', $article->pubdate), 'class="form-control datepicker"'); ?></td>
		</tr>
		<tr>
			<td>Title</td>
			<td><?php echo form_input('title', set_value('title', $article->title), 'class="form-control"'); ?></td>
		</tr>
		<tr>
			<td>Slug</td>
			<td><?php echo form_input('slug', set_value('slug', $article->slug), 'class="form-control"'); ?></td>
		</tr>
		<tr>
			<td>Body</td>
			<td><?php echo form_textarea('body', set_value('body', $article->body), 'class="form-control tinymce"'); ?></td>
		</tr> 
		<tr>
			<td></td>
			<td><?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?></td>
		</tr>
	</table>
	<?php echo form_close() ?>

	<script>
		$(function(){
			$('.datepicker').datepicker({
				format: 'yyyy-mm-dd',
				autoclose: true
			});
		})
	</script>
