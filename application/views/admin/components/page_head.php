<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $meta_title ?></title>
	<link rel="stylesheet" href="<?php echo site_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo site_url('assets/css/admin.css'); ?>">
	<link rel="stylesheet" href="<?php echo site_url('assets/css/bootstrap-datepicker3.min.css'); ?>">

	<script src="<?php echo site_url('assets/js/jquery-1.10.2.js'); ?>"></script>
	<script src="<?php echo site_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo site_url('assets/js/bootstrap-datepicker.js'); ?>"></script>
	<?php if(isset($sortable) && $sortable === TRUE): ?>
	<script src="<?php echo site_url('assets/js/jquery-ui-1.10.4.custom.min.js'); ?>"></script>
	<script src="<?php echo site_url('assets/js/jquery.mjs.nestedSortable.js'); ?>"></script>
	<?php endif; ?>
	<script src="<?php echo site_url('assets/js/tinymce/tinymce.min.js'); ?>"></script>
	<script type="text/javascript">
		tinymce.init({
		  convert_newlines_to_brs : false,
		  selector: 'textarea',
		  height: 200,
		  theme: 'modern',
		  mobile: {
		    theme: 'beta-mobile',
		    plugins: [ 'autosave' ]
		  },
		  plugins: 'print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
		  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
		  image_advtab: true,
		  templates: [
		    { title: 'Test template 1', content: 'Test 1' },
		    { title: 'Test template 2', content: 'Test 2' }
		  ],
		  content_css: [
		    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
		    '//www.tinymce.com/css/codepen.min.css'
		  ],
		  content_style: [
		    'body{max-width:700px; padding:30px; margin:auto;font-size:16px;font-family:Lato,"Helvetica Neue",Helvetica,Arial,sans-serif; line-height:1.3; letter-spacing: -0.03em;color:#222} h1,h2,h3,h4,h5,h6 {font-weight:400;margin-top:1.2em} h1 {} h2{} .tiny-table {width:100%; border-collapse: collapse;} .tiny-table td, th {border: 1px solid #555D66; padding:10px; text-align:left;font-size:16px;font-family:Lato,"Helvetica Neue",Helvetica,Arial,sans-serif; line-height:1.6;} .tiny-table th {background-color:#E2E4E7}'
		  ],
		  visual_table_class: 'tiny-table'
		 });
	</script>
</head>