<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>File Uploading Task - Processing File</title>
</head>

<body>
    <a href="index.php"><button>Go To Index file</button></a>
    </br>
</body>

</html>
<?php

function uploadFilesInDirectory()
{
    date_default_timezone_set("Asia/Karachi"); //setting pakistan time zone
    $target_dir = "pub/media/"; //initail directory
    $target_file = $target_dir . basename($_FILES["uploadFile"]["name"]); //target file
    $originalFileName = basename($_FILES["uploadFile"]["name"]); //original name witout path
    $baseFileName = pathinfo($target_file, PATHINFO_FILENAME); //only file name
    $fileExtension = pathinfo($target_file, PATHINFO_EXTENSION); //only extension
    $fileNameLength = strlen($baseFileName); //name length
    if ($fileNameLength > 1) { //length checking if greater than 1
        for ($i = 0; $i < 2; $i++) { //loop to create two directories
            $target_dir = $target_dir . $baseFileName[$i] . "/"; //taking current character of name
            if (!file_exists($target_dir)) { //if directory not exists
                mkdir($target_dir); //make directory
            }
        }

        $finalFile = $target_dir . $originalFileName;
        if (!file_exists($finalFile)) { //if file  ot exists upload it
            if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $finalFile)) {
                echo "The file " . $finalFile . " has been uploaded.";
            } else {
                echo "<h1>Error Uploading file.</h1>";
            }
        } else {
            $date = date('Y-M-D - h i s A', time()); //if exists apppend date time
            $finalFilePath = $target_dir . $baseFileName . "-" . $date  . "." . $fileExtension;
            if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $finalFilePath)) {
                echo "The file " . $finalFilePath . " has been uploaded.";
            } else {
                echo "<h1>Error Uploading file.</h1>";
            }
        }
    } else if ($fileNameLength == 1) { //if length is 1 make directory of that name and upload image
        $target_dir = $target_dir . $baseFileName . "/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir);
            $filePath = $target_dir . $baseFileName . "." . $fileExtension;
            if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $filePath)) {
                echo "The file " . $filePath . " has been uploaded.";
            } else {
                echo "<h1>Error Uploading file.</h1>";
            }
        } else {
            $filePath = $target_dir . $baseFileName . "." . $fileExtension;
            if (!file_exists($filePath)) {
                if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $filePath)) {
                    echo "The file " . $filePath . " has been uploaded.";
                } else {
                    echo "<h1>Error Uploading file.</h1>";
                }
            } else {
                $date = date('Y-M-D - h i s A', time());
                $filePath = $target_dir . $baseFileName . "-" . $date  . "." . $fileExtension;
                if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $filePath)) {
                    echo "The file " . $filePath . " has been uploaded.";
                } else {
                    echo "<h1>Error Uploading file.</h1>";
                }
            }
        }
    }
}
if (isset($_POST["submit"])) {
    uploadFilesInDirectory(); //function calling
}