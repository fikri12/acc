<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| DEVELOPER 	: IYAN ISYANTO
| EMAIL			: POSDARING@GMAIL.COM
|--------------------------------------------------------------------------
|
*/

class Posisikas_model extends CI_Model {

	public function save() {
		$no = get_kode('PK'.date('ymd'),'no','mposisikas',3);
		$this->db->set('no', $no);
		$this->db->set('tanggal', $this->input->post('tanggal'));
		$this->db->set('nominal', remove_comma($this->input->post('nominal')));
		$insert = $this->db->insert('mposisikas');
		if($insert) {
			$this->_save( remove_comma($this->input->post('nominal')) );
			return true;
		} else {
			return false;
		}
	}

	private function _save($nominal) {
		$this->db->set('no', get_kode('CF'.date('ymd'),'no','tcashflow',3));
		$this->db->set('tanggal', date('Y-m-d'));
		$this->db->set('debet', 0);
		$this->db->set('kredit', $nominal);
		$this->db->set('posisi', $this->_mx_posisicashflow()+$nominal);
		$this->db->set('keterangan', 'Tambah Saldo Posisi');
		return $this->db->insert('tcashflow');
	}

	private function _mx_posisicashflow() {
		$this->db->select('posisi');
		$this->db->order_by('no', 'desc');
		$this->db->limit(1);
		$row = $this->db->get('tcashflow')->row();	
		return ($row->posisi);
	}

}

/* End of file Posisikas_model.php */
/* Location: ./application/modules/master/models/Posisikas_model.php */