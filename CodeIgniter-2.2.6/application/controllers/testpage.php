<?php
class Testpage extends CI_Controller {

	
	public function index()
	{
		$this->load->view('testpage');
	}

	public function getData()
	{
		//echo "Getting data...";
		//echo $this->input->post('submit');
		//echo $this->input->get('submit');

		//$this->load->database();
		
		if($this->input->post('submit') == true) {



			$data['username'] = $this->input->post('username');
			$data['password'] = $this->input->post('password');

			$query = $this->db->query("SELECT * FROM `blogger_info` WHERE blogger_username = '".$data['username']."' limit 1");

			$row = $query->row();
			//echo $row->blogger_username;

			if($query->num_rows() > 0) {
				if($data['password'] == $row->blogger_password) {
					echo "Successfully Login";
				}
			}

			//echo $query->num_rows()."<br>";
 			//echo $data['username'];
			//echo $data['password'];
			
			//$this->load->view('testpage');
		}
	}
}

?>
