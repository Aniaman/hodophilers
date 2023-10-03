<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('General_model', 'gm');
    $this->load->library('session');
  }
  public function index()
  {
    $this->load->sign_up('admin/index');
  }
  public function loginAction()
  {
    $this->form_validation->set_rules(
      'emailId',
      'Admin email',
      'required|valid_email'
    );
    $this->form_validation->set_rules('password', 'Password', 'required|max_length[16]|min_length[5]|regex_match[/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.* ).{5,16}$/]');
    if ($this->form_validation->run() == FALSE) {
      $this->load->sign_up('admin/index');
    } else {
      $post = $this->input->post();
      $userData = array(
        'emailId' => $post['emailId'],
        'password' => base64_encode($post['password']),
        'status' => '1'
      );
      $insertData = $this->gm->fetch_single_data('admin', $userData);
      if (!empty($insertData)) {
        $rememberMe = isset($post['remember']) ? $post['remember'] : "";
        if (!empty($rememberMe)) {
          $this->load->helper('cookie');
          setcookie("rememberme[email]", $post['emailId']);
          setcookie("rememberme[password]", $post['password']);
        }
        $this->session->set_userdata('admin_id', $insertData['admin_id']);
        return redirect('admin-dashboard');
      } else {
        $this->session->set_flashdata('LoginFailed', '<strong>Oh snap!</strong> 👎 Invalid Login Details. Please Enter Valid Credential.');
        return redirect('login');
      }
    }
  }

  public function forgotPassword()
  {
    if ($this->input->method(false) == 'post') {
      $this->form_validation->set_rules(
        'emailId',
        'Admin email',
        'required|valid_email'
      );
      if ($this->form_validation->run() == FALSE) {
        $this->load->sign_up('admin/forgotPassword');
      } else {
        $post = $this->input->post();
        $adminData = $this->gm->fetch_single_data('admin', array('emailId' => $post['emailId']));
        if (!empty($adminData)) {
        } else {
          $this->session->set_flashdata('emailNotFound', '<strong>Oh snap!</strong> 👎 Email Not Found. Please Enter Valid Email Id.');
          $this->load->sign_up('admin/forgotPassword');
        }
      }
    } else {
      $this->load->sign_up('admin/forgotPassword');
    }
  }
  public function resetPassword()
  {
    if ($this->input->method(false) == 'post') {
      $this->form_validation->set_rules('password', 'Password', 'required|max_length[16]|min_length[5]|regex_match[/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.* ).{5,16}$/]');
      $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'required|max_length[16]|min_length[5]|regex_match[/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.* ).{5,16}$/]|matches[password]');
      if ($this->form_validation->run() == FALSE) {

        $this->load->sign_up('admin/passwordUpdate');
      } else {
        // need to check email exits in database or not id exits the send rest password form else send error
        $post = $this->input->post();
        print_r($post);
      }
    } else {
      $this->load->sign_up('admin/passwordUpdate');
    }
  }
  public function adminLogout()
  {
    $this->session->sess_destroy();
    return redirect('login');
  }
}
