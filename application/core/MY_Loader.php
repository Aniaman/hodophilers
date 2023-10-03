<?php defined('BASEPATH') or exit('No direct script access allowed');
class MY_Loader extends CI_Loader
{
	public function __construct()
	{
		parent::__construct();
		$this->ci = &get_instance();
	}

	public function frontend($view_page, $param = array(), $return_type = 1)
	{
		$content  = $this->ci->load->view('header.php', $param, TRUE);

		if ($this->uri->segment(1) == '') {
			$content  .= $this->ci->load->view('common/navigation.php', $param, TRUE);
		} else {

			$content  .= $this->ci->load->view('common/navigation_login.php', $param, TRUE);
		}

		$content .= $this->ci->load->view($view_page, $param, TRUE);

		$content  .= $this->ci->load->view('footer.php', $param, TRUE);

		if ($return_type) {
			echo $content;
		} else {
			return $content;
		}
	}

	public function sign_up($view_page, $param = array(), $return_type = 1)
	{
		$content  = $this->ci->load->view('admin/common/login_header.php', $param, TRUE);

		if ($this->uri->segment(1) == '') {
			$content  .= $this->ci->load->view('admin/common/navigation.php', $param, TRUE);
		} else {

			$content  .= $this->ci->load->view('admin/common/navigation_login.php', $param, TRUE);
		}

		$content .= $this->ci->load->view($view_page, $param, TRUE);

		$content  .= $this->ci->load->view('admin/common/login_footer.php', $param, TRUE);

		if ($return_type) {
			echo $content;
		} else {
			return $content;
		}
	}

	public function template_admin($view_page, $param = array(), $return_type = 1)
	{
		$content  = $this->ci->load->view('admin/adminCommon/header.php', $param, TRUE);

		$content  .= $this->ci->load->view('admin/adminCommon/navigation.php', $param, TRUE);

		$content .= $this->ci->load->view('admin/' . $view_page, $param, TRUE);

		$content  .= $this->ci->load->view('admin/adminCommon/footer.php', $param, TRUE);

		if ($return_type) {
			echo $content;
		} else {
			return $content;
		}
	}
}
