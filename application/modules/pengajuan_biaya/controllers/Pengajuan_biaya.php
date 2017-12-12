<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
|
|--------------------------------------------------------------------------
|
*/

class Pengajuan_biaya extends Admin {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index() {
		$data['error'] 				= '';
		$data['title'] 				= 'Pengajuan Biaya';
		$data['content'] 			= 'list';
		$data['breadcrum'] 			= array(array(config('home'),'pengajuan_biaya'),
										);
		$data 						= array_merge( $data, backend_info() );
		$this->parser->parse( 'default/template', $data );
	}

  public function ajax_list(){
        $this->load->library('Datatables');
        $this->datatables->select("a.id_pengajuan, DATE_FORMAT(a.date_add,'%d/%m/%Y') as date_add,a.no_pengajuan,a.perihal,a.nominal_biaya,a.position,a.action,a.last_position,a.last_action,c.nama as nama_akses,b.nama as nama_user");
        $this->datatables->add_column('status', '', 'no');
        $this->datatables->add_column('option', '', 'no');
        $this->datatables->join('xuser b','b.id = a.add_by');
        $this->datatables->join('xakses c','c.id = a.position','left');
        if($this->session->userdata('akses') == '2'){
          $this->datatables->where('a.add_by',$this->session->userdata('akses'));
        }/*elseif(intval($this->session->userdata('akses')) > 2 && intval($this->session->userdata('akses')) <= 6){
					$curr_position = intval($this->session->userdata('akses')) ;
					if($this->session->userdata('akses') == '6'){
						$this->datatables->where_in('a.position',array(5,6));
					}else{
						$this->datatables->where('a.position',$curr_position);
					}


        }*/
				if($this->session->userdata('akses') == '5'){
					$this->datatables->where('a.nominal_biaya < ','10000000');
				}

        $this->datatables->from('xpengajuan a');
        //$this->datatables->order_by('a.id_pengajuan','asc');
        return print_r($this->datatables->generate());
    }

  public function create(){
		$data = array(
						'id'                => '',
						'no'               	=> '',
						'perihal'          	=> 'Pengajuan Biaya',
						'lampiran'          => '',
						'date_add'          => date('Y/m/d'),
						'pelaksana'         => '',
						'tanggal'           => date('Y/m/d'),
						'nominal'           => '',
						'tujuan_penggunaan' => '',
						'keterangan'        => '',
						);
		$data['error']          = '';
		$data['title']          = 'Buat Pengajuan';
		$data['content']       	= 'pengajuan_biaya/add';
		$data['breadcrum']      = array(array(config('instansi'),'dashboard'),
																		array("Pengajuan_biaya",'Pengajuan_biaya'),
																		array("Buat Pengajuan",'')
																);
		$data                   = array_merge($data,backend_info());
		$this->parser->parse('default/template',$data);
  }

  public function save(){
		//$this->form_validation->set_rules('no', '', 'trim|required');
		$this->form_validation->set_rules('perihal', '', 'trim|required');
		$this->form_validation->set_rules('lampiran', '', 'trim|required');
		$this->form_validation->set_rules('tanggal', '', 'trim|required');
		$this->form_validation->set_rules('pelaksana', '', 'trim|required');
		$this->form_validation->set_rules('nominal', '', 'trim|required');
		$this->form_validation->set_rules('tujuan_penggunaan', '', 'trim|required');
		if($this->form_validation->run() == true) {
			if($this->input->post('id') !== '') {
				/* if($this->model->edit()) {
							$this->session->set_flashdata('confirm',true);
							$this->session->set_flashdata('message_flash','{updatesuccesmsg}');
							redirect('master/proyek','location');
					}*/
			} else {
					 $data = array(
						 'no_pengajuan' => '',
						 'lampiran'  		=> $this->input->post('lampiran'),
						 'perihal'  		=> 'Pengajuan Biaya',//$this->input->post('perihal'),
						 'pelaksana'  	=> $this->input->post('pelaksana'),
						 'tanggal_pelaksanaan'  => str_replace('/','-',$this->input->post('tanggal')),
						 'nominal_biaya'  			=> str_replace(',','',$this->input->post('nominal')),
						 'tujuan_penggunaan'  	=> $this->input->post('tujuan_penggunaan'),
						 'keterangan'  					=> $this->input->post('keterangan'),
						 'position'  						=> intval($this->session->userdata('akses')) + 1,
						 'add_by'  							=> $this->session->userdata('userid'),
					 );
				   $this->db->insert('xpengajuan',$data);
					 $insert_id = $this->db->insert_id();
					 if($insert_id > 0){
						 $data_log = array(
							 'id_pengajuan' 	=> $insert_id,
							 'from_position' 	=> 0,
							 'to_position' 		=> 0,
							 'action' 				=> 0,
							 'comment' 				=> 'Pengajuan Biaya dibuat',
							 'add_by' 				=> $this->session->userdata('userid'),
						 );
						 $this->db->insert('xpengajuan_log',$data_log);
						 $this->session->set_flashdata('confirm',true);
						 $this->session->set_flashdata('message_flash','{savesuccesmsg}');
						 redirect('pengajuan_biaya','location');
					 }

			}
		} else {
				$this->failed_save($this->input->post('id'));
		}
  }

	function approval($id){
		if($this->session->userdata('akses') != '2'){
			$page_data['data'] = $this->db->select('position')->get_where('xpengajuan',array('id_pengajuan' => $id))->row_array();
			$page_data['id'] = $id;
			$this->load->view('confirmation',$page_data);
		}else{
			echo '<p>Forbidden Access</p>';
		}
	}

	function do_approval(){
		if($this->session->userdata('akses') == '2'){
			echo 'Forbidden';
			exit();
		}

		$id = $this->input->post('id');

		$curr_data = $this->db->select('position,action,comment,nominal_biaya')->get_where('xpengajuan',array('id_pengajuan' => $id))->row_array();

		$old_position = $curr_data['position'];
		$old_action 	= $curr_data['action'];
		$old_comment 	= $curr_data['comment'];
		$nominal_biaya = floatval($curr_data['nominal_biaya']);

		$new_position = intval($this->session->userdata('akses')) + 1;
		$new_action   = $this->input->post('action_select');
		$new_comment	= $this->input->post('comment',TRUE);

		if($new_action == '2'){
			$new_position =  intval($old_position) - 1;
		}

		if($nominal_biaya > 10000000 && $new_action == '1' && $old_position == '4'){
			$new_position = $new_position + 1 ;
		}

		if(($old_position == '5' || $old_position == '6') && $new_action == '1' ){
			$new_position = 7; //finish
		}

		if(($old_position == '5' || $old_position == '6') && $new_action == '2' ){
			$new_position = 4; //checker
		}

		$data = array(
			'position' 			=> $new_position,
			'action' 				=> $new_action,
			'comment' 			=> $new_comment,
			'last_position' => $old_position,
			'last_action' 	=> $old_action,
			'last_comment' 	=> $old_comment,
		);

		if($this->session->userdata('akses') == '3'){
			$data['no_pengajuan'] = $this->input->post('no_pengajuan');
		}

		$this->db->set($data);
		$this->db->where('id_pengajuan',$id);
		$this->db->update('xpengajuan');

		$data_log = array(
			'id_pengajuan' 	=> $id,
			'from_position' => $old_position,
			'to_position'		=> $new_position,
			'action' 				=> $new_action,
			'comment' 			=> $new_comment,
			'add_by' 				=> $this->session->userdata('userid'),
		);
		$this->db->insert('xpengajuan_log',$data_log);
		$return = array('code' => '1','msg' => 'OK');
		echo json_encode($return);
	}

	function detail($id){
		$page_data['data'] = $this->db->get_where('xpengajuan',array('id_pengajuan' => $id))->row_array();

		$this->db->select('a.*,b.nama as nama_from,c.nama as nama_to,d.nama as nama_user')
						 ->from('xpengajuan_log a')
						 ->join('xakses b','a.from_position = b.id','left')
						 ->join('xakses c','a.to_position = c.id','left')
						 ->join('xuser d','a.add_by = d.id')
						 ->where(array('a.id_pengajuan' => $id));
		$page_data['logs'] = $this->db->get()->result_array();
		$this->load->view('detail',$page_data);
	}

}
