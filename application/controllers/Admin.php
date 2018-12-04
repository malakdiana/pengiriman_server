<?php

require APPPATH . '/libraries/REST_Controller.php';

class Admin extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
	}

	// show data mahasiswa
	function index_get() {
		$idAdmin = $this->get('idAdmin');
		if ($idAdmin == '') {
			$admin = $this->db->get('admin')->result();
		} else {
			$this->db->where('idAdmin', $idAdmin);
			$admin = $this->db->get('idAdmin')->result();
		}
		$this->response($admin, 200);
	}

	// insert new data to mahasiswa
	function index_post() {
		$data = array(
					'username'		=> $this->post('username'),
					'password'		=> $this->post('password'),
					'idCabang'		=> $this->post('idCabang'));
		$insert = $this->db->insert('admin', $data);
		if ($insert) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

	// update data mahasiswa
	function index_put() {
		$idAdmin = $this->put('idAdmin');
		$data = array(
					'username'		=> $this->put('username'),
					'password'		=> $this->put('password'),
					'idCabang'		=> $this->put('idCabang'));
		$this->db->where('idAdmin', $idAdmin);
		$update = $this->db->update('admin', $data);

		if ($update) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

	// delete data mahasiswa
	function index_delete() {
		$idAdmin = $this->delete('idAdmin');
		$this->db->where('idAdmin', $idAdmin);
		$delete = $this->db->delete('admin');
		if ($delete) {
			$this->response(array('status' => 'success'), 201);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}

}

/* End of file mahasiswa.php */
/* Location: ./application/controllers/mahasiswa.php */