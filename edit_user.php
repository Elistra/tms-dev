<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php confirm_admin(); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">
</script>

<script>
    function reveal() {
        if ($('#upload').val() == '') {
            $('.enableOnInput').prop('disabled', true);
        } else {
        $('.enableOnInput').prop('disabled', false);
        }

    }
</script>
<title>Edit Users</title>
<?php
  $admin = find_admin_by_id($_GET["id"]);
  
  if (!$admin) {
    // admin ID was missing or invalid or 
    // admin couldn't be found in database
    redirect_to("manage_users.php");
  }
?>

<?php
if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("username", "password");
  validate_presences($required_fields);
  
  $fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);
  
  if (empty($errors)) {
    
    // Perform Update

    $id = $admin["id"];
    $username = mysql_prep($_POST["username"]);
    $hashed_password = password_encrypt($_POST["password"]);
  
    $query  = "UPDATE users SET ";
    $query .= "username = '{$username}', ";
    $query .= "hashed_password = '{$hashed_password}' ";
    $query .= "WHERE id = {$id} ";
    $query .= "LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
        $admin = find_admin_by_id($_GET["id"]);
      $_SESSION["message"] = "User updated.";

    } else {
      // Failure
      $_SESSION["message"] = "User update failed.";
    }
  
  }
} else {

  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>



<?php $layout_context = "admin"; ?>
<?php include("includes/layouts/header.php"); ?>




<div id="main">
    <a href="manage_users.php" style="  padding-left: 20px;"><form><button type="button">&laquo; Back to Manage Users</button></form></a>

  <div id="page">
    <?php echo message(); ?>
    <?php echo form_errors($errors); ?>
    
    <h2>Edit User: <?php echo htmlentities($admin["username"]); ?></h2>
    <form action="edit_user.php?id=<?php echo urlencode($admin["id"]); ?>" method="post">
      <p>Username:
        <input type="text" name="username" value="<?php echo htmlentities($admin["username"]); ?>" />
      </p>
      <p>Password:
        <input type="password" name="password" value="" />
      </p>
      <input type="submit" name="submit" value="Edit User" />
        <a href="delete_user.php?id=<?php echo urlencode($admin["id"]); ?>" onclick="return confirm('Are you sure?');"><form><button type="button">Delete User</button></form></a>
    </form>

      <br /><br /><br /><br /><br /><br />

<h2>Current File</h2>


      <table id="tablecontent">
          <tr>
              <th >File name</th>
              <th colspan="2">Actions</th>


<?php
    $result = find_file_by_uid($admin["id"]);
    while($file= mysqli_fetch_assoc($result)) { ?>
      <tr>
          <td><?php echo htmlentities($file["name"]); ?></td>
          <td><a href="delete_file.php?id=<?php echo urlencode($file["id"]); ?>" onclick="return confirm('Are you sure?');"><form><button type="button">Delete</button></form></a>
              <a href="download_file.php?id=<?php echo urlencode($file["id"]); ?>"><form><button type="button">Download</button></form></a></td>
      </tr>
          <?php } ?>


</table>

      <br /><br /><br /><br /><br /><br />

      <h2>Upload File</h2>

      <form action="add_file.php?id=<?php echo urlencode($admin["id"]); ?>" method="post" enctype="multipart/form-data">


          <input id="upload" type="file" name="uploaded_file" onchange="reveal()"><br />
          <br />
          <input class="enableOnInput" type="submit" value="Upload file" disabled="disabled">
      </form>

      <br /><br />
  </div>
</div>


<?php include("includes/layouts/footer.php"); ?>


