<?php

require APPPATH . '/libraries/REST_Controller.php';

class Jenis extends REST_Controller {

	function __construct($config = 'rest') {
		parent::__construct($config);
	}

	// show data mahasiswa
	function index_get() {	
		$stok = $this->db->get('jenis')->result();
		$this->response($stok, 200);
	}

	// insert new data to mahasiswa


}

/* End of file mahasiswa.php */
/* Location: ./application/controllers/mahasiswa.php */