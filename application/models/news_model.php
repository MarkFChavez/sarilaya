<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class news_model extends CI_Model{
		public function get_all() {
			$query = $this->db->get('news');
			return $query->result();
		}

		public function delete_news($id) {
			$this->db->where("news_id", $id);
			return $this->db->delete("news");
		}

		public function get_news($id) {
			$this->db->where("news_id", $id);
			$query = $this->db->get("news");

			return $query->result();
		}

		public function update($id,$data)
		{
			$this->db->where('news_id',$id);

			return $this->db->update('news',$data);
		}

		public function insert($data)
		{
			return $this->db->insert('news',$data);
		}
	}
