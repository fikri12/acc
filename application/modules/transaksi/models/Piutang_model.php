<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| DEVELOPER 	: IYAN ISYANTO
| EMAIL			: POSDARING@GMAIL.COM
|--------------------------------------------------------------------------
|
*/

class Piutang_model extends CI_Model {

	public function save() {
		$this->db->set('no', get_kode('U'.date('ymd'),'no','tpiutang',3));
		$this->db->set('tanggal', $this->input->post('tanggal'));
		$this->db->set('proyek', $this->input->post('proyek'));
		$this->db->set('progres', $this->input->post('progres'));
		$this->db->set('dibayar', $this->input->post('dibayar'));
		$this->db->set('terbayar', $this->input->post('terbayar'));
		$this->db->set('sisapiutang', $this->input->post('sisapiutang'));
		$this->db->set('keterangan', $this->input->post('keterangan'));
		return $this->db->insert('tpiutang');
	}

	public function edit() {
		$this->db->set('no', $this->input->post('no'));
		$this->db->set('tanggal', $this->input->post('tanggal'));
		$this->db->set('proyek', $this->input->post('proyek'));
		$this->db->set('progres', $this->input->post('progres'));
		$this->db->set('dibayar', $this->input->post('dibayar'));
		$this->db->set('terbayar', $this->input->post('terbayar'));
		$this->db->set('sisapiutang', $this->input->post('sisapiutang'));
		$this->db->set('keterangan', $this->input->post('keterangan'));
		$this->db->where('no', $this->input->post('id'));
		return $this->db->update('tpiutang');
	}

	public function by_id($id) {
		return $this->db->get_where('tpiutang', array('no' => $id) )->row();
	}

	public function total_saldo($noproyek) {
		$table = "(
		SELECT
		a.nominal as piutang,
		IF( (SELECT SUM(terbayar) FROM tpiutang WHERE proyek = '".$noproyek."') IS NULL, 0, (SELECT SUM(terbayar) FROM tpiutang WHERE proyek = '".$noproyek."') ) AS terbayar,
		IF( (SELECT MAX(progres) FROM tpiutang WHERE proyek = '".$noproyek."') IS NULL, 0, (SELECT MAX(progres) FROM tpiutang WHERE proyek = '".$noproyek."') ) AS progres,
		a.nominal - IF( (SELECT SUM(terbayar) FROM tpiutang WHERE proyek = '".$noproyek."') IS NULL, 0, (SELECT SUM(terbayar) FROM tpiutang WHERE proyek = '".$noproyek."') ) AS sisapiutang
		FROM mproyek a
		WHERE a.no = '".$noproyek."'
		AND a.stlunas = 0
		AND a.tipe = 2
		) AS tbl";
		return $this->db->get($table)->row();
	}

}

/* End of file Piutang_model.php */
/* Location: ./application/modules/transaksi/models/Piutang_model.php */