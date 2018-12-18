<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class EditPengiriman extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data jnecounter
    function index_get() {
        $noResi = $this->get('noResi');
     
            $this->db->select('*');
            $this->db->from('pengiriman');
                      $this->db->join('jenis', 'pengiriman.idJenis = jenis.idJenis', 'left');
            $this->db->where('noResi', $noResi);
            $jnecounter = $this->db->get('')->result();
        
        $this->response($jnecounter, 200);
    }

    
    function index_put() {
    $noResi = $this->put('noResi');
      $data = array(
                 'pengirim' => $this->put('pengirim'),
                 'alamatPengirim' => $this->put('alamatPengirim'),
                 'teleponPengirim' => $this->put('teleponPengirim'),
                 'penerima' => $this->put('penerima'),
                 'alamatPenerima' => $this->put('alamatPenerima'),
                 'teleponPenerima' => $this->put('teleponPenerima'),
                 'Tanggal' => $this->put('Tanggal'),
                 'jenisBarang' => $this->put('jenisBarang'),
                 'berat' => $this->put('berat'),
                 'idCabang' => $this->put('idCabang'),
                 'idJenis' => $this->put('idJenis'),
                     'totalHarga' => $this->put('totalHarga'),
                 'namaPenerima' =>$this->put('namaPenerima'),
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