<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class HargaPengiriman extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data jnecounter
    function index_get() {
         $idCabang = $this->get('idCabang');
         $tujuan = $this->get('tujuan');
         $jenis= $this->get('jenis');
         if($idCabang==$tujuan){
            $this->db->select('harga, idJenis');
            $this->db->from('jenis');
            $this->db->where('jenis',$jenis);
            $this->db->where('keterangan',"Dalam Cabang");
             $jnecounter = $this->db->get()->result();
           
         }else{
            $this->db->select('harga , idJenis');
            $this->db->from('jenis');
            $this->db->where('jenis',$jenis);
            $this->db->where('keterangan',"Luar Cabang");
             $jnecounter = $this->db->get()->result();
            
         }
         $this->response($jnecounter, 200);
    }
}