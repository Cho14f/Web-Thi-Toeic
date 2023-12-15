<?php 
  if(!isset($_SESSION['userId'])){
    header('location: login.php');
  }
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="dashboard.php">ToeicEasy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="test_select.php">Full Test</a>
        </li>
      
        <!-- <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="bai_tap_khoa_hoc.php">Grammar</a>
        </li>
        
      </ul>
      <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
      <ul class="navbar-nav me-auto2 mb-2 mb-lg-0 user-panel">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php 
              $username = getUserInformation();
              echo $username['fullname'];
              ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="thong_tin_ca_nhan.php">Thông tin cá nhân</a></li>
              <li><hr class="dropdown-divider"></li>
              <?php if($_SESSION['level']==1){ ?>
                <li><a class="dropdown-item" href="quan_ly_tai_khoan.php">Quản lý tài khoản</a></li>
                <li><hr class="dropdown-divider"></li>
              <?php } ?>
              <li><a class="dropdown-item" href="doi_mat_khau.php">Đổi mật khẩu</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>
            </ul>
          </li>
      </ul>
    </div>
  </div>
</nav>

