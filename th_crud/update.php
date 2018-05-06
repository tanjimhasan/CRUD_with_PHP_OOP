<?php 
include 'inc/header.php'; 
include 'config.php';
include 'Database.php';
?>

<?php 
$th_id = $_GET['id'];
$th_db = new Database();

$th_query = "SELECT * FROM tbl_user WHERE id=$th_id";
$th_getdata = $th_db->th_select($th_query)->fetch_assoc();

if(isset($_POST['submit'])){

 $th_name  = mysqli_real_escape_string($th_db->th_link, $_POST['name']);
 $th_email = mysqli_real_escape_string($th_db->th_link, $_POST['email']);
 $th_skill = mysqli_real_escape_string($th_db->th_link, $_POST['skill']);


 if($th_name == '' || $th_email == '' || $th_skill == ''){

  $th_error = "Field must not be Empty !!";

 }else {
 	$th_query = "UPDATE tbl_user
 	SET
 	name       = '$th_name',
 	email      = '$th_email',
 	skill      = '$th_skill'

 	WHERE id   = $th_id";

 	$th_update = $th_db->th_update($th_query);
 }
}
?>

<?php
if (isset($_POST['delete'])) {

	$th_query = "DELETE FROM tbl_user WHERE id=$th_id";
	$th_delete = $th_db->th_delete($th_query);

}
?>

<?php 
if(isset($th_error)){

 echo "<span style='color:red'>".$th_error."</span>";
 
}
?>
<form action="update.php?id=<?php echo $th_id;?>" method="post">
<table class="tblone">

		<tr>
			<td>Name</td>
			<td><input type="text" name="name" value="<?php echo $th_getdata['name']?>"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email" value="<?php echo $th_getdata['email']?>"></td>
		</tr>
		<tr>
			<td>Skill</td>
			<td><input type="text" name="skill" value="<?php echo $th_getdata['skill']?>"></td>
		</tr>
		<tr>
		<td></td>
			<td>
				<input type="submit" name="submit" value="Update">
				<input type="reset" value="Cancel">
				<input type="submit" name="delete" value="Delete">
			</td>
		</tr>

	</table>
</form>
<a href="index.php">Go Back</a>
<?php include 'inc/footer.php'; ?>