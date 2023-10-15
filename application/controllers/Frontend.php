<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontend extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('General_model', 'gm');
    $this->load->library('session');
  }
  public function index()
  {
    $data['contactDetails'] = $this->gm->fetch_single_data('contactdetails', array());
    $data['slidersDetails'] = $this->gm->fetch_data('sliders', array('status' => 1));
    $data['destinationDetails'] = $this->gm->fetch_data('destinationdetails', array('status' => 1, 'topDestination' => 1), null, array(), array('0', '4'));

    $this->load->frontend('index', $data);
  }
}
