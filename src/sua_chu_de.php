<?php 
	include_once '../function.php';
	// checkLogin();
	$topic_id = $_GET['topic_id'];
	ChanNguoiDung();
	if(isset($_POST['saveChuDe'])){
		if(SuaChuDe($_POST['ten_chu_de'], $topic_id)){
			echo "Sửa chủ đề thành công.";	
		}
		else{
			echo "Hãy nhập tên chủ đề.";
		}
	}
	$chude = getChuDe($topic_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sửa chủ đề</title>
	<!-- Begin bootstrap cdn -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="	sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<!-- End bootstrap cdn -->

</head>
<body>
	<main style="min-height: 100vh; max-width: 100%;">
	<?php include 'navbar.php'; ?>
		<div class="d-flex justify-content-center">
		<form action="" method="POST" class="w-50">
			<h3>Sửa chủ đề</h3>
			<div class="mb-3">
			  <label for="ten_chu_de" class="form-label">Tên chủ đề</label>
			  <input type="text" class="form-control" id="ten_chu_de" name="ten_chu_de" placeholder="Nhập tên chủ đề" value="<?php echo $chude; ?>">
			</div>
			<input type="submit" class="btn btn-primary" name="saveChuDe" value="Lưu">			
			<a href="bai_tap_khoa_hoc.php" class="btn btn-primary">Trở lại</a>
		</form>
		</div>
	</main>
</body>
<?php include 'footer.php'; ?>
	
</html>