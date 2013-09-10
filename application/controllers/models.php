<?php

class Models extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Items Model
	}
	
	//Deault function that runs when controller calls 
	public function index()
	{
	        $config = array();
	        $config["base_url"] = site_url('models/index');
	        $config["total_rows"] = $this->model_model->mod_count();
	        $config["per_page"] = 10;
	        $config["uri_segment"] = 3;
	 
	        $this->pagination->initialize($config);
	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data["results"] = $this->model_model->models($config["per_page"], $page,"desc");
	        $data["links"] = $this->pagination->create_links();
			$this->load->view("header");
	        $this->load->view("models", $data);
			$this->load->view("footer");
	}
	
	//Function to delete particular model
	function delete($id){
		$this->model_model->delete($id);
	}
	
	//Functiion to add model
	function add()
	{	
		if($this->input->post('submit'))
		{
			$data['name'] = $this->input->post('name');
			$data['brand_id'] = $this->input->post('brand');
				
			if($this->input->post('action') != '0')
			{
				$id = $this->input->post('action');
				$this->model_model->update($data,$id);
				$model = $this->model_model->get_this_model($id);
				$data['action'] = $this->input->post('action');
				$data['id'] = $id;
				$data['model_name'] = $model->name;
				$data['brand_name'] = $this->brand_model->get_brand($model->brand_id);
				$data['item_count'] = $this->items_model->item_count_by_model($id);
				$this->load->view('add_model_row',$data);
			}
			else
			{
				$this->model_model->add($data);
				$data['id'] = $this->model_model->get_last_id();
				$model = $this->model_model->get_this_model($data['id']);
				$data['action'] = $this->input->post('action');
				$data['model_name'] = $model->name;
				$data['brand_name'] = $this->brand_model->get_brand($model->brand_id);
				$data['item_count'] = $this->items_model->item_count_by_model($data['id']);
				$this->load->view('add_model_row',$data);
			}
		}
		else
		{
			$brand = $this->brand_model->get_all_brand();
			
			if($brand)
			{
				$data['brand'] = $brand;
				$this->load->view('add_model',$data);	
			}
		}	
	}
	
	//Funtion to edit particular model
	function edit($id)
	{
		$model = $this->model_model->get_this_model($id);
		$brand = $this->brand_model->get_all_brand();
		$data['name'] = $model->name;
		$data['id'] = $id;
		
		if($brand)
		{
			$data['brand'] = $brand;
			$this->load->view('edit_model',$data);
		}
	}
	
	//Function to get all models according to brand
	function select_models()
	{
		$id = $this->input->post('id');
		$data['result'] = $this->model_model->get_brand_model($id);
		$this->load->view('brands_models',$data);
	}
}
?>