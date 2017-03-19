<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of KategoriTempat
 *
 * @author ahmadalamsyah
 */
class KategoriTempat extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){

		parent :: __construct();
		$this->load->library(array('table','form_validation'));
		$this->load->helper(array('url','form'));
		 $this->load->model('KategoriTempatModel','',TRUE);
		
	}
	public function index()
	{
		$kategoriTempat=$this->KategoriTempatModel->getallKategoriTempat();
		$tempat['result_KategoriTempat']=$kategoriTempat;
		$this->load->view('admin/InsertKordinat',$tempat);

		
	}

	
	function addUsers(){
		$idUsers= $this->input->post('idUsers');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$nama=$this->input->post('nama');
		$alamat=$this->input->post('alamat');
		$noTlp=$this->input->post('noTlp');
		$idtoko=$this->input->post('idtoko');

		$user= array('idUser' =>$idUsers,
					 'username'=>$username,
					 'password'=>$password,
					 'namaUser'=>$nama,
					 'alamatUser'=>$alamat,
					 'notlp'=>$noTlp,
					 'idToko'=>$idtoko );
		$this->UsersModel->save($user);

	}
        
}
