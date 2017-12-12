<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| DEVELOPER 	: IYAN ISYANTO
| EMAIL			: POSDARING@GMAIL.COM
|--------------------------------------------------------------------------
|
*/

class Rekanan extends Admin {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Rekanan_model','model');
	}

	public function index() {
		$data['error'] 				= '';
		$data['title'] 				= 'Rekanan';
		$data['content'] 			= 'rekanan/index';
		$data['breadcrum'] 			= array(array(config('instansi'),'dashboard'),
												array("Rekanan", 'Rekanan'),
										);
		$data 						= array_merge( $data, backend_info() );
		$this->parser->parse( 'default/template', $data );
	}

    public function ajax_list(){
        $this->load->library('Datatables');
        $this->datatables->select('no, nama,alamat,kota,provinsi,telepon');
        $this->datatables->add_column('option', '', 'no');
        $this->datatables->where('staktif',1);
        $this->datatables->from('mrekanan');
        return print_r($this->datatables->generate());
    }

    public function create(){
        $data = array(
                'id'                => '',
                'no'               	=> get_kode('S','no','mrekanan',3),
                'nama'              => '',
                'alamat'            => '',
                'kota'              => '',
                'provinsi'          => '',
                'telepon'   		=> '',
                );
        $data['error']          = '';
        $data['title']          = 'Tambah Data';
        $data['content']       	= 'rekanan/manage';
        $data['breadcrum']      = array(array(config('instansi'),'dashboard'),
                                        array("Rekanan",'Rekanan'),
                                        array("Tambah Data",'')
                                    );
        $data                   = array_merge($data,backend_info());
        $this->parser->parse('default/template',$data);
    }

    public function edit($id){
        if($id) {
            $row = $this->model->by_id($id);
            if($row) {
                $data = array(
                        'id'                => $row->no,
                        'no'                => $row->no,
                        'nama'              => $row->nama,
                        'alamat'            => $row->alamat,
                        'kota'              => $row->kota,
                        'provinsi'          => $row->provinsi,
                        'telepon'           => $row->telepon,
                        );
                $data['error']          = '';
                $data['title']          = 'Edit Rekanan';
                $data['content']       	= 'rekanan/manage';
                $data['breadcrum']      = array(array(config('instansi'),'dashboard'),
                                                array("Rekanan",'Rekanan'),
                                                array("Edit Rekanan",'')
                                            );
                $data                   = array_merge($data,backend_info());
                $this->parser->parse('default/template',$data);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }

    public function save() {
        $this->form_validation->set_rules('no', '', 'trim|required');
        $this->form_validation->set_rules('nama', '', 'trim|required');
        $this->form_validation->set_rules('alamat', '', 'trim|required');
        $this->form_validation->set_rules('kota', '', 'trim|required');
        $this->form_validation->set_rules('provinsi', '', 'trim|required');
        $this->form_validation->set_rules('telepon', '', 'trim|required');
        if($this->form_validation->run() == true) {
        	if($this->input->post('id') !== '') {
        		if($this->model->edit()) {
	                $this->session->set_flashdata('confirm',true);
	                $this->session->set_flashdata('message_flash','{updatesuccesmsg}');
	                redirect('master/Rekanan','location');
	            }
        	} else {        		
	            if($this->model->save()) {
	                $this->session->set_flashdata('confirm',true);
	                $this->session->set_flashdata('message_flash','{savesuccesmsg}');
	                redirect('master/Rekanan','location');
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
    		$data['title'] 				= 'Edit Rekanan';
    		$data['content'] 			= 'rekanan/manage';
    		$data['breadcrum'] 			= array(array(config('instansi'),'dashboard'),
    												array("Rekanan", 'Rekanan'),
    										);
        } else {
            $data['error']              = validation_errors();
            $data['title']              = 'Tambah Rekanan';
            $data['content']            = 'rekanan/manage';
            $data['breadcrum']          = array(array(config('instansi'),'dashboard'),
                                                    array("Rekanan", 'Rekanan'),
                                            );            
        }
        $data = array_merge($data,backend_info());
        $this->parser->parse('default/template',$data);        
    }

    public function delete($id) {
        if($id) {
            if($this->model->delete($id)) {
                $this->session->set_flashdata('confirm',true);
                $this->session->set_flashdata('message_flash','{deletesuccesmsg}');
                redirect('master/Rekanan','location');
            }            
        } else {
            show_404();
        }
    }
}

/* End of file Cashflow.php */
/* Location: ./application/modules/transaksi/controllers/Cashflow.php */