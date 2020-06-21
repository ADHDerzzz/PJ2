<?php
$con= new mysqli('localhost','root','libra20001016zsy','travels');
$q = isset($_POST['choice'])? htmlspecialchars($_POST['choice']) : '';
$page = isset($_GET['page']) ? $_GET['page'] : 1;
if (!preg_match('/^\d+$/', $page) || $page < 1) $page = 1;
//如果输入的不是数字  或者小于1 默认第一页
if($q) {
if($q =='title') {
if (!empty($_POST['title']) && $_POST['title'] != "")
{
$searchword = $_POST['title'];
$sql = "select * from travels.travelimage where Title like '%$searchword%'";
}
else {
    echo '<script>alert("Textarea is empty. Please fill in.");</script>';
}//alert

} else if($q =='description') {
    if (!empty($_POST['description']) && $_POST['description'] != "")
    {
        $searchword = $_POST['description'];
        $sql = "select * from travels.travelimage where Description like '%$searchword%'";
    }
    else {
        echo '<script>alert("Textarea is empty. Please fill in.");</script>';
    }//alert
}
else {
    echo '<script>alert("Textarea is empty. Please fill in.");</script>';
}//alert
}
else{
    echo '<script>alert("Empty form. Please fill in.");</script>';
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

}
$satrt=($page - 1) * 3;
$count = count($imgid);
$pageNum = ceil($count / 3); //计算出总页数
if($page > $pageNum) $page = $pageNum; //如果请求页码大于总页数 默认最后一页


?>




