<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LokasiEmergencyController extends CI_Controller {

   

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
         * 
         * 
	 */
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
                $tempat['session']=$this->session->userdata('Nama');
		$this->load->view('admin/TambahLokasiEmergencyView',$tempat);
                
              
               
            
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
            $this->load->view('admin/TambahLokasiEmergencyView');
        }
        
        function getOpenEdit($idLokasiEmergency=''){
                
                $lokasiEmergency['result'] = $this->LokasiEmergencyModel->getLokasiEmergencyById($idLokasiEmergency);
                $lokasiEmergency['result_KategoriTempat'] =$this->KategoriTempatModel->getDataKategoriTempat()->result();
                $lokasiEmergency['session']=$this->session->userdata('Nama');
                $this->load->view('admin/UpdateLokasiEmergencyView',$lokasiEmergency);
               
                
                
            
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
         function deleteLokasiEmergency(){
            $idLokasiEmergencyHapus = $this->input->post('idLokasiEmergencyHapus');
            $status = '0';
            $lokasiEmergency = array(
                'idLokasiEmergency'=>$idLokasiEmergencyHapus,
                'status'=>$status 
            );
            $this->LokasiEmergencyModel->deleteLokasiEmergency($idLokasiEmergencyHapus,$lokasiEmergency);
           
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