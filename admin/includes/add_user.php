<?php
if(isset($_POST['create_user'])){
	
$user_firstname = escape($_POST['user_firstname']);
$user_lastname = escape($_POST['user_lastname']);
$user_role = escape($_POST['user_role']);
	

$username = escape($_POST['username']);
$user_email = escape($_POST['user_email']);
$user_password = escape($_POST['user_password']);	

$user_password = password_hash($user_password,PASSWORD_BCRYPT, array('cost' => 10));
	
$query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password) 
VALUES ('$user_firstname','$user_lastname','$user_role','$username','$user_email','$user_password') ";


$create_user_query = mysqli_query($connection, $query);	

confirmQuery($create_user_query);	
	
echo "user created: " . " " . "<a href='users'>View Users</a>";
}

?>

    <form action="" method="post" enctype="multipart/form-data">
     <div class="form-group">   
     
      <label for="title">Firstname</label>     		
      <input class="form-control" type="text" name="user_firstname">	
           		
   	</div>
  	<div class="form-group">
      <label for="post_category">Lastname</label>       		
 <input class="form-control" type="text" name="user_lastname">	
     </div>
      <div class="form-group">
      <select name="user_role" id="">
      <option value="subscriber">Select Options</option>
      	<option value="admin">Admin</option>
      	<option value="subscriber">Subscriber</option>
      </select>
      </div>
<div class="form-group">
      <label for="username">Username</label>       		
 <input class="form-control" type="text" name="username">	
     </div>
  
 <div class="form-group">
      <label for="cat_title">Email</label>       		
 <input class="form-control" type="email" name="user_email">	
     </div>          	
  <div class="form-group">
      <label for="cat_title">Password</label>       		
 <input class="form-control" type="password" name="user_password">	
     </div>

     <div class="form-group">
           		
 <input class="btn btn-primary" type="submit" name="create_user" value="Add user">	
           		
    </div>          	
   </form>