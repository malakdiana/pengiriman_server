<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class CekHarga extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data jnecounter
    function index_get() {
         $asal= $this->get('asal');
         $tujuan = $this->get('tujuan');
         $berat = $this->get('berat');
         if($asal==$tujuan){
            $this->db->select("(harga*$berat) as harga, jenis");
            $this->db->from('jenis');
            $this->db->where('keterangan',"Dalam Cabang");
             $jnecounter = $this->db->get()->result();
           
         }else{
            $this->db->select("(harga*$berat) as harga, jenis");
            $this->db->from('jenis');
            $this->db->where('keterangan',"Luar Cabang");
             $jnecounter = $this->db->get()->result();
            
         }
         $this->response($jnecounter, 200);
    }
}