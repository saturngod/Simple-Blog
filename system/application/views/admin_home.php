<script>
$().ready(function() {
	// validate the comment form when it is submitted
	$(".del").click(function(){
		res=confirm("Do you want to delete ?");
		if(res)
		{
			$("#message").html("<img src='<?= $base ?>/img/load.gif'>");
	 		load_url="<?= $base ?>/index.php/admin/delete_post";
	 		$("#message").load(load_url,{post_id: this.id} );
			$("#lst_"+this.id).fadeOut("slow");			
		}
	});
});
</script>


<h3>Post List</h3>
<div id="message"></div>
<ul id="post_lst">
<?
foreach($query as $row)
{
	echo "<li id='lst_{$row->post_id}'><a href='{$base}/index.php/admin/edit/{$row->post_id}'>{$row->title}</a>(Posted By : {$row->username})(<a href='#' id='{$row->post_id}' class='del'>Delete</a>)(<a href='{$base}/index.php/home/view/{$row->post_id}' >View</a>)</li>";

}
?>
</ul>
