<?php
$con = mysqli_connect("localhost","root","libra20001016zsy");
if (!$con)
{
    die('Could not connect: '.mysqli_error());
}
mysqli_select_db($con,"travels");
$username=$_POST['username'];
$password=$_POST['password'];

$sql1 = "SELECT * FROM travels.traveluser WHERE UserName='$username' AND Pass='$password'";
$sql2 = "SELECT * FROM travels.traveluser WHERE Email='$username' AND Pass='$password'";

$result1 = mysqli_query($con,$sql1);
$result2 = mysqli_query($con,$sql2);
$count1 = mysqli_num_rows($result1);
$count2 = mysqli_num_rows($result2);

if($count1==0&&$count2==0){
    echo "<script>alert('用户名或密码错误！');window.location='../php/login.php';</script>";
}
else{
    $time = time() + 24 * 60 *60;
    setcookie("UserName","$username",$time);
    if(isset($_COOKIE['UserName'])){
    echo "<script>window.location='../php/index.php';</script>";
    }else{
        echo "<script>window.location='../php/index.php';</script>";
    }
}

?>