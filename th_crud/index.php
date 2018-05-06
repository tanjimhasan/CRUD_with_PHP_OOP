<?php 
include 'inc/header.php'; 
include 'config.php';
include 'Database.php';
?>
		
<?php
$th_db = new Database();
$th_query = "SELECT * FROM tbl_user";
$th_read = $th_db->th_select($th_query);

?>	

<?php
if (isset($_GET['msg'])) {
	echo "<span style='color:green'>".$_GET['msg']."</span>";
}
?>
		
<table class="tblone">
	<tr>
		<th width="10%">Serial No</th>
		<th width="30%">Name</th>
		<th width="30%">Email</th>
		<th width="15%">Skill</th>
		<th width="15%">Action</th>
	</tr>
<?php
 	if($th_read) {
?>
<?php 
$th_i = 1;
	while($row = $th_read->fetch_assoc()){

?>

	<tr>
		<td><?php echo $th_i++;?></td>
		<td><?php echo $row['name']?></td>
		<td><?php echo $row['email']?></td>
		<td><?php echo $row['skill']?></td>
		<td><a href="update.php?id=<?php echo urlencode($row['id']); ?>">Edit</a></td>
	</tr>
<?php } ?>
<?php }else{ ?>
<p>Data not available !!</p>
<?php } ?>
</table>

<a href="create.php">Create</a>
<?php include 'inc/footer.php'; ?>