<?php 
    include_once '../function.php';
    // if(checkLogin());
    $flag = 0;
    if(isset($_POST['btnSuaThongTin'])){
        $flag = 1;
    }

    if(isset($_POST['btnLuuThongTin'])){

        $flag = 0;
        SuaThongTinCaNhan($_SESSION['userId'], $_POST['fullname'], $_POST['birthday'], $_POST['phonenumber'], $_POST['email']);
        echo "<script>
            alert('Thay đổi thông tin thành công.');
        </script>";
    }
    $info = getThongTinCaNhan($_SESSION['userId']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin cá nhân</title>
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
			  <label for="fullname" class="form-label">Fullname:</label>
			  <input type="text" class="form-control" id="fullname" name="fullname"  <?php if($flag==0){echo "disabled";} ?> value="<?php echo $info['fullname']; ?>">
			</div>
            <div class="mb-3">
			  <label for="birthday" class="form-label">Birthday:</label>
			  <input type="date" class="form-control" id="birthday" name="birthday" <?php if($flag==0){echo "disabled";} ?>  value="<?php echo $info['birthday']; ?>">
			</div>
            <div class="mb-3">
			  <label for="phonenumber" class="form-label">Phone number:</label>
			  <input type="number" class="form-control" id="phonenumber" name="phonenumber" <?php if($flag==0){echo "disabled";} ?>  value="<?php echo $info['phone_number']; ?>">
			</div>
            <div class="mb-3">
			  <label for="email" class="form-label">Email:</label>
			  <input type="email" class="form-control" id="email" name="email" <?php if($flag==0){echo "disabled";} ?>  value="<?php echo $info['email']; ?>">
			</div>
            <?php
                if($flag==1){
            ?>
            <input type="submit" value="Lưu thông tin" name="btnLuuThongTin">
            <?php
                } 
            ?>

            <?php
                if($flag==0){
            ?>
            <input type="submit" value="Sửa thông tin" name="btnSuaThongTin">
            <?php
                } 
            ?>
        </div>
    </form>
	</main>
</body>
<?php include 'footer.php'; ?>
</html>