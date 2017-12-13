<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| DEVELOPER     : FIKRI ADITIA
| EMAIL         : FIKRIADITIA.ADITIA9@GMAIL.COM
|--------------------------------------------------------------------------
|
*/

class Users extends Admin {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Users_model','model');
	}

	public function index() {
		$data['error'] 				= '';
		$data['title'] 				= 'Users';
		$data['content'] 			= 'users/index';
		$data['breadcrum'] 			= array(array(config('instansi'),'dashboard'),
												array("Users", 'Users'),
										);
		$data 						= array_merge( $data, backend_info() );
		$this->parser->parse( 'default/template', $data );
	}

	public function ajax_list(){
        $this->load->library('Datatables');
        $this->datatables->select('a.id, a.nama,a.username,a.akses,a.foto_ttd,b.nama as nama_akses');
        $this->datatables->add_column('option', '', 'no');
        $this->datatables->join('xakses b','b.id = a.akses', 'left');
        $this->datatables->from('xuser a');
        return print_r($this->datatables->generate());
    }

    public function create(){
        $data = array(
                'id'                => '',
                'nama'              => '',
                'username'          => '',
                'password'          => '',
                'akses'           => '',
                'foto_ttd'        => '',
                );
        $data['error']          = '';
        $data['title']          = 'Tambah User';
        $data['content']       	= 'users/manage';
        $data['list_akses']       	  = $this->db->order_by('nama','asc')->get('xakses')->result_array();
        $data['breadcrum']      = array(array(config('instansi'),'dashboard'),
                                        array("Users",'Users'),
                                        array("Tambah User",'')
                                    );
        $data                   = array_merge($data,backend_info());
        $this->parser->parse('default/template',$data);
    }

    public function edit($id){
        if($id) {
            $row = $this->model->by_id($id);
            if($row) {
                $data = array(
                    'id'                => $row->id,
                    'nama'              => $row->nama,
		                'username'          => $row->username,
		                'password'         => $row->password,
		                'akses'             => $row->akses,
		                'foto_ttd'          => $row->foto_ttd,
                );
                $data['error']          = '';
                $data['title']          = 'Edit User';
                $data['content']       	= 'users/manage';
                $data['list_akses']     = $this->db->order_by('nama','asc')->get('xakses')->result_array();
                $data['breadcrum']      = array(array(config('instansi'),'dashboard'),
                                                array("User",'User'),
                                                array("Edit User",'')
                                            );
                $data                   = array_merge($data,backend_info());
                $this->parser->parse('default/template',$data);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }

    public function save() {

        $this->form_validation->set_rules('nama', '', 'trim|required');
        $this->form_validation->set_rules('username', '', 'trim|required');
        if($this->input->post('id') == ''){
          $this->form_validation->set_rules('password', '', 'trim|required');
        }
				$this->form_validation->set_rules('akses', '', 'trim|required');
        if($this->form_validation->run() == true) {

        	if($this->input->post('id') !== '') {

        		if($this->model->edit()) {

                if(!empty($_FILES['foto_ttd']['name'])){

                    $config['upload_path']          = 'uploads/users/ttd/';
                    $config['allowed_types']        = 'gif|jpg|png';
                    $config['max_size']             = 4176;
                    $config['encrypt_name']         = TRUE;
                    $this->load->library('upload', $config);

                    if ( ! $this->upload->do_upload('foto_ttd'))
                    {
                        $error = array('error' => $this->upload->display_errors());
                    }
                    else
                    {
                            $data = array('upload_data' => $this->upload->data());

                            $this->db->where('id',$this->input->post('id'));
                            $this->db->update('xuser',array('foto_ttd' => $data['upload_data']['file_name']));
                    }
                }

                $this->session->set_flashdata('confirm',true);
                $this->session->set_flashdata('message_flash','{updatesuccesmsg}');
                redirect('master/users','location');
	            }
        	} else {
	            if($this->model->save()) {
                $insert_id = $this->db->insert_id();

                $config['upload_path']          = 'uploads/users/ttd/';
        				$config['allowed_types']        = 'gif|jpg|png';
        				$config['max_size']             = 4176;
        				$config['encrypt_name']         = TRUE;

        				 $this->load->library('upload', $config);

        				 if ( ! $this->upload->do_upload('foto_ttd'))
        				 {
        								 $error = array('error' => $this->upload->display_errors());

        				 }
        				 else
        				 {
        								 $data = array('upload_data' => $this->upload->data());

        								 $this->db->where('id',$insert_id);
        								 $this->db->update('xuser',array('foto_ttd' => $data['upload_data']['file_name']));
        				 }

                // $get_akses = $this->db->get_where('xakses',array('id' => $this->input->post('akses')))->row_array();
                // $list_menu = explode(',',$get_akses['menu']);
                 //for($k = 0; $k < count($list_menu); $k++){
                   //$this->db->insert('xuserakses',array('userid' => $insert_id,'hakaksesid' => $list_menu[$k]));
                 //}

	                $this->session->set_flashdata('confirm',true);
	                $this->session->set_flashdata('message_flash','{savesuccesmsg}');
	                redirect('master/users','location');
	            }
        	}
        } else {
            $this->failed_save($this->input->post('id'));
        }
    }

    public function failed_save($id){
        $data = $this->input->post();
        if($id !== '') {
          $data['error']        = validation_errors();
    		  $data['title'] 				= 'Edit Rekanan';
    		  $data['content'] 			= 'users/manage';
    		  $data['breadcrum'] 	  = array(array(config('instansi'),'dashboard'),
    												array("User", 'User'),
    										);
        } else {
            $data['error']              = validation_errors();
            $data['title']              = 'Tambah Rekanan';
            $data['content']            = 'users/manage';
            $data['breadcrum']          = array(array(config('instansi'),'dashboard'),
                                                    array("User", 'User'),
                                            );
        }
        $data = array_merge($data,backend_info());
        $this->parser->parse('default/template',$data);
    }

    public function delete($id) {
        if($id) {
            if($this->model->delete($id)) {
                $this->session->set_flashdata('confirm',true);
                $this->session->set_flashdata('message_flash','{deletesuccesmsg}');
                redirect('master/users','location');
            }
        } else {
            show_404();
        }
    }

    public function cek_username(){
      $id = $this->input->post('id');
      $username = $this->input->post('value');
      $is_exists = 0;
      $msg = 'OK';
      if(empty($id)){
        $cek = $this->model->check_username($username)->num_rows();
        if($cek > 0){
          $is_exists = 1;
          $msg = 'Exists';
        }
      }else{
        $cek = $this->model->check_username($username)->row_array();
        if(!empty($cek) && $cek['id'] != $id){
          $is_exists = 1;
          $msg = 'Exists';
        }
      }

      $res = array('code' => $is_exists , 'msg' => $msg);
      echo json_encode($res);
    }

}
