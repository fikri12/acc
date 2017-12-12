<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| DEVELOPER 	: IYAN ISYANTO
| EMAIL			: POSDARING@GMAIL.COM
|--------------------------------------------------------------------------
|
*/

class Proyek_model extends CI_Model {

	public function save() {
		$this->db->set('no', get_kode('S','no','mproyek',3));
		$this->db->set('nama', $this->input->post('nama'));
		$this->db->set('tipe', $this->input->post('tipe'));
		$this->db->set('rekanan', $this->input->post('rekanan'));
		$this->db->set('nominal', remove_comma($this->input->post('nominal')));
		$this->db->set('keterangan', $this->input->post('keterangan'));
		$this->db->set('stlunas', 0);
		return $this->db->insert('mproyek');
	}

	public function edit() {
		$this->db->set('no', $this->input->post('no'));
		$this->db->set('nama', $this->input->post('nama'));
		$this->db->set('tipe', $this->input->post('tipe'));
		$this->db->set('rekanan', $this->input->post('rekanan'));
		$this->db->set('nominal', remove_comma($this->input->post('nominal')));
		$this->db->set('keterangan', $this->input->post('keterangan'));
		$this->db->where('no', $this->input->post('id'));
		return $this->db->update('mproyek');
	}

	public function delete($no) {
		$this->db->set('staktif', 0);
		$this->db->where('no', $no);
		return $this->db->update('mproyek');
	}

	public function by_id($id) {
		return $this->db->get_where('mproyek', array('no' => $id) )->row();
	}

}

/* End of file Proyek_model.php */
/* Location: ./application/modules/master/models/Proyek_model.php */