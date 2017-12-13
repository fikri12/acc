<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Fungsi{

  public function __construct()
  {
    $this->CI =& get_instance();
  }

  function insert_notif($id_pengajuan,$id_user,$akses,$judul,$isi){
    $data = array(
      'judul_notif' => $judul,
      'isi_notif'   => $isi,
      'id_pengajuan'=> $id_pengajuan,
      'id_user'     => $id_user,
      'akses'     => $akses,
    );

    $this->CI->db->insert('xnotif',$data);
  }


}




?>
