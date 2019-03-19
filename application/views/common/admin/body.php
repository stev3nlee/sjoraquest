<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="target-densitydpi=device-dpi; width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
<meta name="HandheldFriendly" content="true" />
<link href="<?php echo base_url();?>templates/css/isyscms2.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>templates/css/jquery-ui.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url();?>templates/js/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url();?>templates/js/jquery-ui.js"></script>
<script src="<?php echo base_url();?>templates/js/admin.js"></script>
<title>Home | ISYSCMS</title>
</head>
<body>
<?php

if($this->session->userdata('admin_logged_in')){
$this->load->view('common/admin/header');?>
<section>
<?php 
$this->load->view('common/admin/nav');
$this->load->view($content);
?>
</section>
<?php 
$this->load->view('common/admin/footer');
?>
<?php }else{?>

<div class="con">
<?php $this->load->view($content);?>
</div>
<?php }?>
<div class="overlay"></div>
<script>window.onload = date_time('date_time');</script>
</body>
</html>

