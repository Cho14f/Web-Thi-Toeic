<?php 
	include_once '../function.php';
	ChanNguoiDung();
	// checkLogin();
	$topic_id = $_GET['topic_id'];
	XoaChuDe($topic_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Xóa chủ đề</title>
	<!-- Begin bootstrap cdn -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="	sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<!-- End bootstrap cdn -->

</head>
<body>
	<main style="min-height: 100vh; max-width: 100%;">
	<?php include 'navbar.php'; ?>
		<h2>Xóa chủ đề thành công</h2>
		<a href="bai_tap_khoa_hoc.php" class="btn btn-primary">Trở lại</a>
	</main>
</body>
<?php include 'footer.php'; ?>

	
</html>