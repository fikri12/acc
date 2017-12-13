<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| DEVELOPER 	: FIKRI ADITIA
| EMAIL			: FIKRIADITIA.ADITIA9@GMAIL.COM
|--------------------------------------------------------------------------
|
*/

class Users_model extends CI_Model {

	public function save() {
		$this->db->set('nama', $this->input->post('nama'));
		$this->db->set('username', $this->input->post('username'));
		$this->db->set('password', md5( $this->input->post('password') ));
		$this->db->set('akses', $this->input->post('akses'));
		//$this->db->set('foto_ttd', $this->input->post('keterangan'));
		//$this->db->set('stlunas', 0);
		return $this->db->insert('xuser');
	}

	public function edit() {
    $this->db->set('nama', $this->input->post('nama'));
		$this->db->set('username', $this->input->post('username'));
    if(!empty($this->input->post('password'))){
      $this->db->set('password', md5( $this->input->post('password') ));
    }
		$this->db->set('akses', $this->input->post('akses'));
		$this->db->where('id', $this->input->post('id'));
		return $this->db->update('xuser');
	}

	public function delete($id) {
		return $this->db->delete('xuser',array('id' => $id));
	}

	public function by_id($id) {
		return $this->db->get_where('xuser', array('id' => $id) )->row();
	}

  public function check_username($username){
    return $this->db->get_where('xuser',array('username' => $username));
  }

}

/* End of file Users_model.php */
/* Location: ./application/modules/master/models/Users_model.php */
