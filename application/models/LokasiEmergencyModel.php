<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InsertKordinat
 *
 * @author ahmadalamsyah
 */
class LokasiEmergencyModel extends CI_Model {
    
    function __construct()
    {
            
        parent::__construct();
    }
    //put your code here
    
    function setLokasiEmergency($lokasi){
        $getLokasiEmergency = $this->db->insert('lokasiemergency',$lokasi);
        return $getLokasiEmergency;
    }
    
    function getLokasiEmergencyAll(){
        $getLokasiEmergency ="select l.idLokasiEmergency,l.namaLokasi,l.alamatLokasi,l.noTlp,l.latitude,l.longitude,k.namaKategoriTempat,k.idKategoriTempat
                 from  lokasiemergency l
                 inner join kategoritempat k on l.idKategoriTempat=k.idKategoriTempat
                 where l.status = 1";
        return $this->db->query($getLokasiEmergency)->result();
    }
    function getLokasiEmergencyById($idLokasiEmergency){
	$getLokasiEmergency = "select l.idLokasiEmergency,l.namaLokasi,l.alamatLokasi,l.noTlp,l.latitude,l.longitude,k.namaKategoriTempat,k.idKategoriTempat
                 from  lokasiemergency l
                 inner join kategoritempat k on l.idKategoriTempat=k.idKategoriTempat
                 where l.idLokasiEmergency ='".$idLokasiEmergency."' ";
        return $this->db->query($getLokasiEmergency)->result();
        
        
    }
    function getDataByNip($username){
            $getLokasiEmergency = "select l.idLokasiEmergency,l.namaLokasi,l.alamatLokasi,l.noTlp,l.latitude,l.longitude,k.namaKategoriTempat,k.idKategoriTempat
                         from  lokasiemergency l
                         inner join kategoritempat k on l.idKategoriTempat=k.idKategoriTempat
                         inner join registrasiuser r on r.nip = l.nip
                         where l.nip ='".$username."' "; 
            return $this->db->query($getLokasiEmergency)->result();
    
    }
    function update($idLokasiEmergencyHapus,$lokasiemergency){
		$this->db->where('idLokasiEmergency',$idLokasiEmergencyHapus);
		$getLokasiEmergency=$this->db->update('lokasiemergency',$lokasiemergency);
                return $getLokasiEmergency;
    }
    function getLokasiEmergencyAllOrderBy($limit,$start){
//        $query = "select l.idLokasiEmergency,l.namaLokasi,l.alamatLokasi,l.noTlp,l.latitude,l.longitude,k.namaKategoriTempat,k.idKategoriTempat
//                 from  lokasiemergency l
//                 inner join kategoritempat k on l.idKategoriTempat=k.idKategoriTempat
//                 where l.status = 1
//                 order by l.namaLokasi ";
//        $this->db->limit($limit,$start);
//        return $this->db->query($query)->result();
       
        $status = 1;
        $this->db->select('lokasiemergency.idLokasiEmergency, lokasiemergency.namaLokasi, lokasiemergency.alamatLokasi,lokasiemergency.noTlp, lokasiemergency.latitude, lokasiemergency.longitude, kategoritempat.idKategoriTempat, kategoritempat.namaKategoriTempat');
        $this->db->from('lokasiemergency');
        $this->db->join('kategoritempat','lokasiemergency.idKategoriTempat=kategoritempat.idKategoriTempat','inner');
        $this->db->where('lokasiemergency.status',$status);
        $this->db->order_by('lokasiemergency.namaLokasi');
        $this->db->limit($limit, $start);
        $query=$this->db->get();
        return $query->result();
                           
    } 
     
}
