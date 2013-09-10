<?php

class Brands extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//Load Items Model
	}
	
	//Deault function that runs when controller calls
	public function index()
	{
	        $config = array();

	        $config["base_url"] = site_url('brands/index');
	        
			$config["total_rows"] = $this->brand_model->brands_count();
	        
			$config["per_page"] = 10;
	        $config["uri_segment"] = 3;
	 		
	        $this->pagination->initialize($config);
	 		
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        
			$data["results"] = $this->brand_model->brands($config["per_page"], $page,"desc");
	        
			$data["links"] = $this->pagination->create_links();
			
			$this->load->view("header");
	        $this->load->view("brands", $data);
			$this->load->view("footer");
	}
	
	//Function to delete particular brand 
	function delete($id){
		$this->brand_model->delete($id);
	}
	
	//Function to add brand 
	function add()
	{	
		if($this->input->post('submit'))
		{
			$data['name'] = $_POST['name'];
			
			if($this->input->post('action') != '0')
			{
				$id = $this->input->post('action');
				$this->brand_model->update($data,$id);
				$data['action'] = $this->input->post('action');
				$data['id'] = $id;
				$data['brand'] = $this->brand_model->get_brand($data['id']);
				$data['item_count'] = $this->items_model->item_count_by_brand($data['id']);
				$data['model_count'] = $this->model_model->model_counts($data['id']);
				$this->load->view('add_brand_row',$data);
			}
			else
			{
				$this->brand_model->add($data);
				$data['action'] = $this->input->post('action');
				$data['id'] = $this->brand_model->get_last_id();
				$data['brand'] = $this->brand_model->get_brand($data['id']);
				$data['item_count'] = $this->items_model->item_count_by_brand($data['id']);
				$data['model_count'] = $this->model_model->model_counts($data['id']);
				$this->load->view('add_brand_row',$data);
			}
		}
		else
		{
			$this->load->view('add_brand');
		}
	}
	
	//Function to edit particular brand
	function edit($id){
			$brand = $this->brand_model->get_brand($id);
			$data['brand'] = $brand;
			$data['id'] = $id;
			$this->load->view('edit_brand',$data);
	}
}
?>