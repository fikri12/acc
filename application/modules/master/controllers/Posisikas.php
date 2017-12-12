<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Posisikas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Posisikas_model','model');
	}

	public function index() {
		$data['error'] 				= '';
		$data['title'] 				= 'Posisi';
		$data['content'] 			= 'posisikas/index';
		$data['breadcrum'] 			= array(array(config('instansi'),'dashboard'),
												array("Posisi Kas", 'posisikas'),
										);
		$data 						= array_merge( $data, backend_info() );
		$this->parser->parse( 'default/template', $data );
	}

	public function ajax_list(){
        $this->load->library('Datatables');
        $this->datatables->select('a.no, a.tanggal,a.nominal');
        $this->datatables->add_column('option', '', 'no');
        $this->datatables->from('mposisikas a');
        return print_r($this->datatables->generate());
    }

    public function create(){
        $data = array(
                'id'                => '',
                'no'               	=> get_kode('PK'.date('ymd'),'no','mposisikas',3),
                'tanggal'           => date('Y-m-d'),
                'nominal'           => '',
                );
        $data['error']          = '';
        $data['title']          = 'Tambah Data';
        $data['content']       	= 'posisikas/manage';
        $data['breadcrum']      = array(array(config('instansi'),'dashboard'),
                                        array("Posisi Kas",'posisikas'),
                                        array("Tambah Data",'')
                                    );
        $data                   = array_merge($data,backend_info());
        $this->parser->parse('default/template',$data);
    }

    public function save() {
        $this->form_validation->set_rules('no', '', 'trim|required');
        $this->form_validation->set_rules('tanggal', '', 'trim|required');
        $this->form_validation->set_rules('nominal', '', 'trim|required');
        if($this->form_validation->run() == true) {
        	if($this->input->post('id') !== '') {
        		if($this->model->edit()) {
	                $this->session->set_flashdata('confirm',true);
	                $this->session->set_flashdata('message_flash','{updatesuccesmsg}');
	                redirect('master/posisikas','location');
	            }
        	} else {        		
	            if($this->model->save()) {
	                $this->session->set_flashdata('confirm',true);
	                $this->session->set_flashdata('message_flash','{savesuccesmsg}');
	                redirect('master/posisikas','location');
	            }
        	}
        } else {
            $this->failed_save($this->input->post('id'));
        }
    }

    public function failed_save($id){
        $data = $this->input->post();
        if($id !== '') {            
            $data['error']          	= validation_errors();
    		$data['title'] 				= 'Edit Posisi Kas';
    		$data['content'] 			= 'posisikas/manage';
    		$data['breadcrum'] 			= array(array(config('instansi'),'dashboard'),
    												array("Posisi Kas", 'posisikas'),
    										);
        } else {
            $data['error']              = validation_errors();
            $data['title']              = 'Tambah Posisi Kas';
            $data['content']            = 'posisikas/manage';
            $data['breadcrum']          = array(array(config('instansi'),'dashboard'),
                                                    array("Posisi Kas", 'posisikas'),
                                            );            
        }
        $data = array_merge($data,backend_info());
        $this->parser->parse('default/template',$data);        
    }

}

/* End of file Posisikas.php */
/* Location: ./application/modules/master/controllers/Posisikas.php */