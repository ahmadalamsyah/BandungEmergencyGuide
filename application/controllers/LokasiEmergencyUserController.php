<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LokasiEmergencyUserController
 *
 * @author AhmadAlamsyah
 */
class LokasiEmergencyUserController extends CI_Controller  {
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
                
		$this->load->view('useremergency/TambahLokasiEmergencyViewUser',$tempat);
                
              
               
            
	}
       
        
      
                
        function simpanLokasiEmergency(){
            $namaLokasi = $this->input->post('namaLokasi');
            $alamatLokasi = $this->input->post('alamatLokasi');
            $noTlp = $this->input->post('noTlp');
            $latitude = $this->input->post('latitude');
            $longitude = $this->input->post('longitude');
            $kategoriTempat = $this->input->post('kategoriTempat');
            $nip = $this->session->userdata('Username');
            $status = "1";
            
            $lokasi = array(
                'namaLokasi'=> $namaLokasi,
                'alamatLokasi'=>$alamatLokasi,
                'noTlp'=> $noTlp, 
                'latitude'=> $latitude,
                'longitude'=> $longitude,
                'idKategoriTempat'=>$kategoriTempat,
                'nip' =>$nip,
                'status'=>$status
                    
                
                
            );
            $this->LokasiEmergencyModel->setLokasiEmergency($lokasi);
            $this->load->view('useremergency/MapUserEmergency');
        }
        
        function getOpenEdit($idLokasiEmergency=''){
                
                $lokasiEmergency['result'] = $this->LokasiEmergencyModel->getLokasiEmergencyById($idLokasiEmergency);
                $lokasiEmergency['result_KategoriTempat'] =$this->KategoriTempatModel->getDataKategoriTempat()->result();
                $lokasiEmergency['session']=$this->session->userdata('Nama');
                $this->load->view('useremergency/UpdateLokasiEmergencyViewUser',$lokasiEmergency);
               
                
                
            
        }
        function updateLokasiEmergency(){
            $idLokasiEmergency = $this->input->post('idLokasiEmergency');
            $namaLokasi = $this->input->post('namaLokasi');
            $alamatLokasi = $this->input->post('alamatLokasi');
            $noTlp = $this->input->post('noTlp');
            $latitude = $this->input->post('latitude');
            $longitude = $this->input->post('longitude');
            $kategoriTempat = $this->input->post('kategoriTempat');
            
            $lokasiEmergency = array(
                'idLokasiEmergency'=>$idLokasiEmergency,
                'namaLokasi'=> $namaLokasi,
                'alamatLokasi'=>$alamatLokasi,
                'noTlp'=> $noTlp, 
                'latitude'=> $latitude,
                'longitude'=> $longitude,
                'idKategoriTempat'=>$kategoriTempat
                
                
            );
            $this->LokasiEmergencyModel->update($idLokasiEmergency,$lokasiEmergency);
           
        }
        
        function getInformationLocation(){
            $dataLocation= $this->LokasiEmergencyModel->getLokasiEmergencyAll();
            

            
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
}
