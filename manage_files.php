<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_admin(); ?>

<title>Manage Files</title>
<?php
  // $id = $_GET["id"];
  $file_set = find_all_files();
  //$filename = find_file_by_uid($id);
?>

<?php $layout_context = "admin"; ?>
<?php include("includes/layouts/header.php"); ?>



<div id="main">

  <div id="page">
    <?php echo message(); ?>
    <h2>Manage Files</h2>

    <table id="tablecontent">
        <!-- Table header -->

        <thead>
      <tr>
        <th scope="col" id="">File name</th>
          <th scope="col" id="">Upload Date</th>
          <th scope="col" id="">Username</th>
          <th scope="col" id="">Type</th>
        <th colspan="2" style="text-align: left;">Actions</th>
      </tr>
      </thead>
        
    <?php while($file= mysqli_fetch_assoc($file_set)) { ?>
        <!-- Table body -->

        <tbody>
        <tr>
        <td><?php echo htmlentities($file["name"]); ?></td>
          <td><?php echo htmlentities($file["created"]); ?></td>


          <td><?php $result = find_admin_by_id($file["user_id"]);
              echo $result["username"];// passing user id to the function, where result is from a users table, all admins, then show name only?></td>
           <td> <?php echo htmlentities($file["mime"]); ?></td>
        <td><a href="delete_file_from_list.php?id=<?php echo urlencode($file["id"]); ?>" onclick="return confirm('Are you sure?');"><form><button type="button">Delete</button></form></a>
            <a href="download_file.php?id=<?php echo urlencode($file["id"]); ?>"><form><button type="button">Download</button></form></a></td>
      </tr>
        </tbody>
    <?php } ?>
    </table>
  </div>
    <br /><br />
    <p>
        <a href="manage_users.php"><form><button type="button">&laquo; Back to Users</button></form></a>
    </p>

    <br /><br /><br /><br />


</div>
<?php include("includes/layouts/footer.php"); ?>



