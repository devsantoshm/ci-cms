<div class="modal-header">
	<h3><?php echo empty($user->id) ? 'Add a new user' : 'Edit user '.$user->name; ?></h3>
</div>
<div class="modal-body">
	<!-- <?php echo '<pre>' . print_r($this->session->userdata, TRUE) . '</pre>'; ?> -->
	<?php echo validation_errors() ?>
	<?php echo form_open() ?>
	<table class="table">
		<tr>
			<td>Email</td>
			<td><?php echo form_input('email'); ?></td>
		</tr> 
		<tr>
			<td></td>
			<td><?php echo form_submit('submit', 'Log in', 'class="btn btn-primary"'); ?></td>
		</tr>
	</table>
	<?php echo form_close() ?>
</div>