
	<h3><?php echo empty($page->id) ? 'Add a new page' : 'Edit page '.$page->title; ?></h3>

	<?php echo validation_errors() ?>
	<?php echo form_open(); ?>
	<table class="table">
		<tr>
			<td>Parent</td>
			<td><?php echo form_dropdown('parent_id', $pages_no_parents, $this->input->post('parent_id') ? $this->input->post('parent_id') : $page->parent_id, 'class="form-control"'); ?></td>
		</tr>
		<tr>
			<td>Template</td>
			<td><?php echo form_dropdown('template', array('page' => 'Page', 'news_archive' => 'News archive', 'homepage' => 'Homepage'), $this->input->post('template') ? $this->input->post('template') : $page->template, 'class="form-control"'); ?></td>
		</tr>
		<tr>
			<td>Title</td>
			<td><?php echo form_input('title', set_value('title', $page->title), 'class="form-control"'); ?></td>
		</tr>
		<tr>
			<td>Slug</td>
			<td><?php echo form_input('slug', set_value('slug', $page->slug), 'class="form-control"'); ?></td>
		</tr>
		<tr>
			<td>Body</td>
			<td><?php echo form_textarea('body', set_value('body', $page->body), 'class="form-control tinymce"'); ?></td>
		</tr> 
		<tr>
			<td></td>
			<td><?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?></td>
		</tr>
	</table>
	<?php echo form_close() ?>
