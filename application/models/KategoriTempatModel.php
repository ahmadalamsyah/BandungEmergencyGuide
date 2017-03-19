<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of KategoriTempatModel
 *
 * @author ahmadalamsyah
 */
class KategoriTempatModel extends CI_Model{

	private $primary_key = 'idKategoriTempat';
	private $table_name = 'kategoritempat';

	function __construct(){
		parent :: __construct();
	}

//	function getAllKategoriTempat(){
//		$this->db->order_by('namaKategori');
//		return $this->db->get($this->table_name);
//	}
//	function getAAgama($str){
//		$this->db->where('id_agama',$str);
//		return $this->db->get($this->table_name);
//	}
//	function checkUnique($id_agama){
//		$this->db->where('id_agama',$id_agama);
//		return $this->db->get($this->table_name);
//	}
//
//	function checkUniqueNama($agama){
//		$this->db->where('agama',$agama);
//		return $this->db->get($this->table_name);
//	}
//
//	function save($agama){
//	$this->db->insert($this->table_name, $agama); 
//	return $this->db->insert_id(); 
//	}
//
//	function update($id,$agama){
//		$this->db->where($this->primary_key,$id);
//		$this->db->update($this->table_name,$agama);
//	}
//	function hapus($id){
//		$this->db->where($this->primary_key,$id);
//		$this->db->delete($this->table_name);
//	}
        function getDataKategoriTempat(){
            $this->db->order_by('namaKategoriTempat');
		return $this->db->get('kategoritempat');
        }
	function getallKategoriTempat(){
		// $query='select * from r_agama';
		// return $this->db->query($query);

		$result=array();
		$this->db->select('*');
		$this->db->from('kategoritempat');
		$array_key_values=$this->db->get();
		foreach ($array_key_values->result() as $row) {
			$result[0]='-Pilih Kategori Tempat-';
			$result[$row->idKategoriTempat]=$row->namaKategoriTempat;
                        
		}

		return $result;
	}
        

	
}