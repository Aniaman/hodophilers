<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('General_model', 'gm');
		$this->load->library('session');
	}
	public function dashboard()
	{
		$adminData = $this->gm->fetch_single_data('admin', array('admin_id' => $this->session->admin_id));
		$this->load->template_admin('dashboard', compact('adminData'));
	}
}
