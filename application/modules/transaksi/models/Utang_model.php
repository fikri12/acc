<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| DEVELOPER 	: IYAN ISYANTO
| EMAIL			: POSDARING@GMAIL.COM
|--------------------------------------------------------------------------
|
*/

class Utang_model extends CI_Model {

	public function save() {
		$this->db->set('no', get_kode('U'.date('ymd'),'no','tutang',3));
		$this->db->set('tanggal', $this->input->post('tanggal'));
		$this->db->set('proyek', $this->input->post('proyek'));
		$this->db->set('progres', $this->input->post('progres'));
		$this->db->set('dibayar', $this->input->post('dibayar'));
		$this->db->set('terbayar', $this->input->post('terbayar'));
		$this->db->set('sisautang', $this->input->post('sisautang'));
		$this->db->set('keterangan', $this->input->post('keterangan'));
		return $this->db->insert('tutang');
	}

	public function edit() {
		$this->db->set('no', $this->input->post('no'));
		$this->db->set('tanggal', $this->input->post('tanggal'));
		$this->db->set('proyek', $this->input->post('proyek'));
		$this->db->set('progres', $this->input->post('progres'));
		$this->db->set('dibayar', $this->input->post('dibayar'));
		$this->db->set('terbayar', $this->input->post('terbayar'));
		$this->db->set('sisautang', $this->input->post('sisautang'));
		$this->db->set('keterangan', $this->input->post('keterangan'));
		$this->db->where('no', $this->input->post('id'));
		return $this->db->update('tutang');
	}

	public function by_id($id) {
		return $this->db->get_where('tutang', array('no' => $id) )->row();
	}

	public function total_saldo($noproyek) {
		$table = "(
		SELECT
		a.nominal as utang,
		IF( (SELECT SUM(terbayar) FROM tutang WHERE proyek = '".$noproyek."') IS NULL, 0, (SELECT SUM(terbayar) FROM tutang WHERE proyek = '".$noproyek."') ) AS terbayar,
		IF( (SELECT MAX(progres) FROM tutang WHERE proyek = '".$noproyek."') IS NULL, 0, (SELECT MAX(progres) FROM tutang WHERE proyek = '".$noproyek."') ) AS progres,
		a.nominal - IF( (SELECT SUM(terbayar) FROM tutang WHERE proyek = '".$noproyek."') IS NULL, 0, (SELECT SUM(terbayar) FROM tutang WHERE proyek = '".$noproyek."') ) AS sisautang
		FROM mproyek a
		WHERE a.no = '".$noproyek."'
		AND a.stlunas = 0
		AND a.tipe = 1
		) AS tbl";
		return $this->db->get($table)->row();
	}	

}

/* End of file Utang_model.php */
/* Location: ./application/modules/transaksi/models/Utang_model.php */