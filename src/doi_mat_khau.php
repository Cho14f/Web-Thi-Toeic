<?php 
    include_once '../function.php';
    // if(checkLogin());
    $userId = $_SESSION['userId'];
    if(isset($_POST['btnLuuThongTin'])){
        $newPassword = $_POST['matkhaumoi'];
        $cfPassword = $_POST['xacnhan'];
        $oldPassword = $_POST['matkhaucu'];
        if(empty($oldPassword) || empty($newPassword) || empty($cfPassword)){
            echo '
            <script>
            alert("Vui lòng nhập đủ thông tin.");
            </script>
        ';
        }
        else{
            //Kiểm tra mật khẩu cũ
            if(GetMatKhauCu($oldPassword, $userId)==true){
                if($newPassword != $cfPassword){
                    echo '
                    <script>
                    alert("Mật khẩu không trùng khớp.");
                    </script>
                    ';
                }
                else if(strpos(' ', $newPassword)){
                    echo '
                    <script>
                    alert("Mật khẩu không được có kí tự khoảng trắng.");
                    </script>
                    ';
                }
                else if(strlen($newPassword)>32){
                    echo '
                    <script>
                    alert("Mật khẩu không được dài quá 32 kí tự.");
                    </script>
                    ';
                }
                else if(strlen($newPassword)<6){
                    echo '
                    <script>
                    alert("Mật khẩu không được ngắn hơn 6 kí tự.");
                    </script>
                    ';
                }
                else if($oldPassword == $newPassword){
                    echo '
                    <script>
                    alert("Mật khẩu cũ không được trùng với mật khẩu mới.");
                    </script>
                    ';
                }
                else{
                    updateMatKhau($newPassword, $userId);
                    function myAlert($msg, $url){
                        echo '<script language="javascript">alert("'.$msg.'");</script>';
                        echo "<script>document.location = '$url'</script>";
                    }
                    myAlert("Đổi mật khẩu thành công.", "logout.php");
                }
            }
            else{
                echo '
                        <script>
                        alert("Mật khẩu cũ không đúng.");
                        </script>
                    ';
            }
        }
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
    <!-- Begin bootstrap cdn -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="	sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<!-- End bootstrap cdn -->
</head>
<body>
<?php include 'navbar.php'; ?>

    <main style="min-height: 100vh; max-width: 100%;">
    <form action="" method="post">
		<div class="justify-content-center">
            <div class="mb-3">
			  <label for="matkhaucu" class="form-label">Nhập mật khẩu cũ:</label>
			  <input type="password" class="form-control" id="matkhaucu" name="matkhaucu" value="">
			</div>
            <div class="mb-3">
			  <label for="matkhaumoi" class="form-label">Mật khẩu mới:</label>
			  <input type="password" class="form-control" id="matkhaumoi" name="matkhaumoi"  value="">
			</div>
            <div class="mb-3">
			  <label for="xacnhan" class="form-label">Nhập lại mật khẩu mới:</label>
			  <input type="password" class="form-control" id="xacnhan" name="xacnhan"  value="">
			</div>
            <input type="submit" value="Lưu thông tin" name="btnLuuThongTin">
        </div>
    </form>
	</main>
</body>
<?php include 'footer.php'; ?>
</html>