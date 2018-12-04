<?php

require APPPATH . '/libraries/REST_Controller.php';

class Cabang extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
	}

	// show data mahasiswa
	function index_get() {
		$idCabang = $this->get('idCabang');
		if ($idCabang== '') {
			$stok = $this->db->get('cabang')->result();
		} else {
			$this->db->where('idCabang', $idCabang);
			$stok = $this->db->get('cabang')->result();
		}
		$this->response($stok, 200);
	}

	// insert new data to mahasiswa
	function index_post() {
		

		$data = array(
					'username' 		=> $this->post('username'),
					'password' 		=> $this->post('password'),
					'kota'			=> $this->post('kota'),
					'telepon' => $this->post('telepon'));
			
		$insert = $this->db->insert('cabang', $data2);

		if ($insert) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

	// update data mahasiswa
	function index_put() {
		$idCabang = $this->put('idCabang');
		$data = array(
					'username'	=> $this->put('username'),
					'password'	=> $this->put('password'),
					'kota'			=> $this->put('kota'),
					'telepon' => $this->put('telepon'));
			
		$this->db->where('idCabang', $idCabang);
		$update = $this->db->update('cabang', $data);

		if ($update) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

	// delete data mahasiswa
	function index_delete() {
		$idCabang = $this->delete('idCabang');
		$this->db->where('idCabang', $idCabang);
		$delete = $this->db->delete('cabang');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

}

/* End of file mahasiswa.php */
/* Location: ./application/controllers/mahasiswa.php */