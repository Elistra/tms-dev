<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php confirm_admin(); ?>

<?php
if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("username", "password");
  validate_presences($required_fields);
  
  $fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);

  $admin = '';
  
  if (empty($errors)) {
    // Perform Create

    $username = mysql_prep($_POST["username"]);
    $hashed_password = password_encrypt($_POST["password"]);
    
    //If admin was ticked turn the value to true
    if (isset($_POST["admin"]) && $_POST["admin"] =='on') {
	    $admin = 1;
	}
	else {
		$admin = 0;
	}
    $query  = "INSERT INTO users (";
    $query .= "  username, hashed_password, admin";
    $query .= ") VALUES (";
    $query .= "  '{$username}', '{$hashed_password}', '{$admin}'";
    $query .= ")";
    
    // echo $query;
   
    $result = mysqli_query($connection, $query);

    if ($result) {
      // Success
      $_SESSION["message"] = "User created.";
      redirect_to("manage_users.php");
    } else {
      // Failure
      $_SESSION["message"] = "User creation failed. Possible duplicate user.";
        $_SESSION["errors"] = "User creation failed. Possible duplicate user.";
    } 
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>

<?php $layout_context = "admin"; ?>
<?php include("includes/layouts/header.php"); ?>
<div id="main">

  <div id="page">
    <?php echo message(); ?>
    <?php echo form_errors($errors); ?>
    
    <h2>Add User</h2>
    <form action="new_user.php" method="post">
      <p>Username:
        <input type="text" name="username" value="<?php echo 'maxlength = 16'; ?>" maxlength="16"/>
      </p>
      <p>Password:
        <input type="password" name="password" value="" />
      </p>
      <p> Admin
      <input type="checkbox" name="admin" />
      </p>
      <input type="submit" name="submit" value="Create user" />
    </form>
    <br />
    <a href="manage_users.php"><form><button type="button">Cancel</button></form></a>

  </div>
</div>

<?php include("includes/layouts/footer.php"); ?>
