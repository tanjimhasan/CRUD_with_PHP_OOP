<?php 
include 'inc/header.php'; 
include 'config.php';
include 'Database.php';
?>

<?php 
 $th_db = new Database();
if(isset($_POST['submit'])){
	
 $th_name  = mysqli_real_escape_string($th_db->th_link, $_POST['name']);
 $th_email = mysqli_real_escape_string($th_db->th_link, $_POST['email']);
 $th_skill = mysqli_real_escape_string($th_db->th_link, $_POST['skill']);

 if($th_name == '' || $th_email == '' || $th_skill == ''){

  $th_error = "Field must not be Empty !!";

 } else {

   $th_query = "INSERT INTO tbl_user(name, email, skill) 
   Values('$th_name', '$th_email', '$th_skill')";
   $th_create = $th_db->th_insert($th_query);

 }
}
?>

<?php 
if(isset($th_error)){
 echo "<span style='color:red'>".$th_error."</span>";
}
?>
<form action="create.php" method="post">
<table class="tblone">

		<tr>
			<td>Name</td>
			<td><input type="text" name="name" placeholder="Please Enter Name"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email" placeholder="Please Enter Email"></td>
		</tr>
		<tr>
			<td>Skill</td>
			<td><input type="text" name="skill" placeholder="Please Enter Skill"></td>
		</tr>
		<tr>
		<td></td>
			<td>
				<input type="submit" name="submit" value="Submit">
				<input type="reset" value="Cancel">
			</td>
		</tr>

	</table>
</form>
<a href="index.php">Go Back</a>
<?php include 'inc/footer.php'; ?>