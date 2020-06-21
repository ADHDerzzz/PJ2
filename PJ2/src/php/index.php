<!DOCTYPE html>
<html lang="en">
<head> <meta charset="UTF-8">
    <meta name="author" content="18300120031" />
    <title>FISHER-HOME</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/login-register.css">
    <script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>
    <script src="../js/script.js"></script>
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
                        <li class="item">
                            <a href="../php/index.php" style=" background-color: rgba(255, 255, 255, .2);">HOME</a>
                        </li>
                        <li class="item"><a href="../php/browse.php">BROWSE</a></li>
                        <li class="item">
                            <a href="../php/search.php">SEARCH</a>
                        </li>
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

    <div class="content-back">
        <div class="content">
            <div class="text inline-block">
                <p class="t1">
                    <?php
                    if(isset($_COOKIE['UserName'])&&$_COOKIE['UserName']!="") {
                        echo "HELLO! " . $_COOKIE['UserName'];
                        echo "<br>";
                    }
                    ?>WELCOM TO THE FISHER</p>
                <p class="t2">
                    You can enjoy and share photos of all around the world here.
                    Copyright@2020 ADHDerzzz. All Rights Reserved.
                </p>
            </div>
        </div>
    </div>


</header>
<div style="height: 600px;"></div>
<div style="height: 200px;text-align: center;margin-top: 70px;">
    <div style="font-weight: 400;font-size: 30px;">TRAVEL AROUND THE WORLD</div>
    <div style="font-size: 20px;padding-top: 20px;">Copyright@2020 ADHDerzzz. All Rights Reserved.</div>
</div>

<?php
$con = mysqli_connect("localhost","root","libra20001016zsy");
if ( mysqli_connect_errno() ) {die( mysqli_connect_error() );}
mysqli_select_db($con,"travels");
$sql1="SELECT ImageID, count( * ) AS count  FROM travels.travelimagefavor  GROUP BY ImageID  ORDER BY count DESC  LIMIT 10";
$result = mysqli_query($con, $sql1);
$count = mysqli_num_rows($result);
$favorimgid=array();
if ($result1 = mysqli_query($con, $sql1)) {
    while ($row = mysqli_fetch_assoc($result1)) {
        $favorimgid[]=$row['ImageID'];
    }
    mysqli_free_result($result1);
}
if(count($favorimgid)!=0) {
    $str = implode(",", $favorimgid);
    $sql2 = "select * from travels.travelimage WHERE ImageID IN (" . $str . ")";

//    $sql3 = "select * from travels.travelimage order by UID  desc limit 0,10";
    $imgid = array();
    $imgpath = array();
    $imgtitle = array();
    $imgdescription = array();
    if ($result2 = mysqli_query($con, $sql2)) {
        while ($row = mysqli_fetch_assoc($result2)) {
            $imgid[] = $row['ImageID'];
            $imgpath[] = $row['PATH'];
            $imgtitle[] = $row['Title'];
            $imgdescription[] = $row['Description'];
        }
        mysqli_free_result($result2);
    }
    if(count($favorimgid)<10){
        $num=10-count($favorimgid);
        $sql3="select * from travels.travelimage order by rand() limit 0,10";
        $imgid1 = array();
        $imgpath1 = array();
        $imgtitle1 = array();
        $imgdescription1 = array();
        if ($result3 = mysqli_query($con, $sql3)) {
            while ($row3 = mysqli_fetch_assoc($result3)) {
                $imgid1[] = $row3['ImageID'];
                $imgpath1[] = $row3['PATH'];
                $imgtitle1[] = $row3['Title'];
                $imgdescription1[] = $row3['Description'];
            }
            mysqli_free_result($result3);
        }
        for($x=count($favorimgid)-1;$x<10;$x++) {
            $imgid[$x] =$imgid1[$x];
            $imgpath[$x]=$imgpath1[$x];
            $imgtitle[$x]=$imgtitle1[$x];
            $imgdescription[$x]=$imgdescription1[$x];
            }
    }
}
else {
    $sql4 = "select * from travels.travelimage order by rand() limit 0,10";
    $imgid = array();
    $imgpath = array();
    $imgtitle = array();
    $imgdescription = array();
    if ($result = mysqli_query($con, $sql4)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $imgid[] = $row['ImageID'];
            $imgpath[] = $row['PATH'];
            $imgtitle[] = $row['Title'];
            $imgdescription[] = $row['Description'];
        }
        mysqli_free_result($result);
    }
}
?>
<div id="banner">
    <div class="page-width clearfix">
        <div class="slider fl">
            <div class="slider-img">
                <a href="../php/details.php?id=<?php echo $imgid[0]?>" slider-title="<?php echo $imgtitle[0];?>"><img src="../../img/travel-images/normal/medium/<?php echo $imgpath[0];?>" id="img0" alt="#"></a>
                <a href="../php/details.php?id=<?php echo $imgid[1]?>" slider-title="<?php echo $imgtitle[1];?>"><img src="../../img/travel-images/normal/medium/<?php echo $imgpath[1];?>" id="img1" alt="#"></a>
                <a href="../php/details.php?id=<?php echo $imgid[2]?>" slider-title="<?php echo $imgtitle[2];?>"><img src="../../img/travel-images/normal/medium/<?php echo $imgpath[2];?>" id="img2" alt="#"></a>
                <a href="../php/details.php?id=<?php echo $imgid[3]?>" slider-title="<?php echo $imgtitle[3];?>"><img src="../../img/travel-images/normal/medium/<?php echo $imgpath[3];?>" id="img3" alt="#"></a>
            </div>
            <div class="slider-title"><p><?php echo $imgtitle[0];?></p></div>
            <div class="slider-btn">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <a href="../php/browse.php" class="slider-more">More</a>
        </div>
        <div class="banner-list fr">
            <ul>
                <?php
                for ($i = 4; $i <= 9; $i++) {
                echo <<<EOF
                <li>
                    <a href="../php/details.php?id=$imgid[$i]">
                        <img src="../../img/travel-images/normal/medium/$imgpath[$i]" id="img.$i" alt="#">
                        <div class="info">
                            <p class="title">$imgtitle[$i]</p>
                            <p class="description">$imgdescription[$i]</p>
                        </div>
                    </a>
                </li>
EOF;
                }
?>
            </ul>

        </div>
    </div>
</div>
<div style="height: 100px;"></div>

<?php
require_once("../php/footer.php");
?>


<div id="sideBar">
    <div class="sideBar-list">
        <button type="button" id="renew">RENEW</button>
        <a href="#"><button id="backTop">TOP</button></a>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#renew").click(function(){
            $.ajax({url:"indexrenew.php",success:function(result){
                    $("#banner").html(result);
                }});
        });
    });
</script>

</body>
</html>
