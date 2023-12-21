<?php 
	include_once '../function.php';
	// checkLogin();
	ChanNguoiDung();
    $idBT = $_GET['id_bt'];
    if(XoaBT($idBT)){
        $alert = 'Xóa bài tập thành công.';
    }
    else{
        $alert = 'Xóa bài tập thất bại.';
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Xóa bài tập</title>
	<!-- Begin bootstrap cdn -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="	sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<!-- End bootstrap cdn -->

</head>
<body>
<?php include 'navbar.php' ?>
	<div class="alert alert-success text-center" role="alert"><?php echo $alert; ?></div>
	<main style="min-height: 100vh; max-width: 100%;">
		<a href="bai_tap_khoa_hoc.php" class="btn btn-outline-success">Trở về</a>
	</main>
	<div class="alert-primary text-center p-2" style="margin-top: 15px;" role="alert">ProjectPHP - 2022</div>
</body>
<?php include 'footer.php'; ?>