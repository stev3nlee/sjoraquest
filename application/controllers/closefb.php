<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Closefb extends CI_Controller {
	function __construct(){
		parent::__construct();
	
	}a
	
	function index(){
		echo "<script>self.close();</script>";
	}
	

}