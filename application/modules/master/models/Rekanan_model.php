<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| DEVELOPER 	: IYAN ISYANTO
| EMAIL			: POSDARING@GMAIL.COM
|--------------------------------------------------------------------------
|
*/

class Rekanan_model extends CI_Model {

	public function save() {
		$this->db->set('no', get_kode('S','no','mrekanan',3));
		$this->db->set('nama', $this->input->post('nama'));
		$this->db->set('alamat', $this->input->post('alamat'));
		$this->db->set('kota', $this->input->post('kota'));
		$this->db->set('provinsi', $this->input->post('provinsi'));
		$this->db->set('telepon', $this->input->post('telepon'));
		$this->db->set('staktif', 1);
		return $this->db->insert('mrekanan');
	}

	public function edit() {
		$this->db->set('no', $this->input->post('no'));
		$this->db->set('nama', $this->input->post('nama'));
		$this->db->set('alamat', $this->input->post('alamat'));
		$this->db->set('kota', $this->input->post('kota'));
		$this->db->set('provinsi', $this->input->post('provinsi'));
		$this->db->set('telepon', $this->input->post('telepon'));
		$this->db->where('no', $this->input->post('id'));
		return $this->db->update('mrekanan');
	}

	public function delete($no) {
		$this->db->set('staktif', 0);
		$this->db->where('no', $no);
		return $this->db->update('mrekanan');
	}

	public function by_id($id) {
		return $this->db->get_where('mrekanan', array('no' => $id) )->row();
	}
	

}

/* End of file Cashflow_model.php */
/* Location: ./application/modules/transaksi/models/Cashflow_model.php */