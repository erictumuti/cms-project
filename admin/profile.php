<?php include "includes/admin_header.php";?>
    
  <?php  
    if(isset($_SESSION['username'])) {
	
$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username = '$username' ";
	$select_user_profile_query = mysqli_query($connection, $query);
	while($row = mysqli_fetch_array($select_user_profile_query)){
		
	$user_id = $row['user_id'];
	$username = $row['username'];	
	$user_password = $row['user_password'];	
	$user_firstname = $row['user_firstname'];	
	$user_lastname = $row['user_lastname'];	
	$user_email = $row['user_email'];
	$user_image = $row['user_image'];	
	$user_role = $row['user_role'];		
	}
}
 ?> 
    
      <?php

if(isset($_POST['edit_user'])){
	
$user_firstname = $_POST['user_firstname'];
$user_lastname = $_POST['user_lastname'];
$username = $_POST['username'];
$user_email = $_POST['user_email'];
$user_password = $_POST['user_password'];	
//$post_date = date('d-m-y');
	
//move_uploaded_file($post_image, "../images/$post_image");	
$query = "UPDATE users SET user_firstname='$user_firstname',user_lastname='$user_lastname',username='$username',user_email='$user_email',user_password='$user_password' where username='$username'";	
	
$edit_user_query = mysqli_query($connection,$query);
confirmQuery($edit_user_query);	
}



?>    
        
          
              

    <div id="wrapper">
        

        <!-- Navigation -->
        

<?php include "includes/admin_navigation.php";?>
       
       
       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin 
                            <small>Author</small>
                        </h1>
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
           		
 <input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile">	
           		
    </div>          	
   </form>           
                                                                                              
                                                      
                                                      
                                                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

		</div>
       
       
       
        <!-- /#page-wrapper -->




<?php include "includes/admin_footer.php";?>