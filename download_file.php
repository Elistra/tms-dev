<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php
$file = find_file_by_id($_GET["id"]);

if (!$file) {
    // admin ID was missing or invalid or 
    // admin couldn't be found in database
    redirect_to("manage_files.php");
}
else {

    if($file) {
        // Make sure the result is valid
        // Print headers
        $filename = htmlentities($file['name']);
        $file_mine = htmlentities($file['mime']);
        $file_size = htmlentities($file['size']);

        $download = base64_decode($file['data']);
        header("Cache-Control: no-cache private");
        header("Content-Description: File Transfer");
        header("Content-Type:".$file_mine);
        header("Content-Length:".$file_size);
        header("Content-Transfer-Encoding: binary");
        header("Content-Disposition: attachment; filename=\"$filename\"");


        ob_clean();
        flush();
        // Print data
         //echo $file["data"];
        echo $download;
    }
    else {
        echo 'Error! No file exists with that ID.';
    }
}


?>
