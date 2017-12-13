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

	public function get_notif(){
		$id_user = $this->session->userdata('userid');
		$total_notif = 0;
		$notif = array();

		$get_notif = $this->db->select('*')->get_where('xnotif',array('id_user' => $id_user,'readed' => '0'));
		$total_notif = $get_notif->num_rows();
		$notif = $get_notif->result_array();
		$res  = array('code' => '1', 'total' => $total_notif, 'notif' => $notif);
		echo json_encode($res);
	}

	public function read_notif(){
		$id = $this->input->post('id');
		$this->db->where('id',$id);
		$this->db->update('xnotif',array('readed' => '1','read_at' => date('Y-m-d H:i:s')));

	}

	public function do_confirm(){
		if($this->session->userdata('akses') == '2'){
			echo json_encode(array('code' => '2' , 'msg' => 'Forbidden'));
			exit();
		}
		$id_notif = $this->input->post('id');
		$type = $this->input->post('type');
		$get_notif = $this->db->get_where('xnotif',array('id' => $id_notif))->row_array();
		$curr_data = $this->db->get_where('xpengajuan',array('id_pengajuan' => $get_notif['id_pengajuan']))->row_array();

		$id_pengajuan = $get_notif['id_pengajuan'];

		$new_type = '1';
		if($type == 'reject'){
			$new_type = '2';
		}

		$old_position = $curr_data['position'];
		$old_action 	= $curr_data['action'];
		$old_comment 	= $curr_data['comment'];
		$nominal_biaya = floatval($curr_data['nominal_biaya']);

		$new_position = intval($this->session->userdata('akses')) + 1;
		$new_action   = $new_type;
		$new_comment	= '-';

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
			$data['no_pengajuan'] = '-';//$this->input->post('no_pengajuan');
		}

		$this->db->set($data);
		$this->db->where('id_pengajuan',$id_pengajuan);
		$this->db->update('xpengajuan');

		$data_log = array(
			'id_pengajuan' 	=> $id_pengajuan,
			'from_position' => $this->session->userdata('akses'),//$old_position,
			'to_position'		=> $new_position,
			'action' 				=> $new_action,
			'comment' 			=> $new_comment,
			'add_by' 				=> $this->session->userdata('userid'),
		);
		$this->db->insert('xpengajuan_log',$data_log);

		/* START UPDATE NOTIF */
		$this->db->where('id_pengajuan',$id_pengajuan);
		$this->db->where('akses',$this->session->userdata('akses'));
		$this->db->update('xnotif',array('action' => '1'));
		/* END UPDATE NOTIF */


		/* START NOTIF */
		$list_user = $this->db->get_where('xuser',array('akses' => intval($this->session->userdata('akses')) + 1))->result_array();
		$judul = 'Pengajuan Biaya Baru';
		$isi 	= 'Permohonan konfirmasi pengajuan biaya';
		foreach ($list_user as $value) {
			 # code...
			 $this->fungsi->insert_notif($id_pengajuan,$value['id'],intval($this->session->userdata('akses')) + 1,$judul,$isi);
		}
		/* END NOTIF */

		$ret = array('code' => '1' , 'msg' => 'Success');
		echo json_encode($ret);
	}

}
