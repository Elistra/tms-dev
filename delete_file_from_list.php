<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_admin(); ?>

<?php


  $file = find_file_by_id($_GET["id"]);
  if (!$file) {
    // admin ID was missing or invalid or 
    // admin couldn't be found in database
    redirect_to("manage_files.php");
  }
  
  $id = $file["id"];
  $query = "DELETE FROM stock WHERE id = {$id} LIMIT 1";
  $result = mysqli_query($connection, $query);

  if ($result && mysqli_affected_rows($connection) == 1) {
    // Success
    $_SESSION["message"] = "File deleted.";
    redirect_to("manage_files.php");
  } else {
    // Failure
    $_SESSION["message"] = "User deletion failed.";
    redirect_to("manage_files.php");
  }
  
?>
