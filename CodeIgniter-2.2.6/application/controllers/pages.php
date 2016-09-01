<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

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
	
		$this->load->view('pages');
	}

	public function addToBlog()
	{


		

		if($this->input->post('submit') == true) {

			$data['blog_title'] = $this->input->post('blogTitle');
			$data['blog_detail'] = $this->input->post('blogDetail');
			$data['blog_category'] = $this->input->post('blogCategory');
			$data['blog_author'] = $this->input->post('blogAuthor');

			$filename = str_replace(" ", "", $data['blog_title']);
			$config['upload_path'] = './uploads/images/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_width']    = '2048';
			$config['max_height']   = '2048';
			$config['file_name'] = $filename;

			$this->load->library('upload', $config);

			echo "file uploading...";
			if($this->upload->do_upload('userfile')){
					echo "file upload Successfully";
			}
			else {
				$error = array('error' => $this->upload->display_errors());

				echo $this->upload->display_errors();
			}


			echo $this->session->userdata('blogger_id')."<br>";
			echo $data['blog_title'];
			echo $data['blog_detail'];
			$blogger_id = $this->session->userdata('blogger_id');

			$sql = "INSERT INTO `blog_master`(`blog_id`, `blogger_id`, `blog_title`, `blog_desc`, `blog_category`, `blog_author`, `blog_is_active`, `creation_date`, `update_date`) VALUES ('',".$this->db->escape($blogger_id).",".$this->db->escape($data['blog_title']).",".$this->db->escape($data['blog_detail']).",".$this->db->escape($data['blog_category']).",".$this->db->escape($data['blog_author']).",0,".date("Y/m/d").",".date("Y/m/d").")";
			$query = $this->db->query($sql);
		}
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */