<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



class MapModel extends CI_Model{

	function __construct()
    {
            
        parent::__construct();
    }
    
    function get_Location(){
       
//       $result = array();
//       $this->db->select('*');
//       $this->db->from('locationemergency');
//       $location = $this->db->get();
//       foreach ($location->result() as $row) {
//                $result[$row->namaLokasi]=$row->namaLokasi;
//                $result[$row->alamatLokasi]=$row->alamatLokasi;
//                $result[$row->noTlp]=$row->noTlp;
//                $result[$row->latitude]=$row->latitude;
//                $result[$row->longitude]=$row->longitude;
//        
//       }
//       return $result;
        
//        $this->db->order_by('id');
//        return $this->db->get('locationemergency')->result();
        
        $query ="select l.idLokasiEmergency,l.namaLokasi,l.alamatLokasi,l.noTlp,l.latitude,l.longitude,k.namaKategoriTempat,k.idKategoriTempat
                 from  lokasiemergency l
                 inner join kategoritempat k on l.idKategoriTempat=k.idKategoriTempat
                 where l.status = 1";
        return $this->db->query($query)->result();
        
    }
    function saveLocation($lokasi){
        $query = $this->db->insert('lokasiemergency',$lokasi);
        return $query;
    }
    
}