<?php

$con = mysqli_connect("localhost", "root", "libra20001016zsy");
if (!$con) {
    die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con, "travels");
if(isset($_COOKIE['UserName'])){
$userid = isset($_GET['user']) ? $_GET['user'] : '';
$imgid = isset($_GET['id']) ? $_GET['id'] : '';
$sql1 = "SELECT * FROM travels.travelimage WHERE ImageID='$imgid'";
if ($result1 = mysqli_query($con, $sql1)) {
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $like = $row1['UID'];
    }
    mysqli_free_result($result1);
}
$delete = "DELETE FROM travels.travelimagefavor WHERE UID='$userid' AND ImageID='$imgid'";
$a = mysqli_query($con, $delete);
$sqlup = "UPDATE travels.travelimage SET UID='$like' WHERE ImageID='$imgid'";
$b = mysqli_query($con, $sqlup);
echo "<script>window.location='../php/favourite.php'</script>";
}else{
    echo "<script>alert('ERROR');</script>";
}
?>