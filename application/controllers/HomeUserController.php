<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HomeUserController
 *
 * @author AhmadAlamsyah
 */
class HomeUserController extends CI_Controller {
    //put your code here
     function __construct(){
        parent::__construct();
                $this->load->library(array('table','form_validation'));
                $this->load->library('session');
                $this->load->library('pagination');
		$this->load->helper(array('url','form'));
                $this->load->model('LokasiEmergencyModel','',TRUE);
              
        }  
        
        function index(){
            
             $session_data = $this->session->userdata('Username');
             $dataLokasi['result_data']= $this->LokasiEmergencyModel->getDataByNip($session_data);
             $dataLokasi['session']=$this->session->userdata('Nama');
             $this->load->view('useremergency/MapUserEmergency',$dataLokasi);
           
        
        }
    
}
