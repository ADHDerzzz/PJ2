<?php
$con = mysqli_connect("localhost","root","libra20001016zsy");
if (!$con)
{
    die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con,"travels");

if(isset($_POST['submit'])){
    $path=$_POST["file0"];
    $title=$_POST["title"];
    $description=$_POST["description"];
    $content=$_POST["slcontent"];
    $country=$_POST["country"];
    $city=$_POST["city"];
//    将国家名转换为ISO
    $sql1 = "SELECT * FROM travels.geocountries_regions WHERE Country_RegionName='$country'";
    $ISO='';
    if ($result1 = mysqli_query($con, $sql1)) {
        while ($row1 = mysqli_fetch_assoc($result1)) {
            $ISO=$row1['ISO'];
        }
        mysqli_free_result($result1);
    }
//    将城市名转换为CityCode
    $sql2 = "SELECT * FROM travels.geocities WHERE AsciiName='$city'";
    $CityCode='';
    if ($result2 = mysqli_query($con, $sql2)) {
        while ($row2 = mysqli_fetch_assoc($result2)) {
            $CityCode=$row2['GeoNameID'];
        }
        mysqli_free_result($result2);
    }
    $username=$_COOKIE['UserName'];
    $sql3="select * from travels.traveluser WHERE UserName='$username'";
    if ($result3 = mysqli_query($con, $sql3)) {
        while ($row3 = mysqli_fetch_assoc($result3)) {
            $uid=$row3['UID'];
        }
        mysqli_free_result($result3);
    }

    $insert = "INSERT INTO travels.travelimage(Title,Description,CityCode,Country_RegionCodeISO,UID,PATH,Content) VALUES('$title','$description','$CityCode','$ISO','$uid','$path','$content')";
    $a = mysqli_query($con, $insert);
    if ($a) {
        echo "<script>alert('图片已上传');window.location='../php/myphoto.php';</script>";
    } else {
        echo "<script>alert('图片上传失败1！');window.location='../php/upload.php';</script>";
    }
    mysqli_close($con);
}else{ echo "<script>alert('图片上传失败2！');window.location='../php/upload.php';</script>";}

?>
