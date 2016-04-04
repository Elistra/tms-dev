<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>


<title>Client Page</title>
<?php
$id = $_SESSION["user_id"];

$username = $_SESSION["username"];

$filename_set = find_file_by_uid($id);

//$file = mysqli_fetch_assoc($filename_set);

?>

<?php $layout_context = "public_html"; ?>
<?php include("includes/layouts/header.php"); ?>




<div id="main">

    <div id="page">
        <?php echo message(); ?>


        <h2>Welcome <?php echo htmlentities($username); ?></h2>
        <table id="tablecontent">
            <tr>
                <th >File name</th>
                <th >Uploaded</th>
                <th colspan="3" style="text-align: left;">Actions</th>
            </tr>


            <?php
                while($filename = mysqli_fetch_assoc($filename_set)) { ?>
                    <tr>
                   <td> <?php echo htmlentities($filename["name"]); ?><br /></td>
                   <td><?php echo htmlentities($filename["created"]); ?><br /></td>

                    <td><a href="download_file.php?id=<?php echo urlencode($filename["id"]); ?>"><form><button type="button">Download</button></form></a></td>
                    </tr>

                <?php } ?>



        </table>

    </div>


</div>
<?php include("includes/layouts/footer.php"); ?>



