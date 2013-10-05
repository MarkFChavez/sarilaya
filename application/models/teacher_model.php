<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class teacher_model extends CI_Model{

		public function get_active()
		{
			$this->db->where('teacher_active',1);

			$query = $this->db->get('teacher_tbl');

			return $query->result();
		}

		public function get_new()
		{
			$this->db->where('teacher_active',0);

			$query = $this->db->get('teacher_tbl');

			return $query->result();
		}

		public function insert($data)
		{
			return $this->db->insert('teacher_tbl',$data);
		}

		public function delete($id)
		{
			$this->db->where('teacher_id',$id);

			return $this->db->delete('teacher_tbl');
		}

		public function update($id,$data)
		{
			$this->db->where('teacher_id',$id);

			return $this->db->update('teacher_tbl',$data);
		}

		public function get_user($id)
		{	
			$this->db->where('teacher_id',$id);

			$query = $this->db->get('teacher_tbl');

			return $query->result();
		}
	}