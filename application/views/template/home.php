<!DOCTYPE html>
<!--[if lt IE 7]>  <html class="ie ie6 lte9 lte8 lte7 no-js"> <![endif]-->
<!--[if IE 7]>     <html class="ie ie7 lte9 lte8 lte7 no-js"> <![endif]-->
<!--[if IE 8]>     <html class="ie ie8 lte9 lte8 no-js">      <![endif]-->
<!--[if IE 9]>     <html class="ie ie9 lte9 no-js">           <![endif]-->
<!--[if gt IE 9]>  <html class="no-js">                       <![endif]-->
<!--[if !IE]><!--> <html class="no-js">                       <!--<![endif]-->
	<?php $this->load->view('elements/head'); ?>
	<body>
		<div id="container" class="clearfix">
			<?php $this->load->view('elements/header'); ?>
				<?php echo $body; ?>
			<?php $this->load->view('elements/footer'); ?>
			<?php $this->load->view('elements/footer_scripts'); ?>
		</div>
	</body>
</html>