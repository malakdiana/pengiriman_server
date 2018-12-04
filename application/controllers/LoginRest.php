<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class LoginRest extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data jnecounter
    function index_get() {
        $username = $this->get('username');
        $password = $this->get('password');
       
            $this->db->select('*');
            $this->db->from('cabang');
          
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            $jnecounter = $this->db->get('')->result();
        
        $this->response($jnecounter, 200);
    }

    //Masukan function selanjutnya disini
}
?>