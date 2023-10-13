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
		$this->session->set_userdata('userName', $adminData['userName']);
		$this->session->set_userdata('profileImg', $adminData['profileImg']);
		$this->load->template_admin('dashboard');
	}
	public function contactSetup()
	{
		$contactDetails = $this->gm->fetch_single_data('contactdetails', array());
		if ($this->input->method(false) == 'post') {
			$config = array(
				array(
					'field' => 'companyEmail',
					'label' => 'Company Email Id',
					'rules' => 'required|valid_email'
				),
				array(
					'field' => 'helpLineEmail',
					'label' => 'HelpLine Email Id',
					'rules' => 'required|valid_email'
				),
				array(
					'field' => 'companyContact',
					'label' => 'Company Contact Number',
					'rules' => 'required|min_length[10]|numeric'
				),
				array(
					'field' => 'helplineContact',
					'label' => 'HelpLine Contact Number',
					'rules' => 'required|min_length[10]|numeric'
				)
			);
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == FALSE) {
				$this->load->template_admin('websiteSetup');
			} else {
				$post = $this->input->post();

				$fileName = str_replace(" ", "_", $_FILES['companyLogo']['name']);
				if ($_FILES['companyLogo']['name'] != '') {

					$config['upload_path'] = 'admin_assets/assets/images/';
					$config['file_name'] = $fileName;
					$config['allowed_types'] = 'jpg|jpeg|png';
					$this->load->library('upload');
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('companyLogo')) {
						$error = array('error' => $this->upload->display_errors());

						$this->load->template_admin('websiteSetup', $error);
					} else {
						$data = array('upload_data' => $this->upload->data());
						$post['companyLogo'] = $data['upload_data']['file_name'];
					}
				} else {
					$post['companyLogo'] = $contactDetails['companyLogo'];
				}
				$contactDetails = array(
					'helpLineEmail' => $post['helpLineEmail'],
					'companyEmail' => $post['companyEmail'],
					'companyContact' => $post['companyContact'],
					'helplineContact' => $post['helplineContact'],
					'companyAddress' => $post['companyAddress'],
					'mapLink' => $post['mapLink'],
					'facebookLink' => $post['facebookLink'],
					'instagramLink' => $post['instagramLink'],
					'twitterLink' => $post['twitterLink'],
					'twitterLink' => $post['twitterLink'],
					'youtubeLink' => $post['youtubeLink'],
					'companyLogo' => $post['companyLogo'],
				);
				$delete = $this->gm->delete_all_table_data('contactdetails',);
				$insertData = $this->gm->insert('contactdetails', $contactDetails);
				if (!empty($insertData)) {

					$this->session->set_flashdata('success', '<strong>Well Done...</strong> 👍 Data insert Successfully.');
					return redirect('contact-setup');
				} else {
					$this->session->set_flashdata('failed', '<strong>Oh snap!</strong> 👎 Something went wrong. Please try again');
					return redirect('contact-setup');
				}
			}
		} else {
			$this->load->template_admin('websiteSetup', compact('contactDetails'));
		}
	}
	public function termPolicySetup()
	{
		$this->load->template_admin('termPolicy');
	}

	public function destination()
	{
		$destinationDetails = $this->gm->fetch_data('destinationdetails', array());
		if ($this->input->method(false) == 'post') {
			$post = $this->input->post();

			$fileName = str_replace(" ", "_", $_FILES['destinationImage']['name']);
			if ($_FILES['destinationImage']['name'] != '') {

				$config['upload_path'] = 'admin_assets/assets/images/destination/';
				$config['file_name'] = $fileName;
				$config['allowed_types'] = 'jpg|jpeg|png';
				$this->load->library('upload');
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('destinationImage')) {
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('failed',  $error);
					return	redirect('destination-setup');
				} else {
					$data = array('upload_data' => $this->upload->data());
					$post['destinationImage'] = $data['upload_data']['file_name'];
				}
			} else {
				$post['destinationImage'] = $destinationDetails['destinationImage'];
			}
			$destinationData = array(
				'destinationName' => $post['destination'],
				'packageName' => $post['package'],
				'topDestination' => $post['topDestination'],
				'status' => $post['status'],
				'images' => $post['destinationImage'],
			);
			$insertData = $this->gm->insert('destinationdetails', $destinationData);
			if (!empty($insertData)) {

				$this->session->set_flashdata('success', '<strong>Well Done...</strong> 👍 Data insert Successfully.');
				return redirect('destination-setup');
			} else {
				$this->session->set_flashdata('failed', '<strong>Oh snap!</strong> 👎 Something went wrong. Please try again');
				return redirect('destination-setup');
			}
		} else {
			$this->load->template_admin('destination', compact('destinationDetails'));
		}
	}

	public function destinationDelete()
	{
		$destinationId = $this->uri->segment(2);
		$delete = $this->gm->delete_data('destinationdetails', array('condition' => array('destinationId' => $destinationId)));
		if (!empty($delete)) {

			$this->session->set_flashdata('success', '<strong>Well Done...</strong> 👍 Data Deleted Successfully.');
			return redirect('destination-setup');
		} else {
			$this->session->set_flashdata('failed', '<strong>Oh snap!</strong> 👎 Something went wrong. Please try again');
			return redirect('destination-setup');
		}
	}
	public function destinationEditAction()
	{
		$post = $this->input->post();
		if ($_FILES['destinationImage']['name'] != '') {
			$fileName = str_replace(" ", "_", $_FILES['destinationImage']['name']);
			$config['upload_path'] = 'admin_assets/assets/images/destination/';
			$config['file_name'] = $fileName;
			$config['allowed_types'] = 'jpg|jpeg|png';
			$this->load->library('upload');
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('destinationImage')) {
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('failed',  $error);
				return	redirect('destination-setup');
			} else {
				$data = array('upload_data' => $this->upload->data());
				$post['destinationImage'] = $data['upload_data']['file_name'];
			}
		} else {
			$post['destinationImage'] = $post['images'];
		}
		$destinationData = array(
			'destinationName' => $post['destination'],
			'packageName' => $post['package'],
			'topDestination' => $post['topDestination'] == "Yes" ? 1 : 0,
			'status' => $post['status'] == "Active" ? 1 : 0,
			'images' => $post['destinationImage'],
		);

		$updateData = $this->gm->update('destinationdetails', $destinationData, array('destinationId' => $post['destinationId']));
		if (!empty($updateData)) {

			$this->session->set_flashdata('success', '<strong>Well Done...</strong> 👍 Data Updated Successfully.');
			return redirect('destination-setup');
		} else {
			$this->session->set_flashdata('failed', '<strong>Oh snap!</strong> 👎 Something went wrong. Please try again');
			return redirect('destination-setup');
		}
	}
	public function destinationEdit()
	{
		$destinationId = $this->input->get('id');
		$result['destination'] = $this->gm->fetch_single_data('destinationdetails', array('destinationId' => $destinationId));
		if (!empty($result) && sizeof($result) > 0) {
			foreach ($result as $key => $value) {
				$documentDetail['data'][] = array(
					'destinationId' =>  $value['destinationId'],
					'destinationName' => $value['destinationName'],
					'packageName' => $value['packageName'],
					'topDestination' => $value['topDestination'],
					'images' => $value['images'],
				);
			}
		} else {
			$documentDetail['data'][] = null;
		}
		echo json_encode($documentDetail);
	}
	public function sliderSetup()
	{
		$slidersDetails = $this->gm->fetch_data('sliders', array());
		if ($this->input->method(false) == 'post') {
			$post = $this->input->post();

			$fileName = str_replace(" ", "_", $_FILES['slidersImages']['name']);
			if ($_FILES['slidersImages']['name'] != '') {

				$config['upload_path'] = 'admin_assets/assets/images/sliders/';
				$config['file_name'] = $fileName;
				$config['allowed_types'] = 'jpg|jpeg|png';
				$this->load->library('upload');
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('slidersImages')) {
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('failed',  $error);
					return	redirect('slider-setup');
				} else {
					$data = array('upload_data' => $this->upload->data());
					$post['slidersImages'] = $data['upload_data']['file_name'];
				}
			} else {
				$post['slidersImages'] = $slidersDetails['slidersImages'];
			}
			$slidersData = array(
				'heading' => $post['heading'],
				'subHeading' => $post['subHeading'],
				'images' => $post['slidersImages'],
				'status' => $post['status'],
			);
			$insertData = $this->gm->insert('sliders', $slidersData);
			if (!empty($insertData)) {

				$this->session->set_flashdata('success', '<strong>Well Done...</strong> 👍 Data insert Successfully.');
				return redirect('slider-setup');
			} else {
				$this->session->set_flashdata('failed', '<strong>Oh snap!</strong> 👎 Something went wrong. Please try again');
				return redirect('slider-setup');
			}
		} else {
			$this->load->template_admin('slider', compact('slidersDetails'));
		}
	}
	public function slidersDelete()
	{
		$sliderId = $this->uri->segment(2);
		$delete = $this->gm->delete_data('sliders', array('condition' => array('sliderId' => $sliderId)));
		if (!empty($delete)) {

			$this->session->set_flashdata('success', '<strong>Well Done...</strong> 👍 Data Deleted Successfully.');
			return redirect('slider-setup');
		} else {
			$this->session->set_flashdata('failed', '<strong>Oh snap!</strong> 👎 Something went wrong. Please try again');
			return redirect('slider-setup');
		}
	}
	public function sliderEdit()
	{
		$sliderId = $this->input->get('id');
		$result['slider'] = $this->gm->fetch_single_data('sliders', array('sliderId' => $sliderId));
		if (!empty($result) && sizeof($result) > 0) {
			foreach ($result as $key => $value) {
				$documentDetail['data'][] = array(
					'sliderId' =>  $value['sliderId'],
					'heading' => $value['heading'],
					'subHeading' => $value['subHeading'],
					'images' => $value['images'],
					'status' => $value['status'],
				);
			}
		} else {
			$documentDetail['data'][] = null;
		}
		echo json_encode($documentDetail);
	}

	public function sliderEditAction()
	{
		$post = $this->input->post();

		if ($_FILES['sliderImage']['name'] != '') {
			$fileName = str_replace(" ", "_", $_FILES['sliderImage']['name']);
			$config['upload_path'] = 'admin_assets/assets/images/sliders/';
			$config['file_name'] = $fileName;
			$config['allowed_types'] = 'jpg|jpeg|png';
			$this->load->library('upload');
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('sliderImage')) {
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('failed',  $error);
				return	redirect('slider-setup');
			} else {
				$data = array('upload_data' => $this->upload->data());
				$post['sliderImage'] = $data['upload_data']['file_name'];
			}
		} else {
			$post['sliderImage'] = $post['images'];
		}
		$destinationData = array(
			'heading' => $post['heading'],
			'subHeading' => $post['subHeading'],
			'status' => $post['status'] == "Active" ? 1 : 0,
			'images' => $post['sliderImage'],
		);

		$updateData = $this->gm->update('sliders', $destinationData, array('sliderId' => $post['sliderId']));
		if (!empty($updateData)) {

			$this->session->set_flashdata('success', '<strong>Well Done...</strong> 👍 Data Updated Successfully.');
			return redirect('slider-setup');
		} else {
			$this->session->set_flashdata('failed', '<strong>Oh snap!</strong> 👎 Something went wrong. Please try again');
			return redirect('slider-setup');
		}
	}
}
