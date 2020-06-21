<?php
setcookie("UserName","", -1);
if(isset($_COOKIE['UserName'])){
    echo "<script>window.location='../php/login.php';</script>";
}else{
    echo "<script>window.location='../php/index.php';alert('退出登录失败');</script>";
}
?>
