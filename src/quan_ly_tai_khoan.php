<?php
    include_once '../function.php';
    ChanNguoiDung();
    // if(checkLogin());
    $flag = 0;
    if($_SESSION['level'] == 1){
        $flag = 1;
    }
    $taiKhoan = getTaiKhoan();

    if(isset($_POST['btnXoa'])){
        xoaTK($_POST['userId']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tài khoản</title>
    <!-- Begin bootstrap cdn -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="	sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<!-- End bootstrap cdn -->
</head>
<body>
<?php include 'navbar.php';?>   
    <main style="min-height: 100vh; max-width: 100%;">
    <div class="d-flex flex-wrap flex-column align-items-center" style="padding: 1%">
        <h3>Tài khoản học viên</h3>
		<table class="table table-bordered w-75">
            <thead>
                <tr>
                    <td><b>Username:</b>  </td>
                    <td><b>Full name:</b> </td>
                    <td><b>Birthday:</b> </td>
                    <td><b>Phone number:</b> </td>
                    <td><b>Email:</b> </td>
                    <td><b>Thao tác:</b> </td>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($taiKhoan as $tk){
                ?>
                <tr>
                    <td><?php echo $tk['username'] ?></td>
                    <td><?php echo $tk['fullname'] ?></td>
                    <td><?php echo $tk['birthday'] ?></td>
                    <td><?php echo $tk['phone_number'] ?></td>
                    <td><?php echo $tk['email'] ?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="userId" value="<?php echo $tk['id']; ?>">
                            <input type="submit" name="btnXoa" value="Xóa" class="btn btn-outline-warning">
                        </form>
                    </td>
                </tr>
                <?php 
                    }
                ?>
            </tbody>
        </table>
        </div>
	</main>
</body>
<?php include 'footer.php'; ?>
</html>