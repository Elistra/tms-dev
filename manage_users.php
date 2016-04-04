<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_admin(); ?>
<title>Manage Users</title>
<?php
  // $id = $_GET["id"];
  $admin_set = find_all_users();
  //$filename = find_file_by_uid($id);
?>

<?php $layout_context = "admin"; ?>
<?php include("includes/layouts/header.php"); ?>



<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<![endif]-->

<div id="main">

  <div id="page">
    <?php echo message(); ?>
    <h2>Manage Users</h2>
    <table id="tablecontent">
      <tr>
        <th>Username</th>
          <th>Admin</th>

        <th>File name</th>
        <th colspan="2" style="text-align: left;">Actions</th>
      </tr>

        <tr>
    <?php while($admin = mysqli_fetch_assoc($admin_set)) { ?>

        <td><?php echo htmlentities($admin["username"]); ?></td>

        <td><?php if ($admin["admin"] ==1) {
                    echo "Yes";
                } else {
                    echo "";
                } ?></td>




          <td><?php $result = find_file_by_uid($admin["id"]);
              while($filename = mysqli_fetch_assoc($result)) { ?>

              <?php echo htmlentities($filename["name"]); ?><br />
              <?php } ?></td>


        <td><a href="edit_user.php?id=<?php echo urlencode($admin["id"]); ?>"><form action="edit_user.php?id=<?php echo urlencode($admin["id"]); ?>" method="post"><button type="button">Edit User</button></form></a>
      </tr>

    <?php } ?>
    </table>
<br />

      <form action="add_file.php" method="post" enctype="multipart/form-data">


      <a href="new_user.php"><form><button type="button">Add New User</button></form></a><br /><br /><br />
      <a href="manage_files.php"><form><button type="button">See all files</button></form></a>

  </div>

</div>
<?php include("includes/layouts/footer.php"); ?>



