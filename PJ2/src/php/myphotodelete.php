<?php
$con = mysqli_connect("localhost", "root", "libra20001016zsy");
if (!$con) {
    die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con, "travels");
if(isset($_COOKIE['UserName'])){
    $userid = isset($_GET['user']) ? $_GET['user'] : '';
    $imgid = isset($_GET['id']) ? $_GET['id'] : '';
    $delete1 = "DELETE FROM travels.travelimage WHERE UID='$userid' AND ImageID='$imgid'";
    $a = mysqli_query($con, $delete1);
    $delete2 = "DELETE FROM travels.travelimagefavor WHERE ImageID='$imgid'";
    $b = mysqli_query($con, $delete2);
    echo "<script>window.location='../php/myphoto.php'</script>";
}else{
    echo "<script>alert('ERROR');</script>";
}
?>