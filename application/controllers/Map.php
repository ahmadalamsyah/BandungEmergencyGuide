<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Map extends CI_Controller {


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
        parent::__construct();
                $this->load->library(array('table','form_validation'));
		$this->load->helper(array('url','form'));
                $this->load->model('MapModel','',TRUE);
                $this->load->model('KategoriTempatModel','',TRUE);
                
              
        }  
	public function index()
	{
             
             $this->load->view('admin/map');
	}
        function getMarkerLocation(){
            $dataLocation= $this->MapModel->get_Location();
            

            
                foreach ($dataLocation as $row) {
                       $getMarker[] = array(
                           'idLokasiEmergency'=>$row->idLokasiEmergency,
                           'namaLokasi'=>$row->namaLokasi,
                           'alamatLokasi'=>$row->alamatLokasi,
                           'noTlp'=>$row->noTlp,
                           'latitude'=>$row->latitude,
                           'longitude'=>$row->longitude,
                           'idKategoriTempat'=>$row->idKategoriTempat,
                           'namaKategoriTempat'=>$row->namaKategoriTempat
                           
                       );
                }
                $data =array(
                    "marker"=>$getMarker,
                    
                );
                $json = json_encode($data);
                
                echo $json;
        }
        
        function getAllData(){
            $data['resultData']= $this->MapModel->get_Location();
            
            $this->load->view('admin/InsertKordinat',$data);
            
        }
}