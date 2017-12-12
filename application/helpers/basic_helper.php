<?php

function backend_info() {
	$CI =& get_instance();
	$data = array(
		'base_url' 						=> base_url(),	
		'site_url'						=> site_url(),	
		
		'adminlte' 						=> base_url().'adminlte/',		
		'savesuccesmsg'					=> 'Data telah berhasil disimpan.',
		'updatesuccesmsg'				=> 'Data telah berhasil diubah.',
		'deletesuccesmsg'				=> 'Data telah berhasil dihapus.',
		'deleteconfirmmsg'				=> 'Apakah anda yakin ingin menghapus data?',
		'notfoundmsg'					=> 'data tidak ditemukan.',
		'leavepagemsg'					=> 'Apakah anda yakin ingin berpindah halaman ?\nData yang sudah diinputkan akan dibatalkan.',
		'usernama'						=> $CI->session->userdata('nama'),
		'userid'						=> $CI->session->userdata('userid'),
	);
	return $data;
}

function config($item) {
	$ian =& get_instance();
	return $ian->config->item($item);
}

function remove_comma($number) {
	return str_replace(',', '', $number);
}