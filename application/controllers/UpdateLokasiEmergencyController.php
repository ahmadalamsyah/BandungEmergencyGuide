<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UpdateLokasiEmergencyController
 *
 * @author AhmadAlamsyah
 */
class UpdateLokasiEmergencyController extends CI_Controller {
    //put your code here
    
    function __construct(){
        parent::__construct();
                $this->load->library(array('table','form_validation'));
		$this->load->helper(array('url','form'));
                $this->load->library('session');
                $this->load->model('KategoriTempatModel','',TRUE);
                $this->load->model('LokasiEmergencyModel','',TRUE);
              
        }  
	public function index()        
	{
             
               $kategoriTempat=$this->KategoriTempatModel->getallKategoriTempat();
		$tempat['result_KategoriTempat']=$kategoriTempat;
                
		$this->load->view('admin/UpdateLokasiEmergencyView',$tempat);
                
  
	}
        
        
}
