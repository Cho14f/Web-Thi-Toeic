<?php
    session_start();
    include_once 'connectdb.php';

    function ChanNguoiDung(){
        if($_SESSION['level'] == '0'){
            header("location: dashboard.php");
        }
    }
        //Navar
    
        ///////////////////////////////////////////////
        //Login page
        function login($username, $password){
            GLOBAL $conn;
            $filter_username = mysqli_real_escape_string($conn, $username);
            $filter_password = mysqli_real_escape_string($conn, $password);
            $sql = "select * from accounts where username = '$filter_username' and password = '$filter_password'";
            $query = mysqli_query($conn, $sql);
            if(mysqli_num_rows($query) == 1){
                while ($row = mysqli_fetch_assoc($query)){
                    $_SESSION['userId'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['level'] = $row['level'];
                    break;
                } 
                return true;
            }
            return false;
        }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////
    // Register page
        function validateFormRegister($username, $password, $repassword){
            if(empty($username) || empty($password) || empty($repassword)){
                echo 'Vui lòng nhập đủ các trường thông tin';
                return false;
            }
            else if($password != $repassword){
                echo 'Hãy nhập lại đúng mật khẩu';
                return false;
            }
            else if(strpos(' ', $username) || strpos(' ', $password)){
                echo 'Tài khoản và mật khẩu không được có kí tự khoảng trắng';
                return false;
            }
            else if(strlen($username)>32 || strlen($password)>32){
                echo 'Tài khoản và mật khẩu không được quá 32 kí tự';
                return false;
            }
            else if(strlen($username)<6 || strlen($password)<6){
                echo 'Tài khoản và mật khẩu lớn hơn 6 kí tự';
                return false;
            }
            else{
                return true;
            }
        }
    
        function register($username, $password){
            GLOBAL $conn;
            $filter_username = mysqli_real_escape_string($conn, $username);
            $filter_password = mysqli_real_escape_string($conn, $password);
            $sql = "select * from accounts where username = '".$filter_username."'";
            $query = mysqli_query($conn, $sql);
            if(mysqli_num_rows($query) < 1){
                $sql = "insert into accounts (username, password) values('$filter_username','$filter_password')";
                $query = mysqli_query($conn, $sql);
                return true;
            }
            else{
                return false;
            }
        }
    
        
        function setDefaultUserInfo($username){
            GLOBAL $conn;
            $sql = "select id from accounts where username = '".$username."'";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($query);
            $sql = "insert into user_information (username_id, fullname) values('".$row['id']."', '".$username."')";
            $query = mysqli_query($conn, $sql);
        }

///////////////////////////////////////////////////////////////////////////////////////////////////////
    
// Thong tin ca nhan
function getThongTinCaNhan($userId){
    GLOBAL $conn;
    $sql = "select * from user_information where username_id = ".$userId."";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    return $row;
}

function SuaThongTinCaNhan($userId, $ten, $ngaysinh, $sdt, $email){
    GLOBAL $conn;
    $sql = "update user_information set fullname = '".$ten."', birthday = '".$ngaysinh."',
    phone_number = '".$sdt."', email = '".$email."' where username_id = '".$userId."'";
    $query = mysqli_query($conn, $sql);
}