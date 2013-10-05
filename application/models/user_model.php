<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class user_model extends CI_Model{

		public function check_user($username,$password)
		{
			$this->db->where('user_name',$username);
			$this->db->where('user_password',$password);

			$query = $this->db->get('users');

			if($query->num_rows() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function update($username,$data)
		{
			$this->db->where('user_name',$username);

			return $this->db->update('users',$data);
		}
	}