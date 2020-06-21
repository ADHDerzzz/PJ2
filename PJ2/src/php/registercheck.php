<?php
$con = mysqli_connect("localhost","root","libra20001016zsy");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
mysqli_select_db($con,"travels");

if(isset($_POST['submit'])){
    $username=$_POST["username"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $repassword=$_POST["repassword"];
//    检查是否为重复用户名
    $sql1 = "SELECT * FROM travels.traveluser WHERE UserName='$username'";
    $result1 = mysqli_query($con,$sql1);
    $count1 = mysqli_num_rows($result1);
//      检查是否邮箱已注册
    $sql2 = "SELECT * FROM travels.traveluser WHERE Email='$email'";
    $result2 = mysqli_query($con,$sql2);
    $count2 = mysqli_num_rows($result2);

    if($count1==0&&$count2==0) {
        $insert = "INSERT INTO travels.traveluser(Email,UserName,Pass) VALUES('$email','$username','$password')";
        $a = mysqli_query($con, $insert);
        if ($a) {
            echo "<script>alert('注册成功！请重新登录');window.location='../php/login.php';</script>";
        } else {
            echo "<script>alert('注册失败！');window.location='../php/register.php';</script>";
        }
    }
    else{
        if($count1!=0){
            echo "<script>alert('用户名重复！');window.location='../php/register.php';</script>";
        }
        if($count2!=0){
            echo "<script>alert('邮箱已注册！');window.location='../php/register.php';</script>";
        }
        }
    mysqli_close($con);

}else echo "false";

?>
