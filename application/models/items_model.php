<?php
	class Items_model extends CI_Model{
		
		public function __construct(){
			parent::__construct();
			//Load Database
		}
		
		//Function to count all items
		public function items_count() {
	        return $this->db->count_all("items");
	    }
		
		//Function to gt item via id
		public function get_item($id){
			$result = $this->db->get_where("items",array("item_id"=>$id));
			$r = $result->row();
			return $r;
		}
	 
	 	//Function to get all items
		public function items($limit, $start,$sort) {
	        $this->db->limit($limit, $start);
			$this->db->order_by("item_id", $sort);
	        $query = $this->db->get("items");
	 
	        if ($query->num_rows() > 0) {
	            foreach ($query->result() as $row) {
	                $data[] = $row;
	            }
	            return $data;
	        }
	        return false;
	   }
	   
	   //Function to add items
	   public function add($data){
	   		$this->db->insert("items",$data);
	   }
	   
	   //Function to edit items
	   public function update($data,$id){
	   		$this->db->where('item_id', $id);
			$this->db->update('items', $data); 
	   }
	   
	   //Function to delete items
	   public function delete($id){
	   		$this->db->delete("items",array('item_id'=>$id));
	   }
	   
	   //Function to get last inserted item
	   public function get_last_id(){
	   		$this->db->order_by('item_id','desc');
	   		$query = $this->db->get('items');
			$q = $query->row();
			return $q->item_id;
	   }
		
	   //Function to count item according to brand 	
	   public function item_count_by_brand($brand){
		   $query = $this->db->get_where('items',array('brand_id'=>$brand));
		   return $query->num_rows();
	   }
	   
	   //Function to count item according to model
	   public function item_count_by_model($model){
		   $query = $this->db->get_where('items',array('model_id'=>$model));
		   return $query->num_rows();
	   }
	   
	}
?>