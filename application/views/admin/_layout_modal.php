<?php $this->load->view('admin/components/page_head'); ?>
<body style="background: #555">
	<div class="modal show">
		<?php $this->load->view($subview); //Subview is set in controller?>
				<div class="modal-footer">
					&copy; <?php echo date('Y') ?> <?php echo $meta_title; ?>
				</div>
			</div>
		</div>
	</div>
<?php $this->load->view('admin/components/page_tail'); ?>