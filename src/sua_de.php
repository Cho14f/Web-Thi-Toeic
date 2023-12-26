<?php
    include_once '../function.php';
    // if(checkLogin());
    ChanNguoiDung();
    $topic = getTopic();
    $flag = 0;
    if($_SESSION['level'] == 1){
        $flag = 1;
    }
    $topicId = $_GET['topic_id'];

    if(isset($_POST['saveChuDe'])){
        if(empty($_POST['ten_de'])){
            echo "<script> 
            alert('Vui lòng nhập tên của đề bài.'); 
            </script>";
        }
        else{
            if(empty($_POST['nam_de']) || empty($_POST['so_de'])){
                if(empty($_POST['nam_de'])){
                    SuaDe($_POST['ten_de'], NULL, $_POST['so_de'], $topicId);
                }
                else{
                    SuaDe($_POST['ten_de'], $_POST['nam_de'], NULL, $topicId);
                }
            }
            else{
                SuaDe($_POST['ten_de'], $_POST['nam_de'], $_POST['so_de'], $topicId);
            }
            echo "<script> 
            alert('Sửa đề mới thành công.'); 
            </script>";
        }
    }
    $oldInfo = getDe($topicId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sửa đề</title>
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
			<h3>Sửa đề</h3>
			<div class="mb-3">
			  <label for="ten_de" class="form-label">Tên:</label>
			  <input type="text" class="form-control" id="ten_de" name="ten_de" placeholder="Nhập tên đề" value="<?php echo $oldInfo['name']; ?>">
			</div>
            <div class="mb-3">
			  <label for="nam_de" class="form-label">Năm:</label>
			  <input type="number" class="form-control" id="nam_de" name="nam_de" placeholder="Nhập năm ra mắt của đề" value="<?php echo $oldInfo['year']; ?>">
			</div>
            <div class="mb-3">
			  <label for="so_de" class="form-label">Số thứ tự:</label>
			  <input type="number" class="form-control" id="so_de" name="so_de" placeholder="Nhập số thứ tự đề" value="<?php echo $oldInfo['deso']; ?>">
			</div>
			<input type="submit" class="btn btn-primary" name="saveChuDe" value="Lưu">			
			<a href="test_select.php" class="btn btn-primary">Trở lại</a>
		</form>
		</div>
	</main>
</body>
<?php include 'footer.php'; ?>
	
</html>