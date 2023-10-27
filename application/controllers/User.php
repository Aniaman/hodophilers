<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('General_model', 'gm');
    $this->load->library('session');
    if ($this->session->user_id == "") {
        return redirect('user-login');
    }
  }
  public function dashboard(){
	$userData = $this->gm->fetch_single_data('user_profile', array('user_id' => $this->session->user_id));
		$this->session->set_userdata('userName', $userData['user_name']);
		$this->session->set_userdata('profileImg', $userData['user_profile_image']);
		$this->load->template_user('dashboard');
  }
}