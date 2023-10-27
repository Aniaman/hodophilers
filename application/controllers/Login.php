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
  

  // User Login flow
  public function userLogin(){

    if($this->input->server('REQUEST_METHOD') === 'POST'){
      $this->form_validation->set_rules(
        'emailId',
        'Admin email',
        'required|valid_email'
      );
      $this->form_validation->set_rules('password', 'Password', 'required|max_length[16]|min_length[5]|regex_match[/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.* ).{5,16}$/]');
      if ($this->form_validation->run() == FALSE) {
        $this->load->sign_up('user/userLogin');
      } else {
        $post = $this->input->post();
        $userData = array(
          'user_email' => $post['emailId'],
          'user_password' => base64_encode($post['password']),
          'status' => '1'
        );
        $insertData = $this->gm->fetch_single_data('user_profile', $userData);
        if (!empty($insertData)) {
          $rememberMe = isset($post['remember']) ? $post['remember'] : "";
          if (!empty($rememberMe)) {
            $this->load->helper('cookie');
            setcookie("userRememberme[email]", $post['emailId']);
            setcookie("userRememberme[password]", $post['password']);
          }
          $this->session->set_userdata('user_id', $insertData['user_id']);
          return redirect('user-dashboard');
        } else {
          $this->session->set_flashdata('LoginFailed', '<strong>Oh snap!</strong> 👎 Invalid Login Details. Please Enter Valid Credential.');
          return redirect('user-login');
        }
      }

  }else{
    $this->load->sign_up('user/userLogin');
  }
}
  public function userRegister(){

    if($this->input->server('REQUEST_METHOD') === 'POST'){
      $config = array(
				array(
					'field' => 'fullName',
					'label' => 'User Full Name',
					'rules' => 'required'
				),
				array(
					'field' => 'emailId',
					'label' => 'Email ID',
					'rules' => 'required|valid_email|is_unique[user_profile.user_email]'
				),
				array(
					'field' => 'phone',
					'label' => 'Phone Number',
					'rules' => 'required|max_length[10]|numeric|is_unique[user_profile.user_phone]'
				),
				array(
					'field' => 'password',
					'label' => 'Password',
					'rules' => 'required|max_length[16]|min_length[5]|regex_match[/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.* ).{5,16}$/]'
				),
				array(
					'field' => 'confirmPassword',
					'label' => 'Confirm Password',
					'rules' => 'required|max_length[16]|min_length[5]|regex_match[/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.* ).{5,16}$/]|matches[password]'
				),
				
			);
      $this->form_validation->set_rules($config);
      if ($this->form_validation->run() == FALSE) {
        $this->load->sign_up('user/userRegister');
      } else {
        $userProfile = array(
          'user_id' => 'Hodo'.strtotime(date("Y-m-d H:i:s")),
          'user_name' => $this->input->post('fullName'),
          'user_email' => $this->input->post('emailId'),
          'user_phone' => $this->input->post('phone'),
          'user_password' => base64_encode($this->input->post('password')),
          'user_mail_verified' => 0,
          'status' => 1,
        );
      
      $insertData = $this->gm->insert('user_profile', $userProfile);
      if (!empty($insertData)) {
        $this->session->set_flashdata('success', '<strong>Greate!</strong> 👍 User Register Successfully.');
        return redirect('user-login');
      }else{
        $this->session->set_flashdata('error', '<strong>Oh snap!</strong> 👎 User Register Failed.');
        return redirect('user-sign-up');
      }
    }
  }else{
    $this->load->sign_up('user/userRegister');
  }
}
public function adminLogout()
  {
   $logoutRedirect =  !empty($this->session->admin_id) ?'admin-login' : 'user-login';
    $this->session->sess_destroy();
    return redirect($logoutRedirect);
  }
}
