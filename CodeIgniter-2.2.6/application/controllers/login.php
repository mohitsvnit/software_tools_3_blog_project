<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */



	public function index()
	{
		$this->load->helper('form');
	
		$this->load->view('login');
	}

	public function userLogin()
	{
		if($this->input->post('submit') == true) {

			$data['username'] = $this->input->post('username');
			$data['password'] = $this->input->post('password');

			$query = $this->db->query("SELECT * FROM `blogger_info` WHERE blogger_username = '".$data['username']."' limit 1");

			$row = $query->row();
			//echo $row->blogger_username;

			if($query->num_rows() > 0) {
				if($data['password'] == $row->blogger_password) {

					echo "Successfully Login";
					$this->session->set_userdata(array(
							'blogger_id' => $row->blogger_id
						));

					echo $this->session->userdata('blogger_id');
				}
			}
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */