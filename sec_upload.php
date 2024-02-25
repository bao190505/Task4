<?php
//chọn thư mục để lưu file.
$target_dir = "uploads/";
$allowed_extension = array( 'png','jpeg','gif', 'jpg');   // chọn những loại cho phép upload lên.
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_FILES['upload'])){

        $FileName = basename($_FILES['upload']['name']); //lấy tên của file

        $FileType = strtolower(pathinfo($FileName,PATHINFO_EXTENSION)); //lấy phần mở rộng của file và chuyển về chữ thường
       
        if(!in_array($FileType,$allowed_extension)){  // kiểm tra file có hợp lệ không
            die ("file không hợp lệ"); //nếu không hợp cho dừng và xuất thông báo
        } 
        else {

            if($_FILES['upload']['size'] >= 1000000){ //kiểm tra kích thước của file
                die ("file quá lớn");
            } 
            else {
                $newFileName = hash('sha256',$FileName) . "." . $FileType;  //tạo một tên mới để di chuyển file vào thư mục lưu trữ
                $location = $target_dir.$newFileName; //địa chỉ để lưu file này
                if(move_uploaded_file($_FILES['upload']['tmp_name'],$location)){  // di chuyển file đến thư mục
                    echo "upload file thành công </pre> <a href='".$location."'>{$location}</a>";
                }
                else{
                    echo "xảy ra lỗi trong quá trình tải lên";
                }
            }
        }
    }else{
        die("chọn file");
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