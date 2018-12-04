<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class BelumKirim extends REST_Controller {

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
            $this->db->where('status',"Cek");
            $jnecounter = $this->db->get('')->result();
        }
        $this->response($jnecounter, 200);
    }

    function index_post() {
        $data=array(
                'noResi' => $this->post('noResi'),
                'pengirim' => $this->post('pengirim'),
                'alamatPengirim' => $this->post('alamatPengirim'),
                'teleponPengirim' => $this->post('teleponPengirim'),
                'penerima' => $this->post('penerima'),
                'alamatPenerima' => $this->post('alamatPenerima'),
                'teleponPenerima' => $this->post('teleponPenerima'),
                'Tanggal' => $this->post('Tanggal'),
                'jenisBarang' => $this->post('jenisBarang'),
                'berat' => $this->post('berat'),
                'idCabang' => $this->post('idCabang'),
                'idJenis' => $this->post('idJenis'),
                'status' => $this->post('status'),
                'totalHarga' => $this->post('totalHarga'),
                'namaPenerima' =>$this->post('namaPenerima')
                );
        $insert = $this->db->insert('pengiriman', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_put() {
    $noResi = $this->put('noResi');
      $data = array(
                // 'pengirim' => $this->put('pengirim'),
                // 'alamatPengirim' => $this->put('alamatPengirim'),
                // 'teleponPengirim' => $this->put('teleponPengirim'),
                // 'penerima' => $this->put('penerima'),
                // 'alamatPenerima' => $this->put('alamatPenerima'),
                // 'teleponPenerima' => $this->put('teleponPenerima'),
                // 'Tanggal' => $this->put('Tanggal'),
                // 'jenisBarang' => $this->put('jenisBarang'),
                // 'berat' => $this->put('berat'),
                // 'idCabang' => $this->put('idCabang'),
                // 'idJenis' => $this->put('idJenis'),
                // 'namaPenerima' =>$this->put('namaPenerima'),
                'status' => $this->put('status'));
        $this->db->where('noResi', $noResi);
        $update = $this->db->update('pengiriman', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
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