<?php
$con = mysqli_connect("localhost","root","libra20001016zsy");
if ( mysqli_connect_errno() ) {die( mysqli_connect_error() );}
mysqli_select_db($con,"travels");
$username=$_COOKIE['UserName'];
$sql1="select * from travels.traveluser WHERE UserName='$username'";
if ($result1 = mysqli_query($con, $sql1)) {
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $id=$row1['UID'];
    }
    mysqli_free_result($result1);
}
$myphoto=array();
$sql2="select * from travels.travelimage WHERE UID='$id'";
$imgid = array();
$imgpath = array();
$imgtitle = array();
$imgdescription = array();
if ($result2 = mysqli_query($con, $sql2)) {
    while ($row2 = mysqli_fetch_assoc($result2)) {
        $imgid[] = $row2['ImageID'];
        $imgpath[] = $row2['PATH'];
        $imgtitle[] = $row2['Title'];
        $imgdescription[] = $row2['Description'];
    }
    mysqli_free_result($result2);
}
if(count($imgid)!=0){

    for ($i = 0; $i < count($imgid); $i++) {
        echo <<<ABC
<tr><td style="width: 300px;">
<a href="../php/details.php?id=$imgid[$i]">
<img src="../../img/travel-images/normal/medium/$imgpath[$i]" alt="#"></a></td>

<td><div><div style="font-size: 20px;">$imgtitle[$i]</div><p>$imgdescription[$i]</p>
<div> <a href="../php/upload.php?id=$imgid[$i]&user=$id" style="float: left;"><button class="button">MODIFY</button></a>
<button class="button" onclick="window.location='../php/myphotodelete.php?id=$imgid[$i]&user=$id'">DELETE</button></div></div></td></tr>

ABC;
    }
}else{
    echo "<tr><p style='font-size: 15px;text-align: center;margin-top: 50px;'>你还没有上传照片，快去上传吧</p></tr>";
}
?>
