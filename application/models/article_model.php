<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class article_model extends CI_Model{
		
		public function get_all()
		{
			$query = $this->db->get('article');
		
			return $query->result();
		}

		public function record_count()
		{
			return $this->db->count_all('article');
		}

		public function get_given($offset)
		{
			$query = "SELECT * FROM `article`
			ORDER BY `article_cremod` desc
			LIMIT $offset, 5";
			
			$result = $this->db->query($query);
			
			return $result->result();				
		}

		public function get_active()
		{
			$this->db->where('article_isActive',1);
		
			$query = $this->db->get('article');

			return $query->result();
		}

		public function update($id,$data)
		{
			$this->db->where('article_id',$id);

			return $this->db->update('article',$data);
		}

		public function insert($data)
		{
			return $this->db->insert('article',$data);
		}

		public function get_id($id)
		{
			$this->db->where('article_id',$id);

			$query = $this->db->get('article');

			return $query->result();
		}
	}	