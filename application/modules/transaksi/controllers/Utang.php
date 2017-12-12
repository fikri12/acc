<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| DEVELOPER 	: IYAN ISYANTO
| EMAIL			: POSDARING@GMAIL.COM
|--------------------------------------------------------------------------
|
*/

class Utang extends Admin {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Utang_model','model');
	}

	public function index() {
		$data['error'] 				= '';
		$data['title'] 				= 'Utang';
		$data['content'] 			= 'utang/index';
		$data['breadcrum'] 			= array(array(config('instansi'),'dashboard'),
												array("List Utang", 'utang'),
										);
		$data 						= array_merge( $data, backend_info() );
		$this->parser->parse( 'default/template', $data );
	}

	public function ajax_list(){
        $this->load->library('Datatables');
        $this->datatables->select('mproyek.nama,tutang.no, tanggal,proyek,progres,dibayar,terbayar,sisautang,tutang.keterangan');
        $this->datatables->add_column('option', '', 'no');
        $this->datatables->join('mproyek','mproyek.no = tutang.proyek','left');
        $this->datatables->from('tutang');
        return print_r($this->datatables->generate());
    }

    public function create(){
        $data = array(
                'id'                	=> '',
                'no'               		=> get_kode('U'.date('ymd'),'no','tutang',3),
                'tanggal'               => date("Y-m-d"),
                'proyek'                => '',
                'progres'             	=> '',
                'dibayar'             	=> '',
                'terbayar'   			=> '',
                'sisautang'   			=> '',
                'keterangan'   			=> '',
                );
        $data['error']          = '';
        $data['title']          = 'Tambah Utang';
        $data['content']       	= 'utang/manage';
        $data['breadcrum']      = array(array(config('instansi'),'dashboard'),
                                        array("Utang",'utang'),
                                        array("Tambah Utang",'')
                                    );
        $data                   = array_merge($data,backend_info());
        $this->parser->parse('default/template',$data);
    }

    public function edit($id){
        if($id) {
            $row = $this->model->by_id($id);
            if($row) {
                $data = array(
			                'id'                	=> $row->no,
			                'no'               		=> $row->no,
			                'tanggal'               => $row->tanggal,
			                'proyek'                => $row->proyek,
			                'progres'             	=> $row->progres,
			                'dibayar'             	=> $row->dibayar,
			                'terbayar'   			=> $row->terbayar,
			                'sisautang'   			=> $row->sisautang,
			                'keterangan'   			=> $row->keterangan,
                        );
                $data['error']          = '';
                $data['title']          = 'Edit Utang';
                $data['content']       	= 'utang/manage';
                $data['breadcrum']      = array(array(config('instansi'),'dashboard'),
                                                array("Utang",'utang'),
                                                array("Edit Utang",'')
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
        $this->form_validation->set_rules('tanggal', '', 'trim|required');
        $this->form_validation->set_rules('proyek', '', 'trim|required');
        $this->form_validation->set_rules('progres', '', 'trim|required');
        $this->form_validation->set_rules('dibayar', '', 'trim|required');
        $this->form_validation->set_rules('terbayar', '', 'trim|required');
        $this->form_validation->set_rules('sisautang', '', 'trim|required');
        if($this->form_validation->run() == true) {
        	if($this->input->post('id') !== '') {
        		if($this->model->edit()) {
	                $this->session->set_flashdata('confirm',true);
	                $this->session->set_flashdata('message_flash','{updatesuccesmsg}');
	                redirect('transaksi/utang','location');
	            }
        	} else {        		
	            if($this->model->save()) {
	                $this->session->set_flashdata('confirm',true);
	                $this->session->set_flashdata('message_flash','{savesuccesmsg}');
	                redirect('transaksi/utang','location');
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
    		$data['title'] 				= 'Edit Utang';
    		$data['content'] 			= 'utang/manage';
    		$data['breadcrum'] 			= array(array(config('instansi'),'dashboard'),
    												array("Utang", 'utang'),
    										);
        } else {
            $data['error']              = validation_errors();
            $data['title']              = 'Tambah Utang';
            $data['content']            = 'utang/manage';
            $data['breadcrum']          = array(array(config('instansi'),'dashboard'),
                                                    array("Utang", 'utang'),
                                            );            
        }
        $data = array_merge($data,backend_info());
        $this->parser->parse('default/template',$data);        
    }

    // additional
    public function total_saldo($noproyek) {
        $row = $this->model->total_saldo($noproyek);
        $data['utang']      = $row->utang;
        $data['sisautang']  = $row->sisautang;
        $data['terbayar']   = $row->terbayar;
        $data['progres']    = $row->progres;
        $this->output->set_output(json_encode($data));
    }
}

/* End of file Utang.php */
/* Location: ./application/modules/transaksi/controllers/Utang.php */