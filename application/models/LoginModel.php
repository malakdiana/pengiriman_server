<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {
		public function login($username, $password){
			$this->db->select('*');
			$this->db->from('admin');
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			$query = $this->db->get();
			
			if($query->num_rows()==1){
				return $query->result();
			}
			else{
				return false;
			}


		}	
}

/* End of file user.php */
/* Location: ./application/models/user.php */