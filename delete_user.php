<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_admin(); ?>

<?php
  $admin = find_admin_by_id($_GET["id"]);
  if (!$admin) {
    // admin ID was missing or invalid or 
    // admin couldn't be found in database
    redirect_to("manage_users.php");
  }
  
  $id = $admin["id"];
  $query = "DELETE FROM users WHERE id = {$id} LIMIT 1";
  $result = mysqli_query($connection, $query);

  if ($result && mysqli_affected_rows($connection) == 1) {
    // Success
    $_SESSION["message"] = "User deleted.";
    redirect_to("manage_users.php");
  } else {
    // Failure
    $_SESSION["message"] = "User deletion failed.";
    redirect_to("manage_users.php");
  }
  
?>
