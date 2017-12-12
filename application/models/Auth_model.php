<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| DEVELOPER 	: IYAN ISYANTO
| EMAIL			: POSDARING@GMAIL.COM
|--------------------------------------------------------------------------
|
*/

class Auth_model extends CI_Model {

	public function login($username, $password) {
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		$user = $this->db->get('xuser')->row();
		if($user) {
			$array = array(
				'userid' 			=> $user->id,
				'username' 			=> $user->username,
				'password' 			=> $user->password,
				'nama' 				=> $user->nama,
				'akses'				=> $user->akses
			);

			$this->session->set_userdata( $array );
			redirect('dashboard','refresh');
		} else {
			$this->session->set_flashdata('error_login', 'Username atau password anda salah.');
			redirect('auth','refresh');
		}
	}

}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */
