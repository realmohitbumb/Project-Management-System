<?php
	class Model_model extends CI_Model{
		
		public function __construct(){
			parent::__construct();
			//Load Database
		}
	
		//Function to get particular model name via id
		public function get_model($id) {
	        $this->db->select('name');
			$this->db->where('model_id',$id);
			$query = $this->db->get('models');
			$query = $query->row();
			if($query){
				return $query->name;
			} else {
				return false;
			}
	    }
		
		//Function to get particular model all column via id
		public function get_this_model($id) {
	        $this->db->select('*');
			$this->db->where('model_id',$id);
			$query = $this->db->get('models');
			$query = $query->row();
			if($query){
				return $query;
			} else {
				return false;
			}
	    }
		
		//Function to update particular model
		public function update($data,$id){
	   		$this->db->where('model_id', $id);
			$this->db->update('models', $data); 
	   }
		
		//Function to get all models according to brand id
		public function get_all_model($brand=false){
			if($brand==false){
				return false;
			}
			$this->db->select('model_id,name');
			$this->db->where('brand_id',$brand);
			$query = $this->db->get('models');
			if($query){
				foreach($query->result() as $value){
					$data[$value->model_id] = $value->name;
				}
				return $data;
			} else {
				return false;
			}
		}
		
		public function get_brand_model($brand_id)
		{
			$this->db->select('model_id,name');
			$this->db->where('brand_id',$brand_id);
			$query = $this->db->get('models');
			return $query->result();
		} 
		
		//Function to get models count according to brand
		public function model_counts($brand){
			$query = $this->db->get_where('models',array('brand_id'=>$brand));
			return $query->num_rows();
		}
		
		//Function to delete particular model
		public function delete($id){
	   		$this->db->delete("models",array('model_id'=>$id));
	   }
		
		//Function to get models according to limit and sort
		public function models($limit, $start,$sort) {
	        $this->db->limit($limit, $start);
			$this->db->order_by("model_id", $sort);
	        $query = $this->db->get("models");
	 
	        if ($query->num_rows() > 0) {
	            foreach ($query->result() as $row) {
	                $data[] = $row;
	            }
	            return $data;
	        }
	        return false;
	   }
		
		//Function to get total count of model
		public function mod_count() {
	        return $this->db->count_all("models");
	    }
		
		//Function to add model
		public function add($data){
	   		$this->db->insert("models",$data);
	   }
	   
	   //Function to get last inserted model
	   public function get_last_id(){
	   		$this->db->order_by('model_id','desc');
	   		$query = $this->db->get('models');
			$q = $query->row();
			return $q->model_id;
	   }
	}
?>