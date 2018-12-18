<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Lokasi extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }
     function index_get() {
    
        $noResi = $this->get('noResi');
        if ($noResi == '') {
            $jnecounter = $this->db->get('kirim')->result();

        }
        else{
        	 $this->db->select('kirim.noResi, c.kota as asal, d.kota as tujuan ,kirim.tanggal, kurir.nama, kirim.status, pengiriman.alamatPenerima,pengiriman.namaPenerima');
            $this->db->from('kirim');
            $this->db->join('cabang c', 'c.idCabang = kirim.asal', 'left');
            $this->db->join('cabang d', 'd.idCabang = kirim.tujuan', 'left');
            $this->db->join('kurir', 'kurir.idKurir = kirim.idKurir', 'left');
            $this->db->join('pengiriman', 'pengiriman.noResi = kirim.noResi', 'left');
            $this->db->where('kirim.noResi', $noResi);
            $jnecounter = $this->db->get('')->result();
        }
         $this->response($jnecounter, 200);

}
}
?>