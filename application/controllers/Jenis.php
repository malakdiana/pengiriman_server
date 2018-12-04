<?php

require APPPATH . '/libraries/REST_Controller.php';

class Jenis extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
	}

	// show data mahasiswa
	function index_get() {
		$idJenis = $this->get('idJenis');
		if ($idjenis== '') {
			$stok = $this->db->get('jenis')->result();
		} else {
			$this->db->where('idJenis', $idJenis);
			$stok = $this->db->get('jenis')->result();
		}
		$this->response($stok, 200);
	}

	// insert new data to mahasiswa
	function index_post() {
		

		$data = array(
					'idCabang' 		=> $this->post('idCabang'),
					'jenis'	=> $this->post('jenis'),
					'harga'			=> $this->post('harga'));
			
		$insert = $this->db->insert('jenis', $data2);

		if ($insert) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

	// update data mahasiswa
	function index_put() {
		$idjenis = $this->put('idJenis');
		$data = array(
					'idCabang' 		=> $this->put('idCabang'),
					'jenis'	=> $this->put('jenis'),
					'harga'			=> $this->put('harga'));
			
		$this->db->where('idJenis', $idjenis);
		$update = $this->db->update('jenis', $data);

		if ($update) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

	// delete data mahasiswa
	function index_delete() {
		$idjenis = $this->delete('idJenis');
		$this->db->where('idJenis', $idjenis);
		$delete = $this->db->delete('jenis');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

}

/* End of file mahasiswa.php */
/* Location: ./application/controllers/mahasiswa.php */