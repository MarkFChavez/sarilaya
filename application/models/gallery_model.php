<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class gallery_model extends CI_Model{

		public function get_all()
		{
			$query = $this->db->get('folder_gallery');
		
			return $query->result();
		}

		public function get_id($id)
		{
			$this->db->where('gallery_id',$id);

			$query = $this->db->get('folder_gallery');

			return $query->result();
		}		

		public function update($id,$data)
		{
			$this->db->where('gallery_id',$id);

			return $this->db->update('folder_gallery',$data);
		}

		public function insert($data)
		{
			return $this->db->insert('folder_gallery',$data);
		}
	}	