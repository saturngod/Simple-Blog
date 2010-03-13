<?php
class Blog extends Model {

	var $title="";
	var $content="";
	var $date="";
    function Model_name()
    {
        parent::Model();
    }
    
    function get_last_entries()
    {
    	$this->db->order_by('post_id desc');
    	$query=$this->db->get('post',10);
    	return $query->result();
    }
    
    function get_post($id)
    {
    	$this->db->where('post_id',$id);
    	$query=$this->db->get('post');
    	return $query->result();
    }
    
    function get_comment($id)
    {
    	$this->db->where('post_id',$id);
    	$query=$this->db->get('comment');
    	return $query->result();
    }
    
    function set_comment($data)
    {
		foreach($data as $key => $value)
		{
			//Fixed For XSS
			$data[$key]=str_replace('<script>','&lt;script&gt;',$data[$key]);
			$data[$key]=str_replace('</script>','&lt;/script&gt;',$data[$key]);
		}
				
    	$this->db->insert('comment',$data);    	
    }
    
    function set_post($data)
    {
		foreach($data as $key => $value)
		{
			//Fixed For XSS
			$data[$key]=str_replace('<script>','&lt;script&gt;',$data[$key]);
			$data[$key]=str_replace('</script>','&lt;/script&gt;',$data[$key]);
		}
		
    	$this->db->insert('post',$data);
    	
    }
    
     function delete_post($data)
    {
		$this->db->delete('post',$data);    	
    }
    
	function delete_comment($data)
    {
		$this->db->delete('comment',$data);    	
    }

    function get_comment_count($id)
	{
		$this->db->where("post_id",$id);
		$query=$this->db->get("comment");
		return $query->num_rows();
	}


    function logout($data)
    {
        $array_items = array('username' => '', 'type' => '', 'logged_in' => false);
        $this->session->unset_userdata($array_items);
        header("Location:".$data['base']."/index.php/usr/login");
    }

    function search($text)
    {
        $this->db->like('title',$text);
        $query=$this->db->get("post",10);
        return $query->result();
    }

    
    function login($data)
    {
    

	    $this->db->where('username',$data['username']);
		$this->db->where('password',MD5($data['pwd']));
		$query=$this->db->get('user');
		if ($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
			{
				$arr = array(
	                   'user'  => $row->username,
	                   'type'     => $row->type,
	                   'logged_in' => TRUE
	               );
				$this->session->set_userdata($arr);
			}
			
			header("Location:".$data['base']."/index.php/admin/");
		}
		else
		{
			$data['title']="Login";
			$data['base']=$this->config->item('base_url');
			$data['err']=true;
			$this->load->view('header',$data);
			$this->load->view('login',$data);
		}
    }
    
    function update($id,$title,$body)
    {
    	$data=array(
    			'title' => $title,
    			'body' => $body
    			);
    	$this->db->where('post_id', $id);
    	$this->db->update('post',$data);
    	
    }

}
?>