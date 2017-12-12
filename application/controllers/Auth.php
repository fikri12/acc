<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('auth_model','model');
	}

	public function index() {
		$data['error'] 				= '';
		$data['title'] 				= 'Login';
		$data 						= array_merge( $data, backend_info() );
		$this->parser->parse( 'auth/index', $data );
	}

	public function aksi() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->model->login($username,$password);
	}

	public function logout() {
		$this->session->sess_destroy();
		$this->session->set_flashdata('success_logout', 'Anda berhasil keluar.');
		redirect('auth','refresh');
	}

}
