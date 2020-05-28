<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

<?php 

if(!isset($_GET['email']) && !isset($_GET['token'])) {
    header("Location: index.php");
}



//$email = "tumuti@gmail.com";
//$token = '90f3b5af793ad625fa13151bb61e44d54bb9c1cc0af4074fe2417b6211299db1fcd31fbb63aee7406093561f216d02b38ca9';
    
if($stmt = mysqli_prepare($connection,'SELECT username,user_email, token FROM users WHERE token= ?')){
    mysqli_stmt_bind_param($stmt, "s", $_GET['token']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $username, $user_email, $token);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    
//if($_GET['token'] !== $token || $GET['email'] !== $email) {
// header("Location: index.php");
//}
 if(isset($_POST['password']) && isset($_POST['confirmpassword'])){
    if($_POST['password'] === $_POST['confirmpassword']) {
        
    $password = $_POST['password'];
    $hashedPassword = password_hash($password,PASSWORD_BCRYPT, array('cost' => 12));
    
    if($stmt = mysqli_prepare($connection, "UPDATE users SET token = '', user_password = '{$hashedPassword}' WHERE user_email = ?")){
        
        mysqli_stmt_bind_param($stmt, "s", $_GET['email']);
        mysqli_stmt_execute($stmt);
        if(mysqli_stmt_affected_rows($stmt) >=1) {
            
          header("Location: index.php");  
        }
        
        mysqli_stmt_close($stmt);
        
    }      
}
 }   
 }
?>
<!-- navigation -->
<?php "includes/navigation.php";?>
<!-- Page Content -->
<div class="container">

<div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-4">
<div class="panel panel-default">
<div class="panel-body">
<div class="text-center">

<h3><i class="fa fa-lock fa-4x"></i></h3>
<h2 class="text-center">Reset Password?</h2>
<p>You can reset your password here.</p>
<div class="panel-body">

<form id="register-form" role="form" autocomplete="off" class="form" method="post">

<div class="form-group">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span> 
<input id="password" name="password" placeholder="Enter your password" class="form-control"  type="password">
</div>
<br>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-ok color-blue"></i></span>
<input id="confirmpassword" name="confirmpassword" placeholder="Confirm your password" class="form-control"  type="password">
</div>
</div>
<div class="form-group">
<input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
</div>

<input type="hidden" class="hide" name="token" id="token" value="">
</form>

</div><!-- Body-->

</div>
</div>
</div> 
</div>
</div>
</div>

<hr>

<?php include "includes/footer.php"; ?>

</div> <!-- /.container -->

