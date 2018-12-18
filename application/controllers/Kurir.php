<?php

require APPPATH . '/libraries/REST_Controller.php';

class Kurir extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
	}

	// show data mahasiswa
	function index_get() {
		$idCabang = $this->get('idCabang');
		if ($idCabang== '') {
			$stok = $this->db->get('kurir')->result();
		} else {
			$this->db->where('idCabang', $idCabang);
			$stok = $this->db->get('kurir')->result();
		}
		$this->response($stok, 200);
	}

	// insert new data to mahasiswa
	function index_post() {	
		$data = array(
					'idCabang' 		=> $this->post('idCabang'),
					'nama' 		=> $this->post('nama'),
					'nik' 		=> $this->post('nik'),
					'alamat' => $this->post('alamat'),
					'jenisKelamin'			=> $this->post('jenisKelamin'),
					'telepon' => $this->post('telepon'));
			
		$insert = $this->db->insert('kurir', $data);

		if ($insert) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

	// update data mahasiswa
	function index_put() {
		$idKurir = $this->put('idKurir');
		$data = array(
					'idCabang' 		=> $this->put('idCabang'),
					'nama' 		=> $this->put('nama'),
					'nik' 		=> $this->put('nik'),
					'alamat' =>$this->put('alamat'),
					'jenisKelamin'	=> $this->put('jenisKelamin'),
					'telepon' => $this->put('telepon'));
			
		$this->db->where('idKurir', $idKurir);
		$update = $this->db->update('kurir', $data);

		if ($update) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

	// delete data mahasiswa
	function index_delete() {
		$idKurir = $this->delete('idKurir');
		$this->db->where('idKurir', $idKurir);
		$delete = $this->db->delete('kurir');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

}

/* End of file mahasiswa.php */
/* Location: ./application/controllers/mahasiswa.php */