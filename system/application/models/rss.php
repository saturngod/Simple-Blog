<?php
class Rss extends Model {

	
    function Rss()
    {
        parent::Model();
    }
    
	function makerss()
	{
	
		$this->load->helper('file'); // Use for writing .rss file

    	
    	$title=$this->config->item('site_title');
    	$base=$this->config->item('base_url');
    	$description=$this->config->item('site_description');
    	$path=$this->config->item('site_path');

    	$feed ="<?xml version='1.0' encoding='utf-8'?>\n";
    	$feed.= "<rss version='2.0'>\n<channel>\n";
    	$feed.="<title>".$title."</title>\n";
		$feed.="<link>".$base."</link>\n";
		$feed.="<description>".$description."</description>\n";
		$feed.="<lastBuildDate>".date("M d Y h:m:s")."</lastBuildDate>\n";
		$feed.="<language>en-us</language>\n";
		
		
		
		$this->db->order_by('post_id desc');
    	$query=$this->db->get('post',10);

		$count=0;
		foreach($query->result() as $row)
		{
			
			$feed.="<item>\n";
			$escape= str_replace("<","&lt;",$row->title);
			$escape.= str_replace(">","&gt;",$escape);
			$feed.="<title>".$escape."</title>\n";
			$feed.="<link>".$base."/home/view/".$row->post_id."</link>\n";
			$feed.="<guid>".$base."/home/view/".$row->post_id."</guid>\n";
			$feed.="<pubDate>".$row->date."</pubDate>\n";
			$escape= str_replace("<","&lt;",$row->body); //fixed for XML
			$escape.= str_replace(">","&gt;",$escape); //fixed for XML
			$feed.="<description>".$escape."</description>\n";
			$feed.="</item>/n";
			
		
		}
		
		
		$feed.="</channel>/n";
		$feed.="</rss>";
		
		if ( ! write_file($path."\\blog.rss", $feed))
		{
		     echo 'Unable to write the file';
		}
		
	}
}
?>