<?php 
	include_once '../function.php';
	// checkLogin();
    $flag = 0;
	if($_SESSION['level'] == 1){
        $flag = 1;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bài tập</title>
	<!-- Begin bootstrap cdn -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="	sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<!-- End bootstrap cdn -->

</head>
<body>
<?php include 'navbar.php'; ?>
	<main style="min-height: 100vh; max-width: 100%;">
	<div id="action" style="margin: 20px 0 0 13%;">
				<?php 
				if($flag == 1){
					echo '<a href="them_chu_de.php" class="btn btn-primary">Thêm chủ đề</a>';
				}
				?>
				
			</div>
			<div class="d-flex flex-wrap flex-column align-items-center" style="padding: 1%">
	<?php
		//Giao vien
		$topicGramar = getTopicGramar();
		foreach ($topicGramar as $value){
			if($value['open'] == "1"){
				echo '
				<div class="card w-75 mt-5">
				<div class="card-body h2">
					'.$value['name'].'';
				if($flag == 1){
				echo '
					<a href="them_bai_tap.php?topic_id='.$value['id'].'" class="btn btn-info">Thêm bài tập</a>
					<a href="sua_chu_de.php?topic_id='.$value['id'].'" class="btn btn-info">Sửa chủ đề</a>
					<a href="xoa_chu_de.php?topic_id='.$value['id'].'" class="btn btn-info">Xóa chủ đề</a>
					';
				}
				echo '</div>
				</div>';
			$noidung = getNoiDungChuDe($value['id']);
			foreach($noidung as $nd){
				if($nd['open'] == 1){
				echo '<div class="card w-75 mt-5">
						<div class="card-body h2">
						<h5>'.$nd['name'].'</h5>
						<h6>Hạn nộp: '.$nd['hannop'].'</h6>';
						echo '<a href="chi_tiet_bai_tap.php?id_bt='.$nd['id'].'" class="btn btn-primary">Truy cập</a>';
						if($flag == 1){
							echo '
							<a href="quan_ly_bai_nop.php?id_bt='.$nd['id'].'" class="btn btn-primary">Quản lý bài nộp</a>
							<a href="sua_bai_tap.php?id_bt='.$nd['id'].'" class="btn btn-info">Sửa bài tập</a>
							<a href="xoa_bai_tap.php?id_bt='.$nd['id'].'" class="btn btn-warning">Xóa</a>
							';
						}
			}
		}
		}
		}
			
	?>
	</div>
	</main>
</body>
<?php include 'footer.php'; ?>
	
</html>