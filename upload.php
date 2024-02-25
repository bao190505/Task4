<?php
$target_dir = "uploads/";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_FILES['upload'])){
        $fileName = $target_dir.basename($_FILES['upload']['name']);
        if(move_uploaded_file($_FILES['upload']['tmp_name'],$fileName)){
            echo "<pre> upload file thành công </pre> <a href='".$fileName."'>{$fileName}</a>";
        }
        else{
            echo "xảy ra lỗi trong quá trình tải lên";
        }
    }
    else{
        echo "xảy ra lỗi";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload</title>
</head>
<body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <p>UPLOAD FILE</p>
        <input type="file" name="upload">
        <input type="submit" name="upload">
    </form>
    
</body>
</html>