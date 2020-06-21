<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
if(isset($_COOKIE['UserName'])) {
    $username = $_COOKIE['UserName'];
    $con = mysqli_connect("localhost", "root", "libra20001016zsy");
    if (!$con) {
        die('Could not connect: ' . mysqli_error());
    }
    mysqli_select_db($con, "travels");
    $sql4 = "select * from travels.traveluser WHERE UserName='$username'";
    if ($result4 = mysqli_query($con, $sql4)) {
        while ($row4 = mysqli_fetch_assoc($result4)) {
            $userid = $row4['UID'];
        }
        mysqli_free_result($result4);
    }
    $sql5 = "SELECT * FROM travels.travelimagefavor WHERE UID='$userid' AND ImageID='$id'";
    $result5 = mysqli_query($con, $sql5);
    $count5 = mysqli_num_rows($result5);
    if ($count5 == 0) {
        $imglike = "likefilled";
    } else {
        $imglike = "like";
    }
}else{
    $imglike = "like";
}
echo "<button class='button' id='like'><img src='../../img/images/$imglike.png' alt='#' style='margin-right: 8px'>LIKE</button></div>";

?>
