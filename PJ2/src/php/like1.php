<?php

$con = mysqli_connect("localhost", "root", "libra20001016zsy");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysqli_select_db($con, "travels");
$id = isset($_GET['id']) ? $_GET['id'] : '';

//判断这张图片被多少人喜欢
$sql1="SELECT * FROM travels.travelimagefavor WHERE ImageID='$id'";
$result1 = mysqli_query($con, $sql1);
$count1 = mysqli_num_rows($result1);
$like=$count1;
if(isset($_COOKIE['UserName'])) {
    //如果登录了，获取用户的UID
    $username = $_COOKIE['UserName'];
    $sql2 = "select * from travels.traveluser WHERE UserName='$username'";
    if ($result2 = mysqli_query($con, $sql2)) {
        while ($row2 = mysqli_fetch_assoc($result2)) {
            $userid = $row2['UID'];
        }
        mysqli_free_result($result2);
    }
    //判断有没有喜欢过这张照片
    $sql3 = "SELECT * FROM travels.travelimagefavor WHERE UID='$userid' AND ImageID='$id'";
    $result3 = mysqli_query($con, $sql3);
    $count3=mysqli_num_rows($result3);
    if ($count3 == 0) {
        $like = $like + 1;
        $insert = "INSERT INTO travels.travelimagefavor(UID,ImageID) VALUES('$userid','$id')";
        $a = mysqli_query($con, $insert);
    } else {
        $like = $like - 1;
        $delete = "DELETE FROM travels.travelimagefavor WHERE UID='$userid' AND ImageID='$id'";
        $b = mysqli_query($con, $delete);
    }
    echo "$like";
}else{
    echo "$like";
    echo "<script>alert('请先登录账号');</script>";
}
?>