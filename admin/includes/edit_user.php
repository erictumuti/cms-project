<?php
if(isset($_GET['edit_user'])){
	
$the_user_id = $_GET['edit_user'];
	
$query = "SELECT * FROM users WHERE user_id = $the_user_id";
$select_users_query = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($select_users_query)) {
		
$user_id = $row['user_id'];
$username = $row['username'];
$user_password = $row['user_password'];
$user_firstname = $row['user_firstname'];	
$user_lastname = $row['user_lastname'];	
$user_email = $row['user_email'];	
$user_image = $row['user_image'];	
$user_role = $row['user_role'];
}



if(isset($_POST['edit_user'])){
	
$user_firstname = $_POST['user_firstname'];
$user_lastname = $_POST['user_lastname'];
$user_role = $_POST['user_role'];
	

$username = $_POST['username'];
$user_email = $_POST['user_email'];
$user_password = $_POST['user_password'];
	
	
	if(!empty($user_password)) {
		
		$query_password = "SELECT user_password FROM users WHERE user_id = $the_user_id ";
		$get_user_query = mysqli_query($connection, $query_password);
		confirmQuery($get_user_query);
		
		$row = mysqli_fetch_array($get_user_query);
		$db_user_password = $row['user_password'];
		
		
if($db_user_password != $user_password) {
$hashed_password = password_hash($user_password,PASSWORD_BCRYPT, array('cost' => 10));		
		
	}

$query = "UPDATE users SET user_firstname='$user_firstname',user_lastname='$user_lastname',user_role='$user_role',username='$username',user_email='$user_email',user_password='$hashed_password' where user_id=$the_user_id";	
	
$edit_user_query = mysqli_query($connection,$query);
confirmQuery($edit_user_query);	

echo "user updated" . "<a href='users.php'>View users</a>";
}		
		
		

	}
	
}else {
	
	header("Location: index.php");
}

?>

    <form action="" method="post" enctype="multipart/form-data">
     <div class="form-group">   
     
      <label for="title">Firstname</label>     		
      <input class="form-control" value="<?php echo $user_firstname; ?>" type="text" name="user_firstname">	
           		
   	</div>
  	<div class="form-group">
      <label for="post_category">Lastname</label>       		
 <input class="form-control" value="<?php echo $user_lastname; ?>" type="text" name="user_lastname">	
     </div>
      <div class="form-group">
      <select name="user_role" id="">
      <option value="subscriber"><?php echo $user_role; ?></option>
   <?php
if($user_role == 'admin') {
	
echo "<option value='subscriber'>subscriber</option>";
	
}	else {
	echo "<option value='admin'>admin</option>";
}	  
		  
		  ?>   

      </select>
      </div>
<div class="form-group">
      <label for="username">Username</label>       		
 <input class="form-control" value="<?php echo $username; ?>" type="text" name="username">	
     </div>
  
 <div class="form-group">
      <label for="cat_title">Email</label>       		
 <input class="form-control" value="<?php echo $user_email; ?>" type="email" name="user_email">	
     </div>          	
  <div class="form-group">
      <label for="cat_title">Password</label>       		
 <input autocomplete="off" class="form-control" type="password" name="user_password">	
     </div>

     <div class="form-group">
           		
 <input class="btn btn-primary" type="submit" name="edit_user" value="Update user">	
           		
    </div>          	
   </form>