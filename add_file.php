<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php confirm_admin(); ?>

<?php $layout_context = "admin"; ?>
<?php include("includes/layouts/header.php"); ?>
<?php

if (isset($_POST['submit'])) {


}


?>




<?php

// Check if a file has been uploaded
if(isset($_FILES['uploaded_file'])) {
    // Make sure the file was sent without errors
    if($_FILES['uploaded_file']['error'] == 0) {
        // Connect to the database
        $dbLink = $connection;
        if(mysqli_connect_errno()) {
            die("MySQL connection failed: ". mysqli_connect_error());
        }

        // Gather all required data
        $user_id = $_GET["id"];
        $name = mysqli_real_escape_string($dbLink,$_FILES['uploaded_file']['name']);
        $mime = mysqli_real_escape_string($dbLink,$_FILES['uploaded_file']['type']);
        $data = mysqli_real_escape_string($dbLink,base64_encode(file_get_contents($_FILES['uploaded_file']['tmp_name'])));
        $size = intval($_FILES['uploaded_file']['size']);

        // Create the SQL query
        $query = "
            INSERT INTO `stock` (
               `user_id`, `name`, `mime`, `size`, `data`, `created`
            )
            VALUES (
               '{$user_id}', '{$name}', '{$mime}', {$size}, '{$data}', NOW()
            )";

        // Execute the query
        $result = mysqli_query($dbLink, $query);
        // echo $query;

        // Check if it was successful
        if($result) {
            echo 'Success! Your file was successfully added!';
        }
        else {
            echo 'Error! Failed to insert the file'
                . "<pre>{$dbLink->error}</pre>";
        }
    }
    else {
        echo 'An error accured while the file was being uploaded. <br /><br />Please choose the file before clicking upload.';
           // . 'Error code: '. intval($_FILES['uploaded_file']['error']);
    }

    // Close the mysql connection
    //echo "$_FILES['uploaded_file']";
   // $dbLink->close();

}
else {
    echo 'Error! A file was not sent!';
}

// Echo a link back to the main page
$user_id = $_GET["id"];
echo "<p><a href=\"edit_user.php?id=$user_id\"><form action='href=\"edit_user.php?id=$user_id\' method='get'><button type=\"button\">&laquo; Click here to go back</button></form></a></p>";
?>
 