          <form action="" method="post">
        <div class="form-group">
        <label for="cat_title">Edit Category</label>
        <?php
if(isset($_GET['edit'])) {
	$cat_id = escape($_GET['edit']);
	
	
$stmt = mysqli_prepare($connection,"INSERT INTO categories(cat_title) VALUES(?)");	
$query = " SELECT * FROM categories WHERE cat_id = $cat_id ";
$select_categories_id = mysqli_query($connection, $query);
								
                               
while($row = mysqli_fetch_assoc($select_categories_id)){
$cat_id = escape($row['cat_id']);
$cat_title = escape($row['cat_title']);

?>

	<input value="<?php if(isset($cat_title)){echo $cat_title;} ?>" type="text" name="cat_title" class="form-control">	
	
<?php } } ?>
 <?php
	//////////UPDATE QUERY		
if(isset($_POST['update_category'])) {
$the_cat_title = escape($_POST['cat_title']);
	
$stmt = mysqli_prepare($connection,"UPDATE categories SET cat_title = ? WHERE cat_id = ? ");
mysqli_stmt_bind_param($stmt, 'si' ,$the_cat_title,$cat_id);
mysqli_stmt_execute($stmt);	
	
	if(!$stmt) {
		die("query failed" . mysqli_error($connection));
	} 
	
	
	mysqli_stmt_close($stmt);
	header("Location: categories");
}					
			
			
			?>
 
  
        </div>  	
         <div class="form-group">
        <input type="submit" name="update_category" class="btn btn-primary" value="Update Category">
        </div>  	
       </form> 