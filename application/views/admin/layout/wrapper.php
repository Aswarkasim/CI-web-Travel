<?php 

if($this->session->userdata('id_admin')=="" && $this->session->userdata('username')==""){
	$this->session->set_flashdata('msg', ' Silakan login terlebih dahulu');
	redirect(base_url('login'));
}else{
	require_once('head.php');
	require_once('header.php');
	require_once('nav.php');
	require_once('content.php');
	require_once('footer.php');
}