<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Server extends CI_Controller {
	public function index(){
		$this->load->model('Pengiriman');
		$data['pengiriman'] = $this->Pengiriman->pengirimantoday();
		$data['jumlah'] = $this->Pengiriman->jmlpengirimantoday();
		$data['sukses'] = $this->Pengiriman->kirimsukses();
		$data['admin'] = $this->Pengiriman->totalAdmin();
		$data['cabang'] = $this->Pengiriman->totalCabang();
		$data['kurir'] = $this->Pengiriman->totalKurir();
		$data['tpengiriman'] = $this->Pengiriman->totalPengiriman();
		$this->load->view('header');
		$this->load->view('index',$data);

	}

		public function getCabang(){
			$this->load->model('Pengiriman');
			$data['cabang'] = $this->Pengiriman->getcabang();
			$this->load->view('header');
			$this->load->view('cabang', $data);

		}
		public function getJenis(){
			$this->load->model('Pengiriman');
			$data['jenis'] = $this->Pengiriman->getjenis();
			$this->load->view('header');
			$this->load->view('jenis', $data);

		}
		public function getAdmin(){
			$this->load->model('Pengiriman');
			$data['admin'] = $this->Pengiriman->getadmin();
			$this->load->view('header');
			$this->load->view('admin', $data);

		}
		public function getPengiriman($idcabang){
			$this->load->model('Pengiriman');
			$data['pengiriman'] = $this->Pengiriman->getpengiriman($idcabang);
			$this->load->view('header');
			$this->load->view('pengiriman', $data);
		}
		public function getKurir($idcabang){
			$this->load->model('Pengiriman');
			$data['kurir'] = $this->Pengiriman->getkurir($idcabang);
			$this->load->view('header');
			$this->load->view('kurir', $data);
		}

		public function updateCabang(){
			$this->load->model('Pengiriman');
			$this->Pengiriman->updatecabang();
			redirect('Server/getCabang','refresh');
		}

		public function updateJenis(){
			$this->load->model('Pengiriman');
			$this->Pengiriman->updatejenis();
			redirect('Server/getJenis','refresh');
		}

		public function deleteCabang($id){
			$this->load->model('Pengiriman');
			$this->Pengiriman->deletecabang($id);
			redirect('Server/getCabang','refresh');
		}

		public function deleteJenis($id){
			$this->load->model('Pengiriman');
			$this->Pengiriman->deletejenis($id);
			redirect('Server/getJenis','refresh');
		}
}