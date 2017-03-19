<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegistrasiUserModel
 *
 * @author AhmadAlamsyah
 */
class RegistrasiUserModel extends CI_Model {
    //put your code here
    
    function __construct()
    {
            
        parent::__construct();
    }
    //put your code here
    
     function setRegistrasiUser($user){
      $setUser = $this->db->insert('registrasiuser',$user);
        return $setUser;
    }
    function login($username,$password){
        $query = "select * from registrasiuser where nip ='".$username."' and password = '".$password."'";
        
        return $this->db->query($query);
        
        
    }
    function getDataUser(){
       $query = "select r.nip,r.nama,r.noTlp,r.password,k.namaKategoriTempat,r.namaTempat
                         from  registrasiuser r
                         inner join kategoritempat k on r.idKategoriTempat=k.idKategoriTempat
                         where r.status = 1 and r.level='user' "; 
        return $this->db->query($query)->result();
    }
    function getDataLogin($username, $password){
        $query = "select * from registrasiuser where nip='".$username."' and password = '".$password."'";
        return $this->db->query($query);
        
    }
}
