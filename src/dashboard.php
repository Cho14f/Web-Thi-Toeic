<?php 
    include_once '../function.php';
    $userInformation = getUserInformation();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>

    <link href="../assets/css/test.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
<main style="min-height: 100vh; max-width: 100%;">

    <?php include 'navbar.php'; ?>
    <?php 
        echo "Hello ". $userInformation['fullname'];
    ?>

<a href="./test_select.php">
    <section class="my-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <img src="../assets/image/anhtoeic.jpg" class="img-fluid pb-3">
                    <button type="submit" name="submit" class="btn btn-success">Luyện tập ngay</button>
                </div>
            </div>
        </div>
    </section>
    </a>
</main>
</body>
<?php include 'footer.php'; ?>
</html>