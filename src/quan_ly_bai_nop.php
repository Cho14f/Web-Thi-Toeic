<?php 
	include_once '../function.php';
	// checkLogin();
	ChanNguoiDung();
	$idBaiTap = $_GET['id_bt'];
    $baitap = getChiTietBaiTap($idBaiTap);
    $bainop = getChiTietBaiNop2($idBaiTap);
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
<div class="d-flex flex-wrap flex-column align-items-center" style="padding: 1%">

				<?php 
					echo "Tên bài tập:" .$baitap['name'] . '<br>';
                    echo "Tên file:" .$baitap['filename'] . '<br>';
                    echo "Hạn nộp:" .$baitap['hannop'] . '<br>';
                ?>

			
			<table class="table table-bordered w-75">
				<tbody><tr>
					<th>STT</th>
					<th>Họ tên</th>
					<th>Trạng thái duyệt</th>
					<th>File nộp</th>
					<th>Thời gian nộp</th>
					<th>Thao tác</th>
				</tr>
                <?php 
                    $i=0;
                    foreach($bainop as $value){
						$i++;
                        if($value['pass'] == "1"){
                            $dat = 'Đạt';
                        }
                        else{
                            $dat = 'Không đạt';
                        }
						if(isset($_POST['btnDat'])){
							
							ChamBaiDat($_POST["id_phan_hoi"]);
							$alert = 'Chấm bài thành công';
							echo "<meta http-equiv='refresh' content='0'>";
						}
						if(isset($_POST['btnChuaDat'])){
							ChamBaiKhongDat($_POST["id_phan_hoi"]);
							$alert = 'Chấm bài thành công';
							echo "<meta http-equiv='refresh' content='0'>";
						}

                        echo '
                        <tr>
						<td>'.$i.'</td>
						<td>'.$value['name'].'</td>
						<td><span class="btn btn-info">'.$dat.'</span></td>
						<td><a href="../fileNop/'.$value['filename'].'">'.$value['filename'].'</a></td>
						<td>'.$value['time'].'</td>
						<td>
							<form method="post" name="formThayDoiTrangThai">
								<input type="hidden" value="'.$value['id'].'" name="id_phan_hoi">
								<input type="submit" name="btnDat" value="Đạt" class="btn btn-outline-success">
								<input type="submit" name="btnChuaDat" value="Chưa đạt" class="btn btn-outline-warning">
							</form>
						</td>
					</tr>
                        ';

                    }
                ?>
							</tbody></table>
			

			

		</div>
	</div>
</main>
</body>
<?php include 'footer.php'; ?>