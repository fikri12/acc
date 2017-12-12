<?php 


function get_kode($kode = 'KODE', $field, $tbl, $str_length=null){
	$CI =& get_instance();
	$CI->db->like($field, $kode, 'after'); 
	$CI->db->from($tbl);
	$query = $CI->db->count_all_results();
    
	if($query > 0){
		$autono = $query + 1;
		$autono = $kode.str_pad($autono, $str_length, '0', STR_PAD_LEFT);
	}else{
		$left = "";
		for ($i=1; $i<=$str_length; $i++) { $left .= "0"; }
		$left = substr($left, 0, $str_length-1)."1";
		$autono = $kode.$left;
	}
	return $autono;
}

function get_all($table) {
	$CI =& get_instance();
	return $CI->db->get($table)->result();
}

function get_all_where($table, $where = array()) {
	$CI =& get_instance();
	return $CI->db->get_where($table, $where)->result();	
}

function get_by_id($table, $where = array()) {
	$CI =& get_instance();
	return $CI->db->get_where($table, $where)->row();	
}