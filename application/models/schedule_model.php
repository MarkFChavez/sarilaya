<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class schedule_model extends CI_Model{

		public function get_schedule($id)
		{
			$this->db->where('teacher_id',$id);

			$query = $this->db->get('schedule_tbl');

			return $query->result();
		}

		public function insert($data)
		{
			return $this->db->insert('schedule_tbl',$data);
		}
	}	