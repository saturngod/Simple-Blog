<div id="wrapper">
<?php
$this->load->model('Blog');

foreach($query as $row)
{
	echo "<a href='{$base}/index.php/home/view/{$row->post_id}'><h2>{$row->title}</h2></a>";
	echo "<span class='meta'>Posted By: {$row->username} | Date: {$row->date} | Total Comment: ".$this->Blog->get_comment_count($row->post_id);
	
	if(($this->session->userdata('user')!="") and ($this->session->userdata('type')==1))
	{

		echo"	| <a href='{$base}/index.php/admin/edit/{$row->post_id}'>Edit</a>";
	}	

	echo "</span><br/><br/>";
	
	echo $row->body;
}
?>
</div>