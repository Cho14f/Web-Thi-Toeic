<?php 
	include_once '../function.php';
	// checkLogin();
	ChanNguoiDung();
	$topic_id = $_GET['topic_id'];
	if(isset($_POST['saveBaiTap'])){
		ThemBaiTap($_POST['ten_bai_tap'], $_POST['han_nop'], $_FILES['file_de_bai']['name'], $_FILES['file_de_bai']['tmp_name'], $topic_id);
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Thêm bài tập</title>
	<!-- Begin bootstrap cdn -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="	sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<!-- End bootstrap cdn -->

</head>
<body>
	<main style="min-height: 100vh; max-width: 100%;">
	<?php include 'navbar.php'; ?>
		<div class="d-flex justify-content-center">
		<form action="" method="POST" class="w-50" enctype="multipart/form-data">
			<h3>Thêm bài tập</h3>
			<div class="mb-3">
			  <label for="ten_bai_tap" class="form-label">Tên chủ đề</label>
			  <input type="text" class="form-control" id="ten_bai_tap" name="ten_bai_tap" placeholder="Nhập tên bài tập">
			</div>
			<div class="mb-3">
			  <label for="han_nop" class="form-label">Hạn nộp</label>
			  <input type="datetime-local" class="form-control" id="han_nop" name="han_nop" placeholder="Nhập hạn nộp">
			</div>
			<div class="mb-3">
			  <label for="file_de_bai" class="form-label">Chọn file đề bài</label>
			  <input type="file" class="form-control" id="file_de_bai" name="file_de_bai">
			</div>
			<input type="submit" class="btn btn-primary" name="saveBaiTap" value="Lưu">
			<a href="bai_tap_khoa_hoc.php" class="btn btn-primary">Trở lại</a>

		</form>
		</div>
	</main>
<?php 

?>
</body>
<?php include 'footer.php'; ?>
	
</html>