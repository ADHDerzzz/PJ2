<?php
$con= new mysqli('localhost','root','libra20001016zsy','travels');
$word = isset($_GET['word']) ? $_GET['word'] : '';
if($word!=""){
    $sql = "select * from travels.travelimage where Content='$word'";
    getResult($con,$sql);
}
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
