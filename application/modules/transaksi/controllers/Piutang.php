<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| DEVELOPER 	: IYAN ISYANTO
| EMAIL			: POSDARING@GMAIL.COM
|--------------------------------------------------------------------------
|
*/

class Piutang extends Admin {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('piutang_model','model');
	}

	public function index() {
		$data['error'] 				= '';
		$data['title'] 				= 'Piutang';
		$data['content'] 			= 'piutang/index';
		$data['breadcrum'] 			= array(array(config('instansi'),'dashboard'),
												array("List piutang", 'piutang'),
										);
		$data 						= array_merge( $data, backend_info() );
		$this->parser->parse( 'default/template', $data );
	}

	public function ajax_list(){
        $this->load->library('Datatables');
        $this->datatables->select('b.nama,a.no, tanggal,proyek,progres,dibayar,terbayar,sisapiutang,a.keterangan');
        $this->datatables->add_column('option', '', 'a.no');
        $this->datatables->join('mproyek b','b.no = a.proyek','left');
        $this->datatables->where('b.tipe',2);
        $this->datatables->from('tpiutang a');
        return print_r($this->datatables->generate());
    }

    public function create(){
        $data = array(
                'id'                	=> '',
                'no'               		=> get_kode('P'.date('ymd'),'no','tpiutang',3),
                'tanggal'               => date("Y-m-d"),
                'proyek'                => '',
                'progres'             	=> '',
                'dibayar'             	=> '',
                'terbayar'   			=> '',
                'sisapiutang'   		=> '',
                'keterangan'   			=> '',
                );
        $data['error']          = '';
        $data['title']          = 'Tambah Piutang';
        $data['content']       	= 'piutang/manage';
        $data['breadcrum']      = array(array(config('instansi'),'dashboard'),
                                        array("Piutang",'piutang'),
                                        array("Tambah Piutang",'')
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
			                'sisapiutang'   		=> $row->sisapiutang,
			                'keterangan'   			=> $row->keterangan,
                        );
                $data['error']          = '';
                $data['title']          = 'Edit Piutang';
                $data['content']       	= 'piutang/manage';
                $data['breadcrum']      = array(array(config('instansi'),'dashboard'),
                                                array("Piutang",'piutang'),
                                                array("Edit Piutang",'')
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
        $this->form_validation->set_rules('sisapiutang', '', 'trim|required');
        if($this->form_validation->run() == true) {
        	if($this->input->post('id') !== '') {
        		if($this->model->edit()) {
	                $this->session->set_flashdata('confirm',true);
	                $this->session->set_flashdata('message_flash','{updatesuccesmsg}');
	                redirect('transaksi/piutang','location');
	            }
        	} else {        		
	            if($this->model->save()) {
	                $this->session->set_flashdata('confirm',true);
	                $this->session->set_flashdata('message_flash','{savesuccesmsg}');
	                redirect('transaksi/piutang','location');
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
    		$data['title'] 				= 'Edit Piutang';
    		$data['content'] 			= 'piutang/manage';
    		$data['breadcrum'] 			= array(array(config('instansi'),'dashboard'),
    												array("Piutang", 'piutang'),
    										);
        } else {
            $data['error']              = validation_errors();
            $data['title']              = 'Tambah Piutang';
            $data['content']            = 'piutang/manage';
            $data['breadcrum']          = array(array(config('instansi'),'dashboard'),
                                                    array("Piutang", 'piutang'),
                                            );            
        }
        $data = array_merge($data,backend_info());
        $this->parser->parse('default/template',$data);        
    }

    // additional
    public function total_saldo($noproyek) {
        $row = $this->model->total_saldo($noproyek);
        $data['piutang']      	= number_format($row->piutang);
        $data['sisapiutang']  	= number_format($row->sisapiutang);
        $data['terbayar']   	= number_format($row->terbayar);
        $data['progres']    	= $row->progres;
        $this->output->set_output(json_encode($data));
    }
}

/* End of file Piutang.php */
/* Location: ./application/modules/transaksi/controllers/Piutang.php */