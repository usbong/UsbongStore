<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class browse extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function search()//$param)
	{
		$this->load->view('templates/style');
		$this->load->view('templates/header');
		//--------------------------------------------
		
		$this->load->model('Search_Model');
		$data['result'] = $this->Search_Model->getSearchResult($this->input->get('param'));//$param);
		$this->load->view('browse',$data);
		
		//--------------------------------------------
		$this->load->view('templates/footer');	
	}
}
