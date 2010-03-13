<?php

class Usr extends Controller {

	function Usr()
	{
		parent::Controller();	
		
		
	}
	
	function index()
	{

	}
	
	
	
	function login()
	{
		$data['title']="Login";
		$data['base']=$this->config->item('base_url');
		$data['err']=false;
		$this->load->view('header',$data);
		$this->load->view('login',$data);		
	}

        function logout()
        {
                $data['base']=$this->config->item('base_url');
                $this->load->model("Blog");
                $this->Blog->logout($data);

        }
	
	function logincheck()
	{
	
		$data['base']=$this->config->item('base_url');
		$data['username']=$_POST['username'];
		$data['pwd']=$_POST['pwd'];
		
		$this->load->model('Blog');
		
		$this->Blog->login($data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */