<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Tujuan extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data jnecounter
    function index_get() {
      $idCabang = $this->get('idCabang');
       $this->db->select('*');
       $this->db->from('cabang');
      $this->db->where_not_in('idCabang', $idCabang);
        $jnecounter = $this->db->get()->result();
        $this->response($jnecounter, 200);
    }
}