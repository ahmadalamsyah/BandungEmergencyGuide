<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegistrasiUserController
 *
 * @author AhmadAlamsyah
 */
class RegistrasiUserController extends CI_Controller{
    //put your code here
    
    function __construct(){
        parent::__construct();
                $this->load->library(array('table','form_validation'));
		        $this->load->helper(array('url','form'));
                $this->load->model('RegistrasiUserController','',TRUE);
                
        }  
	public function index()        
	{
             
                $kategoriTempat=$this->KategoriTempatModel->getallKategoriTempat();
		$tempat['result_KategoriTempat']=$kategoriTempat;
		$this->load->view('RegistrasiPetugasView',$tempat);
                
  
	}
        function simpanUser(){
            $nip = $this->input->post('nip');
            $nama = $this->input->post('nama');
            $noTlp = $this->input->post('noTlp');
            $password = $this->input->post('password1');
            $kategoriTempat = $this->input->post('kategoriTempat');
            $namaTempat = $this->input->post('namaTempat');
            $level = "user";
            $status = "1";
            
            $user = array(
                'nip'=> $nip,
                'nama'=>$nama,
                'noTlp'=>$noTlp,
                'password'=> $password, 
                'idKategoriTempat'=>$kategoriTempat,
                'namaTempat'=>$namaTempat,
                'level'=>$level,
                'status'=>$status
                    
                
                
            );
            $this-> RegistrasiUserModel->setRegistrasiUser($user);
            $this->load->view('RegistrasiPetugasView');
        }
        
}
