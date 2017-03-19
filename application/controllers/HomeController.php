<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HomeController extends CI_Controller {
        
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
                $this->load->library('pagination');
		          $this->load->helper(array('url','form'));
                
                $this->load->library('session');
                  $this->load->model('LokasiEmergencyModel','',TRUE);
              
        }  
	public function index($id=NULL){
                
                $jml = $this->db->get('lokasiemergency');
                $config['base_url'] = base_url().'HomeController/index';
                $config['total_rows'] = $jml->num_rows();
                $config['per_page'] = '10';
                $config['first_page'] = 'Awal';
                $config['last_page'] = 'Akhir';
                $config['next_page'] = '&laquo;';
                $config['prev_page'] = '&raquo;';
                
                 $this->pagination->initialize($config);

                $dataLokasi['halaman']= $this->pagination->create_links();
                $dataLokasi['result_data']= $this->LokasiEmergencyModel->getLokasiEmergencyAllOrderBy($config['per_page'], $id);
                $dataLokasi['session']=$this->session->userdata('Nama');
                $this->load->view('admin/map',$dataLokasi);
                
                
	}
        
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */