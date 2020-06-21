<!DOCTYPE html>
<html lang="en">
<head> <meta charset="UTF-8">
    <meta name="author" content="18300120031" />
    <title>FISHER-DETAILS</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/details.css">
    <script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>
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
                    $isLogin=0;
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
<?php
$con = mysqli_connect("localhost","root","libra20001016zsy");
if (!$con)
{
    die('Could not connect: '.mysqli_error());
}
mysqli_select_db($con,"travels");
$id = isset($_GET['id']) ? $_GET['id'] : '';
$sql1 = "SELECT * FROM travels.travelimage WHERE ImageID='$id'";
if ($result1 = mysqli_query($con, $sql1)) {
    while ($row = mysqli_fetch_assoc($result1)) {
        $authorID=$row['UID'];
        $path= $row['PATH'];
        $title=$row['Title'];
        $content=$row['Content'];
        $description= $row['Description'];
        $citycode=$row['CityCode'];
        $countrycode=$row['Country_RegionCodeISO'];
    }
    mysqli_free_result($result1);
}
//将得到的国家代码转换为国家名
$country="Unkown";
$sql2 = "SELECT * FROM travels.geocountries_regions WHERE ISO='$countrycode'";
if ($result2 = mysqli_query($con, $sql2)) {
    while ($row = mysqli_fetch_assoc($result2)) {
        $country=$row['Country_RegionName'];
    }
    mysqli_free_result($result2);
}
//将得到的城市代码转换为城市名
$city="Unknown";
$sql3 = "SELECT * FROM travels.geocities WHERE GeoNameID='$citycode'";
if ($result3 = mysqli_query($con, $sql3)) {
    while ($row = mysqli_fetch_assoc($result3)) {
        $city=$row['AsciiName'];
    }
    mysqli_free_result($result3);
}
//将作者UID转换为作者名
$sql4 = "SELECT * FROM travels.traveluser WHERE UID='$authorID'";
if ($result4 = mysqli_query($con, $sql4)) {
    while ($row4 = mysqli_fetch_assoc($result4)) {
        $author=$row4['UserName'];
    }
    mysqli_free_result($result4);
}
//如果处在登录状态，判断用户的UID
if(isset($_COOKIE['UserName'])) {
    $username = $_COOKIE['UserName'];
    $sql5 = "select * from travels.traveluser WHERE UserName='$username'";
    if ($result5 = mysqli_query($con, $sql5)) {
        while ($row5 = mysqli_fetch_assoc($result5)) {
            $userid = $row5['UID'];
        }
        mysqli_free_result($result5);
    }
    //如果点击收藏，将用户的UID和imageID存储到favor表中,并改变按钮的图片
    $sql6 = "SELECT * FROM travels.travelimagefavor WHERE UID='$userid' AND ImageID='$id'";
    $result6 = mysqli_query($con, $sql6);
    $count6 = mysqli_num_rows($result6);
    if ($count6 == 0) {
        $imglike = "like";
    } else {
        $imglike = "likefilled";
    }
}else{
    $imglike = "like";
}
//判断这张图片被多少人喜欢
$sql7="SELECT * FROM travels.travelimagefavor WHERE ImageID='$id'";
$result7 = mysqli_query($con, $sql7);
$count7 = mysqli_num_rows($result7);
$like=$count7;
?>
<div>
    <div class="mainbox">
        <div class="boxtitle"><div class="titletext">DETAILS</div></div>
        <div id="tbox">
            <div class="maintitle">
                <div class="title1"><?php echo "$title";?></div>
                <div class="title2">by <?php echo "$author";?></div>
            </div>

            <div class="maincontent">
                <div style="float: left;">
                    <img src="../../img/travel-images/normal/medium/<?php echo"$path";?>" class="imgbox">
                </div>
                <div style="float: left;margin-left: 30px;" id="information">
                    <div class="mainbox" style="height: 65px;width: 400px;">
                        <div class="boxtitle"><div class="titletext">LIKE NUMBER</div></div>
                        <div class="likenum" id="likenum"><img src='../../img/images/like.png' alt='#' style='margin-right: 8px'><?php echo "$like";?></div>
                    </div>
                    <div class="mainbox" style="height: 140px;width: 400px;">
                        <div class="boxtitle"><div class="titletext">IMAGE DETAILS</div></div>
                        <table class="table_right">
                            <tr><td><div>Content: <?php echo"$content";?> </div></td></tr>
                            <tr><td><div>Country: <?php echo"$country";?></div></td></tr>
                            <tr style="border-bottom: none;"><td><div>City: <?php echo"$city";?></div></td></tr>
                        </table>
                    </div>
                    <div id="change"><button class="button" id="like"><img src="../../img/images/<?php echo"$imglike";?>.png" id="likeimg" alt="#" style="margin-right: 8px">LIKE</button></div>
                </div>
            </div>
            <div class="description">
                <p><?php
                    if($description==""){
                        echo "NO DESCRIPTION";
                    }else{
                    echo"$description";}
                    ?></p>
            </div>
        </div>

    </div>
</div>

<div style="height: 100px;"></div>

<?php
require_once("../php/footer.php");
?>
<script>
    $(document).ready(function(){
        $('#change').click(function(){
            $.ajax({url:"like1.php?id=<?php echo"$id";?>",success:function(result){
                    $("#likenum").html(result);
                }});
            $.ajax({url:"like2.php?id=<?php echo"$id";?>",success:function(result){
                    $("#change").html(result);
                }});
        });
    });
</script>
</body>
</html>