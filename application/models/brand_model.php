<?php
	class Brand_model extends CI_Model{
		
		public function __construct(){
			parent::__construct();
			//Load Database
		}
	
		//Function to get only brand name via id
		public function get_brand($id) {
	        $this->db->select('name');
			$this->db->where('brand_id',$id);
			$query = $this->db->get('brands');
			$query = $query->row();
			if($query){
				return $query->name;
			} else {
				return false;
			}
	    }
		
		//Function to get brand name via id
		public function get_this_brand($id) {
	        $this->db->select('name');
			$this->db->where('brand_id',$id);
			$query = $this->db->get('brands');
			$query = $query->row();
			if($query){
				return $query;
			} else {
				return false;
			}
	    }
		
		//Function to get all brands
		public function get_all_brand(){
			$this->db->select('brand_id,name');
			$query = $this->db->get('brands');
			if($query){
				foreach($query->result() as $value){
					$data[$value->brand_id] = $value->name;
				}
				return $data;
			} else {
				return false;
			}
		}
		
		//Function to get all brands according to limits
		public function brands($limit, $start,$sort) {
	        $this->db->limit($limit, $start);
			$this->db->order_by("brand_id", $sort);
	        $query = $this->db->get("brands");
	 
	        if ($query->num_rows() > 0) {
	            foreach ($query->result() as $row) {
	                $data[] = $row;
	            }
	            return $data;
	        }
	        return false;
	   }
	   
	   //Function to add brand 
	   public function add($data){
	   		$this->db->insert("brands",$data);
	   }
		
		//Function to get count of all brands
		public function brands_count() {
	        return $this->db->count_all("brands");
	    }
		
		//Function to delete particular brand
		public function delete($id){
	   		$this->db->delete("brands",array('brand_id'=>$id));
	   }
	   
	   ///Function to update particular brand
	   public function update($data,$id){
	   		$this->db->where('brand_id', $id);
			$this->db->update('brands', $data); 
	   }
	   
	   //Function to get last inserted brand
	   public function get_last_id(){
	   		$this->db->order_by('brand_id','desc');
	   		$query = $this->db->get('brands');
			$q = $query->row();
			return $q->brand_id;
	   }
	}
?>