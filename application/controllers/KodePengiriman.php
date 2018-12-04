<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class KodePengiriman extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data jnecounter
    function index_get() {
       $this->db->select('noResi');
       $this->db->from('pengiriman');
       $this->db->order_by('noResi', 'desc');
       $this->db->limit(1);
        $jnecounter = $this->db->get()->result();
        $this->response($jnecounter, 200);
    }
}