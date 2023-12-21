<?php 
	include_once '../function.php';
	// checkLogin();
	$idBT = $_GET['id_bt'];
	$baitap = getChiTietBaiTap($idBT);
	$userId = $_SESSION['userId'];
	$bainop = GetChiTietBaiNop($idBT, $userId);
	$path = '../fileBT/';
	$alert = '';
	//Nộp bài
	if(isset($_POST['btnNopBai'])){
		
	}
	$bainop = GetChiTietBaiNop($idBT, $userId);

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
	<?php include 'navbar.php' ?>
	<main style="min-height: 100vh; max-width: 100%;">
	<?php 
		if(!empty($alert)){
			echo "<div class='alert alert-success text-center' role='alert'>".$alert."</div>";
		}
	?>
	
		<div id="action" style="margin: 20px 0 0 13%;">
			<a class="btn btn-primary" href="bai_tap_khoa_hoc.php">Trở lại</a>
		</div>
		<div class="d-flex mt-5 flex-wrap flex-column align-items-center" style="padding: 1%">
			<div class="card w-75" style="height: 80vh">
			  <div class="card-header h4">
			    	<?php echo $baitap['name']; ?>
			  </div>
			  <div class="card-body">
			    <?php HienThiIframe($path.$baitap['filename']); ?>
			  </div>
			</div>

			<table class="table table-bordered w-75 mt-5">
				<tr>
					<td>Hạn nộp</td>
					<td><?php echo $baitap['hannop']; ?></td>
				</tr>
				<tr>
					<td>File đã nộp</td>
					<td><?php if(!empty($bainop['filename'])){echo $bainop['filename'];} ?></td>
				</tr>
			</table>





			
			<form action="" method="POST" enctype="multipart/form-data" class="w-75">
				<div class="mb-3">
				  <label for="file_nop" class="form-label h4">Nộp bài</label>
				  <input type="file" class="form-control" id="file_nop" name="file_nop">
				</div>
				<input type="submit" class="btn btn-primary" name="btnNopBai" value="Nộp bài">
			</form>
			
		</div>
	</main>
</body>
<?php include 'footer.php'; ?>
	
</html>