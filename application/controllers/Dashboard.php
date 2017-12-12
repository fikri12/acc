<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| DEVELOPER 	: IYAN ISYANTO
| EMAIL			: POSDARING@GMAIL.COM
|--------------------------------------------------------------------------
|
*/

class Dashboard extends Admin {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index() {
		$data['error'] 				= '';
		$data['title'] 				= 'Dashboard';
		$data['content'] 			= 'dashboard';
		$data['breadcrum'] 			= array(array(config('instansi'),'dashboard'),
										);
		$data 						= array_merge( $data, backend_info() );
		$this->parser->parse( 'default/template', $data );
	}
}