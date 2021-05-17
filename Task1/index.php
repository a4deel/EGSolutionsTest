<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>File Uploading Task</title>
</head>

<body>
    <form action="upload-file.php" method="post" enctype="multipart/form-data">
        <h2>Upload File</h2>
        <input type="file" name="uploadFile" id="uploadFile">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>

</html>