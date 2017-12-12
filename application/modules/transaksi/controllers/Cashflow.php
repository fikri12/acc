<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| DEVELOPER 	: IYAN ISYANTO
| EMAIL			: POSDARING@GMAIL.COM
|--------------------------------------------------------------------------
|
*/

class Cashflow extends Admin {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Cashflow_model','model');
	}

	public function index() {
		$data['error'] 				= '';
		$data['title'] 				= 'Cashflow';
		$data['content'] 			= 'cashflow/index';
		$data['breadcrum'] 			= array(array(config('instansi'),'dashboard'),
												array("Cashflow", 'cashflow'),
										);
		$data 						= array_merge( $data, backend_info() );
		$this->parser->parse( 'default/template', $data );
	}

    function ajax_list(){
        $this->load->library('Datatables');
        $this->datatables->select('no, tanggal,debet,kredit,posisi,keterangan');
        $this->datatables->add_column('option', '', 'no');
        $this->datatables->where('staktif',1);
        $this->datatables->from('tcashflow');
        return print_r($this->datatables->generate());
    }

    public function create(){
        $data = array(
                'id'                	=> '',
                'no'               		=> get_kode('CF'.date('ymd'),'no','tcashflow',3),
                'tanggal'               => date("Y-m-d"),
                'debet'                 => 0,
                'kredit'                => 0,
                'posisi'               	=> 0,
                'keterangan'   			=> '',
                );
        $data['error']          = '';
        $data['title']          = 'Tambah Data';
        $data['content']       	= 'cashflow/manage';
        $data['breadcrum']      = array(array(config('instansi'),'dashboard'),
                                        array("CashFlow",'cashflow'),
                                        array("Tambah Data",'')
                                    );
        $data                   = array_merge($data,backend_info());
        $this->parser->parse('default/template',$data);
    }

    public function save() {
        $this->form_validation->set_rules('no', '', 'trim|required');
        $this->form_validation->set_rules('tanggal', '', 'trim|required');
        $this->form_validation->set_rules('debet', '', 'trim|required');
        $this->form_validation->set_rules('kredit', '', 'trim|required');
        $this->form_validation->set_rules('posisi', '', 'trim|required');
        if($this->form_validation->run() == true) {
        	if($this->input->post('id') !== '') {
        		if($this->model->edit()) {
	                $this->session->set_flashdata('confirm',true);
	                $this->session->set_flashdata('message_flash','{updatesuccesmsg}');
	                redirect('transaksi/cashflow','location');
	            }
        	} else {        		
	            if($this->model->save()) {
	                $this->session->set_flashdata('confirm',true);
	                $this->session->set_flashdata('message_flash','{savesuccesmsg}');
	                redirect('transaksi/cashflow','location');
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
    		$data['title'] 				= 'Edit Cashflow';
    		$data['content'] 			= 'cashflow/manage';
    		$data['breadcrum'] 			= array(array(config('instansi'),'dashboard'),
    												array("Cashflow", 'cashflow'),
    										);
        } else {
            $data['error']              = validation_errors();
            $data['title']              = 'Tambah Cashflow';
            $data['content']            = 'cashflow/manage';
            $data['breadcrum']          = array(array(config('instansi'),'dashboard'),
                                                    array("Cashflow", 'cashflow'),
                                            );            
        }
        $data = array_merge($data,backend_info());
        $this->parser->parse('default/template',$data);        
    }

    // additional

    public function max_posisicashflow() {
        $query = $this->model->max_posisicashflow();
        $this->output->set_output($query);
    }

    public function sum_posisikas() {
        $query = $this->model->sum_posisikas();
        $this->output->set_output($query+$this->sum_posisicashflow());
    }

    private function sum_posisicashflow() {
        $query = $this->model->sum_posisicashflow();
        return $query;
    }
}

/* End of file Cashflow.php */
/* Location: ./application/modules/transaksi/controllers/Cashflow.php */