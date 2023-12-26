<?php 
	include_once '../function.php';
	// checkLogin();
	ChanNguoiDung();
	$topicId = $_GET['topic_id'];
    $bailam = getBaiLam($topicId);

    if(isset($_POST['btnXoaBai'])){
        xoaBaiLam($_POST['examId']);
    }
    $scores = getAllScore($topicId);
    $thangdiem = range(0, 990, 50);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý bài làm</title>
    <!-- Begin bootstrap cdn -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="	sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<!-- End bootstrap cdn -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Chart -->
   
</head>
<body>
<?php include 'navbar.php';?>   
    <main style="min-height: 100vh; max-width: 100%;">
    <div class="d-flex flex-wrap flex-column align-items-center" style="padding: 1%">
    <div style="width: 300px;">
  <canvas id="myChart"></canvas>
</div>
        <h3>Danh sách bài làm:</h3>
		<table class="table table-bordered w-75">
            <thead>
                <tr>
                    <td><b>STT:</b>  </td>
                    <td><b>User Id:</b> </td>
                    <td><b>Bắt đầu:</b> </td>
                    <td><b>Kết thúc:</b> </td>
                    <td><b>Score:</b> </td>
                    <td><b>Số câu Listening đúng:</b> </td>
                    <td><b>Số câu Reading đúng:</b> </td>
                    <td><b>Thao tác:</b> </td>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i=1;
                    foreach($bailam as $value){
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $value['user_id']; ?></td>
                    <td><?php echo $value['time_begin']; ?></td>
                    <td><?php echo $value['time_end']; ?></td>
                    <td><?php echo $value['score']; ?></td>
                    <td><?php echo $value['lisPoint']; ?></td>
                    <td><?php echo $value['readPoint']; ?></td>
                    <td>
                        <form action="" method="post">
                            <input type="submit" value="Xóa" name="btnXoaBai" class="btn btn-outline-warning">
                            <input type="hidden" name="examId" value="<?php echo $value['exam_id']; ?>">
                        </form>
                    </td>
                </tr>
                <?php 
                    }
                ?>
            </tbody>
        </table>
        <a href="test_select.php" class="btn btn-primary">Trở lại</a>

        </div>
	</main>
</body>
<script>
  // === include 'setup' then 'config' above ===
  const labels = <?php echo json_encode($scores) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'My First Dataset',
      data: <?php echo json_encode($thangdiem) ?>,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>

<?php include 'footer.php'; ?>
</html>