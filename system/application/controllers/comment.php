<?php

class Comment extends Controller {

	function Comment()
	{
		parent::Controller();	
	}
	
	function index()
	{

	}
	
	function insert()
	{
		$this->load->model('Blog');
		$this->Blog->set_comment($_POST);
		$data['title']="Comment Inserted";
		$data['base']=$this->config->item('base_url');
		$this->load->view('header',$data);
		$data['link']=$_SERVER['HTTP_REFERER'];
		$data['txt']="Complete Comment";
		$this->load->view('redirect',$data);
		
	}
	
	function del()
	{
		$this->load->model('Blog');
		$this->Blog->delete_comment($_POST);
		echo "Complete Deleted";
		
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */