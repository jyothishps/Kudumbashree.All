<option>---Select---</option>
<?php
include("../Connection/Connection.php");
$selQry="select * from tbl_subcategory where subcategory_id=".$_GET['did'];
$resultOne=$con->query($selQry);
while($data=$resultOne->fetch_assoc())
{
	?>
	<option value="<?php echo $data["subcategory_id"]?>">
    <?php echo $data["subcategory_name"]?>
	</option>
    <?php
}
?>