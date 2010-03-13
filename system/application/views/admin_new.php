<script src="<?= $base ?>/lib/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?= $base ?>/lib/cmxforms.js" type="text/javascript"></script>
<script>
$().ready(function() {
$("#addForm").validate();
$("#body").wysiwyg();
});
</script>
<?

$attributes = array('id' => 'addForm','class'=>'cmxform');
$nameatt = array('name'=>'title','class' => 'required', 'id' => 'title','size'=>'50');
echo form_open("/admin/add_new",$attributes);
echo form_hidden('date',date('M d Y h:m:s'));
echo form_hidden('username',$usr);

echo "Title:<br>";
echo form_input($nameatt);
echo "<br>Content:</br>";
echo '<textarea id="body" name="body" rows="20" cols="40" class="required"></textarea><br>';
echo form_submit('',"Submit");
?><br>
