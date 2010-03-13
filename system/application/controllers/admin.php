<?php

class Admin extends Controller {

	function Admin()
	{
		parent::Controller();	
		
		

		if(($this->session->userdata('user')=="") or ($this->session->userdata('type')!=1))
		{
			header('Location:'.$this->config->item('base_url').'/index.php/usr/login');

		}
	}
	
	function index()
	{
		$this->load->model('Blog');
		$data['query']=$this->Blog->get_last_entries();
		$data['title']="Admin";
		$data['base']=$this->config->item('base_url');
		$this->load->view("admin_header",$data);
		$this->load->view("admin_home",$data);
		$this->load->view("admin_footer",$data);
		
	}

        
	
	function edit()
	{
		$post_id=$this->uri->segment(3);
		$this->load->model('Blog');
		$data['query']=$this->Blog->get_post($post_id);
		$data['title']="Edit";
		$data['base']=$this->config->item('base_url');
		$this->load->view("admin_header",$data);
		$this->load->view("admin_edit",$data);
		$this->load->view("admin_footer",$data);

		
	}
	
	function update()
	{
		$post_id=$_POST['id'];
		$title=$_POST['title'];
		$body=$_POST['body'];
		$this->load->model('Blog');
		$this->Blog->update($post_id,$title,$body);
		$this->load->model("Rss");
		$this->Rss->makerss();
		echo "Update Completed";
		
	}
	
	function new_post()
	{
		$data['title']="New Post";
		$data['base']=$this->config->item('base_url');
		$data['usr']=$this->session->userdata('user');
		$this->load->view("admin_header",$data);
		$this->load->view("admin_new",$data);
		$this->load->view("admin_footer",$data);	
	}
	
	function add_new()
	{
		$this->load->model("Blog");
		$this->Blog->set_post($_POST);
		
		$data['title']="Add New Post";
		$data['base']=$this->config->item('base_url');
		$this->load->view('header',$data);
		$data['link']=$data['base']."/index.php/admin";
		$data['txt']="Completed Add New Post";
		
		$this->load->model("Rss");
		$this->Rss->makerss();


		$this->load->view('redirect',$data);

	}
	
	function delete_post()
	{
		$this->load->model("Blog");
		$this->Blog->delete_post($_POST);
		
		$this->load->model("Rss");
		$this->Rss->makerss();
		echo "Complete Deleted";
	}
	
	
}