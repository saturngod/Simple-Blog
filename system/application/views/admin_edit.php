<script>
  $(document).ready(function(){
  	
  	$("#body").wysiwyg();
  	
  	$("#update").click(function(){
  		post_id=$("#post_id").val();
  		post_title=$("#title").val();
  		post_body=$("#body").val();
 		$("#message").html("<img src='<?= $base ?>/img/load.gif'>");
 		load_url="<?= $base ?>/index.php/admin/update";
 		$("#message").load(load_url,{id: post_id,title:post_title,body:post_body} );
  	});
});
</script>
<div id="message"></div>
<?
echo "<form>";
foreach($query as $row)
{
echo "<input type='hidden' id='post_id' value='{$row->post_id}'/>";
echo "Title:<br>";
echo "<input type='text' id='title' name='title' value='{$row->title}' size=50><br>";
echo "Content:<br>";
echo "<textarea name='body' id='body'  rows='20' cols='40'>{$row->body}</textarea><br>";
echo "<input type='button' id='update' value='Update'>";
}
echo "</form>";
?>


