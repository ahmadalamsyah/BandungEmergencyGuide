<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ViewIdentitasPetugasController
 *
 * @author AhmadAlamsyah
 */
class ViewIdentitasPetugasController extends CI_Controller{
    //put your code here
    
     function __construct() {
        parent::__construct();
        //load session and connect to database
        
        $this->load->helper(array('url','form'));
        $this->load->library(array('form_validation'));
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->model('RegistrasiUserModel','',TRUE); 
        
    }
    function index(){
                $identitasPetugas=$this->RegistrasiUserModel->getDataUser();
		$identitas['result_Identitas']=$identitasPetugas;
                $identitas['session']=$this->session->userdata('Nama');
		$this->load->view('admin/IdentitasPetugasView',$identitas);
    }
}
