<?php

class Home extends Controller {

	function Home()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$this->load->model('Blog');
		$data['query']=$this->Blog->get_last_entries();
		
		$title=$this->config->item('site_title');
		$title.=" : ".$this->config->item('site_description');
		$data['title']=$title;
		$data['base']=$this->config->item('base_url');
		$this->load->view('header',$data);
		$this->load->view('list',$data);
	}
	
	function view()
	{
		$post_id= $this->uri->segment(3);
		$this->load->model('Blog');
		$data['post_query']=$this->Blog->get_post($post_id);
		
		
		foreach($data['post_query'] as $row)
		{
			$data['title']=$row->title;
		}
		
		$data['comment_query']=$this->Blog->get_comment($post_id);
		$data['base']=$this->config->item('base_url');
		$this->load->view('detail',$data);

	}

        function search()
        {
            //Ajax search
            //get text with post method

            $this->load->model('Blog');
            $data['query']=$this->Blog->search($_POST['text']);
            $title=$this->config->item('site_title');
            $title.=" : ".$this->config->item('site_description');
            $data['title']=$title;
            $data['base']=$this->config->item('base_url');
           
            $this->load->view('list',$data);

            
        }
}

