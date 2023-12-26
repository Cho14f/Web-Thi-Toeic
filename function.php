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
////////////////////////////////////////////////////

// Them_de
function ThemDe($ten, $nam, $so){
    GLOBAL $conn;
    $sql = "insert into topic (year, name, deso) values ('".$nam."', '".$ten."', '".$so."')";
    $query = mysqli_query($conn, $sql);

}
////////////////////////////////////

// Sua_de
function getDe($topicId){
GLOBAL $conn;
$sql = "select * from topic where id = '".$topicId."'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
return $row;
}
function SuaDe($ten, $nam, $so, $topicId){
GLOBAL $conn;
$sql = "update topic set name='".$ten."', year='".$nam."', deso = '".$so."' where id = '".$topicId."'";
$query = mysqli_query($conn, $sql);
}
////////////////////////////////////

    //Test_select page
    function getTopic(){
        GLOBAL $conn;
        $sql = "select * from topic";
        $query = mysqli_query($conn, $sql);
        $arr = [];
        while ($row = mysqli_fetch_assoc($query)){
            $arr[] = $row;
        }
        return $arr;
    }
    function getScoreFromExams ($topicId, $userId){
        GLOBAL $conn;
        $sql = "select score from exams where topic_id = '$topicId' and user_id = '$userId'";
        $query = mysqli_query($conn, $sql);
        $arr = [];
        $row = mysqli_fetch_assoc($query);
        //Nếu không có bảng nào trả ra thì return 0
        if($row == null|| $row == NULL){
            return "0";
        }
        else{
            return $row['score'];
        }
    }
// Grammar
function getTopicGramar(){
    GLOBAL $conn;
    $sql = "select * from topic_grammar";
	$query = mysqli_query($conn, $sql);
    $arr = [];
        while ($row = mysqli_fetch_assoc($query)){
            $arr[] = $row;
        }
        return $arr;
}

function getNoiDungChuDe($topicId){
    GLOBAL $conn;
    $sql = "select * from noi_dung_chu_de where topic_id = ".$topicId."";
	$query = mysqli_query($conn, $sql);
    $arr = [];
        while ($row = mysqli_fetch_assoc($query)){
            $arr[] = $row;
        }
        return $arr;
}

function ThemChuDe($ten){
    GLOBAL $conn;
    $sql = "insert into topic_grammar (name) value('".$ten."')";
	$query = mysqli_query($conn, $sql);
}

function ThemBaiTap($tenbt, $hannop, $tenfile, $filetmp, $topicId){
    GLOBAL $conn;
    $extension = array('pdf', 'docx', 'doc');
    $extension_file = strtolower( pathinfo($tenfile, PATHINFO_EXTENSION));
    $flag = 0;
    if(empty($tenbt)){
        echo "Hãy nhập tên bài tập.";
        $flag = 1;
    }
    if(empty($hannop)){
        echo "Hãy nhập hạn nộp bài tập.";
        $flag = 1;
    }
    if(empty($tenfile)){
        echo "Hãy chọn file bài tập.";
        $flag = 1;
    }
    if(!in_array($extension_file, $extension)){
        echo "Hãy chọn đúng loại file.";
        $flag = 1;
    }
    if($flag == 0){
        //file
        $path = '../fileBT/';
        $filename = $tenfile;
        $file = pathinfo($filename);
        if(file_exists($path.$filename)){
            $newfilename = $file['filename'] . uniqid(rand(), true) . '.'. $extension_file;
        }
        else{
            $newfilename = $filename;
        }
        $filePath = $path.$newfilename;
        move_uploaded_file($filetmp, $filePath);
        $sql = "insert into noi_dung_chu_de(name, hannop, filename, topic_id) values('$tenbt', '$hannop', '$newfilename', '$topicId')";
        $do = mysqli_query($conn, $sql);
        
    }
}

function getChuDe( $topicId){
    GLOBAL $conn;
    $sql = "select * from topic_grammar where id = '$topicId'";
    $do = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($do);
    return $row['name'];
}

function SuaChuDe($tenchude, $topicId){
    GLOBAL $conn;
    if(!empty($tenchude)){
        $name = $tenchude;
        $sql = "update topic_grammar set name = '$name' where id = '$topicId'";
        $do = mysqli_query($conn, $sql);
        return true;
    }
    else{
        return false;
    }
}

function XoaChuDe($topicId){
    GLOBAL $conn;
        $sql = "delete from topic_grammar where id = ".$topicId."";
        $do = mysqli_query($conn, $sql);
}

function getChiTietBaiTap($idBaiTap){
    GLOBAL $conn;
    $sql = "select * from noi_dung_chu_de where id = '$idBaiTap'";
    $do = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($do);
    return $row;
}
function GetChiTietBaiNop($idBaiTap, $userId){
    GLOBAL $conn;
    $sql = "select * from bainop where id_bai_tap = '$idBaiTap' and user_id = '$userId'";
    $do = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($do);
    return $row;
}


function HienThiIframe($filename){
    $iframe = "<iframe width='100%' height='100%' src='".$filename."'></iframe>";
    $btn = "<a class='btn btn-primary' href='".$filename."'>Tải xuống file đề bài</a>";
    if(pathinfo($filename, PATHINFO_EXTENSION) == 'pdf'){
        echo $iframe;
    } 
    else{
        echo $btn;
    }
}

function SuaBaiTap2($tenbt, $hannop, $idBaiTap){
    GLOBAL $conn;
    $flag = 0;
    if(empty($tenbt)){
        echo "Hãy nhập tên bài tập.";
        $flag = 1;
    }
    if(empty($hannop)){
        echo "Hãy nhập hạn nộp bài tập.";
        $flag = 1;
    }

    if($flag == 0){
        //file		
            $sql = "update noi_dung_chu_de set name = '$tenbt', hannop = '$hannop' where id = '$idBaiTap' ";
            $do = mysqli_query($conn, $sql);
            return true;
    
    }
}
function SuaBaiTap1($tenbt,  $hannop, $tenfile, $filetmp, $idBaiTap){
    GLOBAL $conn;
    $sql = "select filename from noi_dung_chu_de where id = '$idBaiTap'";
    $do = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($do);
    $oldfilename = $row['filename'];
    
    $flag = 0;
    if(empty($tenbt)){
        echo "Hãy nhập tên bài tập.";
        $flag = 1;
    }
    if(empty($hannop)){
        echo "Hãy nhập hạn nộp bài tập.";
        $flag = 1;
    }

    if($flag == 0){
        //file		
        $path = '../fileBT/';
        $filename = $tenfile;
        $file = pathinfo($filename);
        if(empty($tenfile) == false){
            $extension = array('pdf', 'docx', 'doc');
            $extension_file = strtolower( pathinfo($tenfile, PATHINFO_EXTENSION));
            if(in_array($extension_file, $extension)){
                unlink($path.$oldfilename);
                if(file_exists($path.$filename)){
                    $newfilename = $file['filename'] . uniqid(rand(), true) . '.'. $extension_file;
                }
                else{
                    $newfilename = $filename;
                }
                $filePath = $path.$newfilename;
                move_uploaded_file($filetmp, $filePath);				
                $sql = "update noi_dung_chu_de set name = '$tenbt', hannop = '$hannop', filename = '$newfilename' where id = '$idBaiTap' ";
                $do = mysqli_query($conn, $sql);
            }
            
            return true;
        }
        else{
            return false;
        }

    }
}

function XoaBT($idBaiTap){
    GLOBAL $conn;

    $sql = "select filename from noi_dung_chu_de where id = '$idBaiTap'";
    $do = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($do);
    $path = '../fileBT/';
    if(!empty($row['filename'])){
        unlink($path.$row['filename']);
    }

    $sql = "delete from noi_dung_chu_de where id = '$idBaiTap'";
    $do = mysqli_query($conn, $sql);
    if($do == true){
        return true;
    }
    return false;
}

function getChiTietBaiNop2($idBaiTap){
    GLOBAL $conn;
    $arr = [];
    $sql = "select bainop.id as id, user_information.fullname as name, bainop.pass as pass, bainop.filename as filename, bainop.time as time from bainop, user_information where bainop.id_bai_tap = '$idBaiTap'  and bainop.user_id = user_information.username_id";
    $do = mysqli_query($conn, $sql);
    if(mysqli_num_rows($do)>0){
        while($row = mysqli_fetch_assoc($do)){
            $arr[] = $row;
        }
    }
    return $arr;
}

function ChamBaiDat($idBaiNop){
    GLOBAL $conn;
    $sql = "update bainop set pass = 1 where id = '$idBaiNop'";
    $do = mysqli_query($conn, $sql);
}

function ChamBaiKhongDat($idBaiNop){
    GLOBAL $conn;
    $sql = "update bainop set pass = 0 where id = '$idBaiNop'";
    $do = mysqli_query($conn, $sql);
}







///////////////////////////////////////////////////////
    
// Quản lý tài khoản

function getTaiKhoan(){
    GLOBAL $conn;
    $sql = "select accounts.id, accounts.username, user_information.fullname, user_information.birthday, user_information.phone_number, user_information.email from accounts, user_information where accounts.id = user_information.username_id";
    $query = mysqli_query($conn, $sql);
    $arr = [];
    if(mysqli_num_rows($query)>0){
        while($row = mysqli_fetch_assoc($query)){
            $arr[] = $row;
        }
    }
    return $arr;
}

function xoaTK($userId){
    GLOBAL $conn;
    //Xóa thông tin từ bảng user_information
    $sql = "delete from user_information where username_id=".$userId."";
    $query = $do = mysqli_query($conn, $sql);
    //Xóa thông tin từ bảng accounts
    $sql = "delete from accounts where id=".$userId."";
    $query = mysqli_query($conn, $sql);

    //Xóa thông tin từ bảng exams
    $sql = "select exam_id from exams where user_id=".$userId."";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    if(mysqli_num_rows($query)>0){
        $examId = $row['exam_id'];
        $sql = "delete from exams where exam_id=".$examId."";
        $query = mysqli_query($conn, $sql);
        $sql = "delete from quiz_answer where exam_id=".$examId."";
        $query = mysqli_query($conn, $sql);
    }


    //Refesh page
    header("Refresh:0");
}
////////////////////////////////////////////////////////////////


////////////////////////////////
function GetMatKhauCu($oldPassword, $userId){
    GLOBAL $conn;
    $sql = "select password from accounts where id = ".$userId."";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        if($oldPassword == $row['password']){
            return true;
        }
        else{
            return false;
        }
    }
}

function updateMatKhau($newPassword, $userId){
    GLOBAL $conn;
    $sql = "update accounts set password = '".$newPassword."' where id = ".$userId."";
    $query = mysqli_query($conn, $sql);
}


/////////////////////////////

//dashboard page
function checkLogin(){
    if(!isset($_SESSION['userId'])){
        header("location: login.php");
        return false;
    }
    return true;
}

function getUserInformation(){
    GLOBAL $conn;
    $sql = "select * from user_information where username_id = '".$_SESSION['userId']."'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    return $row;
}


function getBaiLam($topicId){
    GLOBAL $conn;
    $sql = "select * from exams where topic_id = ".$topicId."" ;
    $query = mysqli_query($conn, $sql);
    $arr = [];
    while($row = mysqli_fetch_assoc($query)){
        $arr[] = $row;
    }
    return $arr;
}
function xoaBaiLam($examId){
    GLOBAL $conn;
    $sql = "delete from exams where exam_id = ".$examId."" ;
    $query = mysqli_query($conn, $sql);
    header("Refresh:0");
}



function getAllScore($topicId){
    GLOBAL $conn;
    $sql = "select score from exams where topic_id = ".$topicId."" ;
    $query = mysqli_query($conn, $sql);
    $arr = [];
    while($row = mysqli_fetch_assoc($query)){
        $arr[] = $row;
    }
    return $arr;
}
