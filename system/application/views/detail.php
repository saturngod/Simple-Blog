<?php


$data['title']=$title;
$data['base']=$base;
$this->load->view('header',$data);
?>

<script src="<?= $base ?>/lib/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?= $base ?>/lib/cmxforms.js" type="text/javascript"></script>
<script src="<?= $base ?>/editor/jquery.wysiwyg.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="<?= $base ?>/editor/jquery.wysiwyg.css">

<link rel="stylesheet" type="text/css" media="screen" href="<?= $base ?>/css/style.css" />

<script type="text/javascript">

$().ready(function() {
	// validate the comment form when it is submitted
	$("#commentForm").validate();
	$("#body").wysiwyg();
	$(".comment_del").click(function(){
		res=confirm("Do you want to delete ?");
		if(res)
		{
			$("#message").html("<img src='<?= $base ?>/img/load.gif'>");
	 		load_url="<?= $base ?>/index.php/comment/del";
	 		$("#message").load(load_url,{comment_id: this.id} );

			$("#com_"+this.id).fadeOut("slow");
			
		}
	});


});
</script>

<div id="wrapper">
<?php

//Loop For Post But just 1 Loop
foreach($post_query as $row)
{
	$post_id=$row->post_id;
	echo "<a href='{$base}/index.php/home/view/{$row->post_id}'><h2>{$row->title}</h2></a>";
	echo "<span class='meta'>Posted By: {$row->username} | Date: {$row->date} | Total Comment: ".$this->Blog->get_comment_count($row->post_id);

	if(($this->session->userdata('user')!="") and ($this->session->userdata('type')==1))
	{

		echo"	| <a href='{$base}/index.php/admin/edit/{$row->post_id}'>Edit</a>";
	}	
	echo "</span><br/><br/>";
	
	
	echo $row->body;
	echo "<hr>";
}
echo "<div id='message'></div>";

//Loop For Comment
foreach($comment_query as $row)
{
	echo "<div class='comment' id='com_{$row->comment_id}'><b>{$row->name}</b> ({$row->email}) | <a href='{$row->website}' target='_blank'>$row->website</a> {$row->date}";
	if(($this->session->userdata('user')!="") and ($this->session->userdata('type')==1))
	{
		echo " <a href='#' id='{$row->comment_id}' class='comment_del'>(Delete)</a>";
	}
	echo "</span><br/><br/>";
	echo "<p>$row->body</p></div>";

}

//For Form input textbox
$attributes = array('id' => 'commentForm','class'=>'cmxform');
$nameatt = array('name'=>'name','class' => 'required', 'id' => 'name');
$emailatt = array('name'=>'email','class' => 'email required', 'id' => 'email');

echo "<div id='result'></div>";
echo form_open('comment/insert',$attributes);
echo form_hidden('date',date('M d Y h:m:s'));
echo form_hidden('post_id',$post_id);
?>
<table>
	<tr>
		<td>User</td>
		<td><?= form_input($nameatt) ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><?= form_input($emailatt) ?></td>
	</tr>
	<tr>
		<td>Website</td>
		<td><?= form_input('website') ?></td>
	</tr>
	<tr>
		<td colspan="2"><textarea cols="23" class="required" name="body" id="body"></textarea></td>
		
	</tr>
</table>
<?php
echo form_submit("","Submit");
echo form_reset("","Clear");

?>
</div>