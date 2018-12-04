<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class KirimSukses extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data jnecounter
    function index_get() {
        $idCabang = $this->get('idCabang');
        if ($idCabang == '') {
            $jnecounter = $this->db->get('pengiriman')->result();

        } else {
            $this->db->select('*');
            $this->db->from('pengiriman');
            $this->db->join('jenis', 'pengiriman.idJenis = jenis.idJenis', 'left');
            $this->db->where('idCabang', $idCabang);
            $this->db->where('status',"Delivered");
            $jnecounter = $this->db->get('')->result();
        }
        $this->response($jnecounter, 200);
    }

    function index_delete() {
        $noResi = $this->delete('noResi');
        $this->db->where('noResi', $noResi);
        $delete = $this->db->delete('pengiriman');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    //Masukan function selanjutnya disini
}
?>