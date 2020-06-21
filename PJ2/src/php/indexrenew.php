<?php
$con = mysqli_connect("localhost","root","libra20001016zsy");
if ( mysqli_connect_errno() ) {die( mysqli_connect_error() );}
mysqli_select_db($con,"travels");
$sql2="select * from travels.travelimage order by rand() limit 0,10";
$imgid=array();
$imgpath=array();
$imgtitle=array();
$imgdescription=array();
if ($result = mysqli_query($con, $sql2)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $imgid[]=$row['ImageID'];
        $imgpath[] = $row['PATH'];
        $imgtitle[]=$row['Title'];
        $imgdescription[]= $row['Description'];
    }
    mysqli_free_result($result);
}
echo <<<EOF
<script src="../js/script.js"></script>
    <div class="page-width clearfix">
        <div class="slider fl">
            <div class="slider-img">
                <a href="../php/details.php?id=$imgid[0]" slider-title="$imgtitle[0]"><img src="../../img/travel-images/normal/medium/$imgpath[0]" id="img0" alt="#"></a>
                <a href="../php/details.php?id=$imgid[1]" slider-title="$imgtitle[1]"><img src="../../img/travel-images/normal/medium/$imgpath[1]" id="img1" alt="#"></a>
                <a href="../php/details.php?id=$imgid[2]" slider-title="$imgtitle[2]"><img src="../../img/travel-images/normal/medium/$imgpath[2]" id="img2" alt="#"></a>
                <a href="../php/details.php?id=$imgid[3]" slider-title="$imgtitle[3]"><img src="../../img/travel-images/normal/medium/$imgpath[3]" id="img3" alt="#"></a>
            </div>
            <div class="slider-title"><p>$imgtitle[0]</p></div>
            <div class="slider-btn">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <a href="../php/browse.php" class="slider-more">More</a>
        </div>
EOF;
echo "<div class='banner-list fr'><ul>";
for ($i = 4; $i <= 9; $i++) {
echo <<<ABC
<li>
<a href="../php/details.php?id=$imgid[$i]">
<img src="../../img/travel-images/normal/medium/$imgpath[$i]" id="img.$i" alt="#">
<div class="info">
<p class="title">$imgtitle[$i]</p>
<p class="description">$imgdescription[$i]</p>
</div>
</a>
</li>

ABC;
}
echo "</ul></div>";

?>


