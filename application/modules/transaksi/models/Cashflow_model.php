<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| DEVELOPER 	: IYAN ISYANTO
| EMAIL			: POSDARING@GMAIL.COM
|--------------------------------------------------------------------------
|
*/

class Cashflow_model extends CI_Model {

	public function save() {
		$this->db->set('no', get_kode('CF'.date('ymd'),'no','tcashflow',3));
		$this->db->set('tanggal', $this->input->post('tanggal'));
		$this->db->set('debet', remove_comma($this->input->post('debet')));
		$this->db->set('kredit', remove_comma($this->input->post('kredit')));
		$this->db->set('posisi', remove_comma($this->input->post('posisi')));
		$this->db->set('keterangan', $this->input->post('keterangan'));
		$this->db->set('staktif', 1);
		return $this->db->insert('tcashflow');
	}

	public function by_id($id) {
		return $this->db->get_where('tcashflow', array('no' => $id) )->row();
	}

	public function max_posisicashflow() {
		$this->db->select('posisi');
		$this->db->order_by('no', 'desc');
		$this->db->limit(1);
		$row = $this->db->get('tcashflow')->row();	
		return ($row->posisi);
	}

	public function sum_posisikas() {
		$this->db->select_sum('nominal','nominal');
		return $this->db->get('mposisikas')->row()->nominal;
	}

	public function sum_posisicashflow() {
		$this->db->select_sum('debet','debet');
		$this->db->select_sum('kredit','kredit');
		$row = $this->db->get('tcashflow')->row();	
		return ($row->debet-$row->kredit);
	}
	

}

/* End of file Cashflow_model.php */
/* Location: ./application/modules/transaksi/models/Cashflow_model.php */