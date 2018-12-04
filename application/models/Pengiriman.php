<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends CI_Model {

	public function getcabang(){
		$query = $this->db->get('cabang');
        return $query->result();
	}
	public function getjenis(){
		
        $query = $this->db->get('jenis');
            return $query->result();
	}
	public function getallpengiriman(){
		 $query = $this->db->get('pengiriman');
            return $query->result();
	}
	public function getadmin(){
		 $query = $this->db->get('admin');
            return $query->result();
	}
	public function getpengiriman($id){
		$this->db->where('idCabang', $id);
        $query = $this->db->get('pengiriman');
            return $query->result();
	}
	public function getkurir($id){
		$this->db->where('idCabang', $id);
        $query = $this->db->get('kurir');
            return $query->result();
	}
	public function pengirimantoday(){
		$today = date('Y-m-d');
		$this->db->where('tanggal', $today);
		$this->db->select('SUM(totalHarga) as total');
        $query = $this->db->get('pengiriman');
            return $query->result();
	}
	public function jmlpengirimantoday(){
		$today = date('Y-m-d');
		$this->db->where('tanggal', $today);
		$this->db->select('COUNT(*) as total');
        $query = $this->db->get('pengiriman');
            return $query->result();
	}
	public function kirimsukses(){
		$today = date('Y-m-d');
		$status ="Delivered";
		$this->db->where('tanggal', $today);
		$this->db->where('status', $status);
		$this->db->select('COUNT(*) as total');
        $query = $this->db->get('pengiriman');
            return $query->result();
	}
	public function totalAdmin(){
		$this->db->select('COUNT(*) as total');
        $query = $this->db->get('admin');
            return $query->result();
	}
	public function totalCabang(){
		$this->db->select('COUNT(*) as total');
        $query = $this->db->get('cabang');
            return $query->result();
	}
	public function totalKurir(){
		$this->db->select('COUNT(*) as total');
        $query = $this->db->get('kurir');
            return $query->result();
	}
	public function totalPengiriman(){
		$this->db->select('COUNT(*) as total');
        $query = $this->db->get('pengiriman');
            return $query->result();
	}
	public function updatecabang(){
		$id = $this->input->post('idCabang');
		$object = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'kota' => $this->upload->data('kota'), 
			'telepon' => $this->input->post('telepon'));
        $this->db->where('idCabang', $id);
        $this->db->update('cabang', $object);
	}
	public function updatejenis(){
		$id = $this->input->post('idJenis');
		$object = array(
			'idCabang' => $this->input->post('idCabang'),
			'jenis' => $this->input->post('jenis'),
			'harga' => $this->upload->data('harga'));
        $this->db->where('idJenis', $id);
        $this->db->update('jenis', $object);
	}
	public function deletejenis($id){
		$this->db->where('idJenis', $id);
        $this->db->delete('jenis');
	}
	public function deletecabang($id){
		$this->db->where('idCabang', $id);
        $this->db->delete('cabang');
	}
}