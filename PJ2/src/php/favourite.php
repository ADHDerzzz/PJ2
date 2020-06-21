<!DOCTYPE html>
<html lang="en">
<head> <meta charset="UTF-8">
    <meta name="author" content="18300120031" />
    <title>FISHER-FAVOURITE</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/myphoto-favourite.css">
</head>
<body>
<header id="header">
    <div id="page_top">
        <div class="bg-wrap">
            <div class="bg"></div>
            <div class="mask"></div>
        </div>
        <div class="header-top">
            <div class="page-width clearfix">
                <div class="header-top__nav">
                    <ul>
                        <li class="item"><a href="../php/index.php">HOME</a></li>
                        <li class="item"><a href="../php/browse.php">BROWSE</a></li>
                        <li class="item"><a href="../php/search.php">SEARCH</a></li>
                    </ul>
                </div>
                <?php
                require_once("../php/headerlog.php");
                if(isset($_COOKIE['UserName'])&&$_COOKIE['UserName']!=""){
                    echo loggedin();
                }
                else{
                    echo loggedout();
                }
                ?>
            </div>
        </div>
    </div>

</header>

<div>
    <div class="mainbox">
        <div class="boxtitle"><div class="titletext">MY FAVOURITE</div></div>
        <table id="tbox">
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
            $favor=array();
            $sql2="select * from travels.travelimagefavor WHERE UID='$id'";
            if ($result2 = mysqli_query($con, $sql2)) {
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    $favor[]=$row2['ImageID'];
                }
                mysqli_free_result($result2);
            }
            if(count($favor)!=0) {
                $imgid = array();
                $imgpath = array();
                $imgtitle = array();
                $imgdescription = array();
                $str = implode(",",$favor);
                $sql3 = "select * from travels.travelimage WHERE ImageID IN (" . $str . ")";
                $result3 = mysqli_query($con, $sql3);
                $count3 = mysqli_num_rows($result3);
                if ($count3 != 0) {
                    while ($row3 = mysqli_fetch_assoc($result3)) {
                        $imgid[] = $row3['ImageID'];
                        $imgpath[] = $row3['PATH'];
                        $imgtitle[] = $row3['Title'];
                        $imgdescription[] = $row3['Description'];
                    }
                    mysqli_free_result($result3);
                }

                for ($i = 0; $i < $count3; $i++) {
                    echo <<<ABC
<tr><td style="width: 300px;">
<a href="../php/details.php?id=$imgid[$i]">
<img src="../../img/travel-images/normal/medium/$imgpath[$i]" alt="#"></a></td>

<td><div><div style="font-size: 20px;">$imgtitle[$i]</div><p>$imgdescription[$i]</p>
<div><button class="button" onclick="window.location='../php/favordelete.php?id=$imgid[$i]&user=$id'">DELETE</button></div></div></td></tr>

ABC;
                }
            }else{
                echo "<tr><p style='font-size: 15px;text-align: center;margin-top: 50px;'>你还没有收藏照片，快去收藏吧</p></tr>";
            }
            ?>

        </table>
    </div>
</div>


<div style="height: 100px;"></div>


<?php
require_once("../php/footer.php");
?>

</body>

</html>