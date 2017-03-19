<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VerifyLoginController
 *
 * @author AhmadAlamsyah
 */
class VerifyLoginController extends CI_Controller {
    //put your code here
    
    function __construct() {
        parent::__construct();
        //load session and connect to database
        
        $this->load->helper(array('url','form'));
        $this->load->library(array('form_validation'));
        $this->load->library('session');
        $this->load->model('RegistrasiUserModel','',TRUE); 
        
    }
    function index(){
      
    }
    function dataBase(){
        
       $this->form_validation->set_rules('username','Username','required');
       $this->form_validation->set_rules('password','Password','required');
       
       
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
       
            
           
    
//           $query = "select * from registrasiuser where nip='".$username."' and password = '".$password."'";
//          $dataLogin = $this->db->query($query);
        $dataLogin = $this->RegistrasiUserModel->getDataLogin($username,$password);
        
          if($dataLogin->num_rows()== 1){   
               foreach ($dataLogin->result() as $loginData){
                   $sessionLogin = array(
                       
                       'Logged_in' => 'Login Masuk',
                       'Username'  => $loginData->nip,
                       'Nama'      => $loginData->nama,
                       'Password'  =>$loginData->password,
                       'Level'     => $loginData->level
                       );
                      
                    $this->session->set_userdata($sessionLogin); 
               }
//               if($this->session->userdata('Level')  == 'admin'){
//                   redirect('HomeController');
//               }else if($this->session->userdata('Level')  == 'user'){
//                    redirect('HomeUserController');   
//               }else{
//                   redirect('RegistrasiUserController');
//                }
                if ($this->session->userdata('Username') != '' && $this->session->userdata('Password') != '' ){
                    if ($this->session->userdata('Level') == 'admin'){
                        redirect('HomeController');
                    }else{
                        redirect('HomeUserController');
                    }
                }else{
                    $this->load->view('RegistrasiPetugasView');
                }
                
           
          }
       
        
            
        
    }
    function keluar(){
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        redirect('RegistrasiUserController');
    }
    
}
