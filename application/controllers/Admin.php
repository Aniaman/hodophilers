<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('General_model', 'gm');
		$this->load->model('Admin_model', 'am');
		$this->load->library('session');
		if ($this->session->admin_id == "") {
			return redirect('Login');
		}
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
		$destinationId = urldecode(base64_decode($this->uri->segment(2)));

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
	public function packages()
	{
		$tours['package'] = $this->am->tourPackages();
		$this->load->template_admin('packages', $tours);
	}
	public function packagesAdd()
	{
		$destination  =  $this->gm->fetch_data('destinationdetails', array('status' => 1));
		$this->load->template_admin('packageAdd', compact('destination'));
	}

	public function packageGenerate()
	{
		//print_r($name_array);

		$configure = array(
			array(
				'field' => 'packageTitle',
				'label' => 'Package Title',
				'rules' => 'required'
			),
			array(
				'field' => 'price',
				'label' => 'Package Cost',
				'rules' => 'required|numeric'
			),
			array(
				'field' => 'discount',
				'label' => 'Package Discount',
				'rules' => 'required|numeric'
			),
		);
		$this->form_validation->set_rules($configure);
		if ($this->form_validation->run() == FALSE) {
			return redirect('packages');
		} else {
			$post = $this->input->post();
			$fileName = str_replace("-", "_", $_FILES['packageMainImage']['name']);
			// Add Main Image to $post
			$config['upload_path'] = 'admin_assets/assets/images/packageMainImage';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['file_name'] = $fileName;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->do_upload('packageMainImage');
			$data = array('upload_data' => $this->upload->data());
			$post['packageMainImage'] = $data['upload_data']['file_name'];


			$name_array = array();
			if (!empty($_FILES['packageGallery']['name'])) {
				$filesCount = count($_FILES['packageGallery']['name']);
				for ($i = 0; $i < $filesCount; $i++) {
					$fileName = str_replace("-", "_", $_FILES['packageGallery']['name'][$i]);
					$_FILES['imgs']['name'] = $_FILES['packageGallery']['name'][$i];
					$_FILES['imgs']['type'] = $_FILES['packageGallery']['type'][$i];
					$_FILES['imgs']['tmp_name'] = $_FILES['packageGallery']['tmp_name'][$i];
					$_FILES['imgs']['error'] = $_FILES['packageGallery']['error'][$i];
					$_FILES['imgs']['size'] = $_FILES['packageGallery']['size'][$i];
					$uploadPath = 'admin_assets/assets/images/gallery';
					$config['upload_path'] = $uploadPath;
					$config['allowed_types'] = 'jpg|png|jpeg';

					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if ($this->upload->do_upload('imgs')) {
						$data = $this->upload->data();
						$name_array[] = $data['file_name'];
					}
				}
			}
			for ($i = 0; $i < sizeof($post['vehicle']); $i++) {
				$vehicle[$i] = $post['vehicle'][$i] . ":" . $post['vehicleCost'][$i];
			}
			$post['vehicles'] = implode(",", $vehicle);
			$post['imageGallery'] = implode(",", $name_array);
			$tourData = array(
				'packageId' => $post['packageId'],
				'packageTitle' => $post['packageTitle'],
				'destination' => $post['destination'],
				'packageShortDescription' => $post['packageShortDescription'],
				'packageDescription' => $post['packageDescription'],
				'price' => $post['price'],
				'discount' => $post['discount'],
				'popularDestination' => $post['popularDestination'],
				'status' => $post['status'],
				'itineraryTitle' => $post['itineraryTitle'],
				'packageMainImage' => $post['packageMainImage'],
				'imageGallery' => $post['imageGallery'],
				'vehicles' => $post['vehicles'],
			);

			$insertData = $this->gm->insert('tour_package', $tourData);
			if (!empty($insertData)) {
				$this->session->set_flashdata('success', '<strong>Well Done...</strong> 👍 Data Updated Successfully.');
				return redirect('packages');
			} else {
				$this->session->set_flashdata('failed', '<strong>Oh snap!</strong> 👎 Something went wrong. Please try again');
				return redirect('packages');
			}
		}
	}
	public function fetchDestinationData()
	{
		$destination  =  $this->gm->fetch_data('destinationdetails', array('status' => 1));
		if (!empty($destination) && sizeof($destination) > 0) {
			foreach ($destination as $key => $value) {
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

	public function hotel()
	{
		$data['hotelData'] = $this->gm->fetch_data('hotel_data', array('status' => 1));
		$this->load->template_admin('packageElement', $data);
	}
	public function hotelSetup()
	{
		$configure = array(
			array(
				'field' => 'hotelTitle',
				'label' => 'Hotel  Title',
				'rules' => 'required'
			),
			array(
				'field' => 'hotelType',
				'label' => 'Hotel Type',
				'rules' => 'required'
			)
		);
		$this->form_validation->set_rules($configure);
		if ($this->form_validation->run() == FALSE) {
			return redirect('hotel');
		} else {
			$post = $this->input->post();
			$hotelData = array(
				'hotelTitle' => $post['hotelTitle'],
				'hotelType' => $post['hotelType'],
				'roomCategory' => $post['roomCategory'],
				'status' => $post['status'],
			);
			$insert = $this->gm->insert('hotel_data', $hotelData);
			if (!empty($insert)) {

				$this->session->set_flashdata('hotelSuccess', '<strong>Well Done...</strong> 👍 Data Updated Successfully.');
				return redirect('hotel');
			} else {
				$this->session->set_flashdata('hotelFailed', '<strong>Oh snap!</strong> 👎 Something went wrong. Please try again');
				return redirect('hotel');
			}
		}
	}

	public function tourItinerary()
	{
		$tourItinerary['tour'] = $this->gm->itineraryWithDestination('', array('a.status' => 1));
		$this->load->template_admin('tourItinerary', $tourItinerary);
	}
	public function tourItinerarySetup()
	{
		$hotel  =  $this->gm->fetch_data('hotel_data', array('status' => 1));
		$destination  =  $this->gm->fetch_data('destinationdetails', array('status' => 1));
		$this->load->template_admin('tourItineraryGenerate', compact('destination', 'hotel'));
	}

	public function getRoomTypeData()
	{
		$hotelId = $this->input->get('hotelId');
		$hotel  =  $this->gm->fetch_single_data('hotel_data', array('hotelType' => $hotelId));
		$room = explode(',', $hotel['roomCategory']);

		foreach ($room as $key => $value) {
			$roomType['room'][$key] = $value;
		}
		echo json_encode($roomType);
	}
	public function packageGenerateAction()
	{
		$post = $this->input->post();
		for ($j = 0; $j < sizeof($post['dayTitle']); $j++) {
			$program[$j] = $post['dayTitle'][$j] . ":" . $post['dayDescription'][$j];
		}
		$itinerary = implode(',', $program);

		for ($i = 0; $i < sizeof($post['hotelCategory']); $i++) {
			$hotelData[$i] = $post['hotelCategory'][$i] . ":" . $post['roomType'][$i] . ":" . $post['hotelCost'][$i];
		}
		$hotel = implode(',', $hotelData);
		$itineraryData = array(
			'itinerary_id' => $post['itineraryId'],
			'itineraryTitle' => $post['itineraryName'],
			'destination' => $post['destination'],
			'days' => $post['days'],
			'nights' => $post['nights'],
			'itineraryDetails' => $itinerary,
			'hotelDetails' => $hotel,
			'status' => 1,
		);
		$insert = $this->gm->insert('itinerary', $itineraryData);
		if (!empty($insert)) {

			$this->session->set_flashdata('success', '<strong>Well Done...</strong> 👍 Data Updated Successfully.');
			return redirect('tour-itinerary');
		} else {
			$this->session->set_flashdata('failed', '<strong>Oh snap!</strong> 👎 Something went wrong. Please try again');
			return redirect('tour-itinerary');
		}
	}
	public function getItineraryByDestination()
	{
		$itineraryId = $this->input->get('id');
		$itinerary  =  $this->gm->fetch_data('itinerary', array('destination' => $itineraryId));
		if (!empty($itinerary) && sizeof($itinerary) > 0) {
			foreach ($itinerary as $key => $value) {
				$itineraryDetail['data'][] = array(
					'itinerary_id' =>  $value['itinerary_id'],
					'itineraryTitle' => $value['itineraryTitle'],
				);
			}
		} else {
			$itineraryDetail['data'][] = null;
		}
		echo json_encode($itineraryDetail);
	}
}
