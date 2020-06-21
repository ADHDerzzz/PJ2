<?php
$con= new mysqli('localhost','root','libra20001016zsy','travels');
    $content = $_POST["slcontent"];
    $country = $_POST["country"];
    $city = $_POST["city"];
    $sql1="SELECT * FROM travels.geocountries_regions WHERE Country_RegionName='$country'";
    $ISO="Unkown";
    if ($result1 = mysqli_query($con, $sql1)) {
        while ($row1 = mysqli_fetch_assoc($result1)) {
            $ISO=$row1['ISO'];
        }
        mysqli_free_result($result1);
    }
    $sql2="SELECT * FROM travels.geocities WHERE AsciiName='$city'";
    $citycode="Unkown";
    if ($result2 = mysqli_query($con, $sql2)) {
        while ($row2 = mysqli_fetch_assoc($result2)) {
            $citycode=$row2['GeoNameID'];
        }
        mysqli_free_result($result2);
    }
    $sql3="SELECT * FROM travels.travelImage WHERE Content='$content' AND Country_RegionCodeISO='$ISO' AND CityCode='$citycode'";
    getResult($con,$sql3);

function getResult($con,$sql){
    $imgid=array();
    $imgpath=array();
    $imgtitle=array();
    $imgdescription=array();
    if ($result = mysqli_query($con, $sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $imgid[]=$row['ImageID'];
            $imgpath[] = $row['PATH'];
            $imgtitle[]=$row['Title'];
            $imgdescription[]= $row['Description'];
        }
        mysqli_free_result($result);
    }
    if(count($imgid)!=0) {
        for ($i = 0; $i < count($imgid); $i++) {
            echo <<<ABC
         <li><a href="../php/details.php?id=$imgid[$i]"><img src="../../img/travel-images/normal/medium/$imgpath[$i]" alt="#">
         <div class="info"><p class="title">$imgtitle[$i]</p><p class="description">$imgdescription[$i]</p></div></a></li>
ABC;

        }
    }else{
        echo "<li><div style='margin-top: 40px;text-align: center;font-size: 18px;'>没有匹配到搜索结果</div></li>";
    }
}
?>