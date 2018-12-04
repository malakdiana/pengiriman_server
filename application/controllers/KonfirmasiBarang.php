<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class KonfirmasiBarang extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data jnecounter
    function index_get() {
        $asal = $this->get('asal');
        if ($asal == '') {
            $jnecounter = $this->db->get('kirim')->result();

        } else {
            $this->db->select('*,kirim.status as statuskirim');
            $this->db->from('kirim');
            $this->db->join('cabang', 'kirim.asal = cabang.idCabang');
            $this->db->join('kurir', 'kirim.idKurir = kurir.idKurir');
            $this->db->join('pengiriman', 'kirim.noResi = pengiriman.noResi');
            $this->db->where('tujuan', $asal);
            $this->db->where('asal',$asal);
            $this->db->where('kirim.status', "On Process");
            $jnecounter = $this->db->get('')->result();
        }
        $this->response($jnecounter, 200);
    }

    function index_post() {
        $data=array(
                'noResi' => $this->input->post('noResi'),
                'asal' => $this->input->post('asal'),
                'tujuan' => $this->input->post('tujuan'),
                'tanggal' => $this->input->post('tanggal'),
                'idKurir' => $this->input->post('idKurir'),
                'status' => $this->input->post('status'),
                );
        $insert = $this->db->insert('kirim', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_put() {
        $idPengiriman = $this->put('idPengiriman');
     $data=array(
                'noResi' => $this->input->put('noResi'),
                'asal' => $this->input->put('asal'),
                'tujuan' => $this->input->put('tujuan'),
                'tanggal' => $this->input->put('tanggal'),
                'idKurir' => $this->input->put('idKurir'),
                'status' => $this->input->put('status'),
                );
        $this->db->where('idPengiriman', $idPengiriman);
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