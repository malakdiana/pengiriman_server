<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Kirim extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data jnecounter
    function index_get() {
        $idPengiriman = $this->get('idPengiriman');
        if ($idPengiriman == '') {
            $jnecounter = $this->db->get('kirim')->result();

        } else {
            $this->db->where('idPengiriman', $idPengiriman);
            $jnecounter = $this->db->get('kirim')->result();
        }
        $this->response($jnecounter, 200);
    }

    function index_post() {
        $data=array(
                'noResi' => $this->post('noResi'),
                'asal' => $this->post('asal'),
                'tujuan' => $this->post('tujuan'),
                'tanggal' => $this->post('tanggal'),
                'idKurir' => $this->post('idKurir'),
                'status' => $this->post('status'),
                );
        $insert = $this->db->insert('kirim', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_put() {
        $noResi = $this->put('noResi');
     $data=array(
                //'noResi' => $this->input->put('noResi'),
                //'asal' => $this->input->put('asal'),
                //'tujuan' => $this->input->put('tujuan'),
                //'tanggal' => $this->input->put('tanggal'),
                //'idKurir' => $this->input->put('idKurir'),
                'status' => $this->put('status'),
                );
        $this->db->where('noResi', $noResi);
        $update = $this->db->update('kirim', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {
        $idPengiriman = $this->delete('idPengiriman');
        $this->db->where('idPengiriman', $idPengiriman);
        $delete = $this->db->delete('kirim');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    //Masukan function selanjutnya disini
}
?>