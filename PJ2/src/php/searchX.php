<?php
$con= new mysqli('localhost','root','libra20001016zsy','travels');
$q = isset($_POST['choice'])? htmlspecialchars($_POST['choice']) : '';
if($q) {
    if($q =='title') {
        if (!empty($_POST['title']) && $_POST['title'] != "")
        {
            $searchword = $_POST['title'];
            $sql = "select * from travels.travelimage where Title like '%$searchword%'";
//            $imgid=array();
//            $imgpath=array();
//            $imgtitle=array();
//            $imgdescription=array();
//            $str='{"results":[';
//            if ($result = mysqli_query($con, $sql)) {
//                while ($row = mysqli_fetch_assoc($result)) {
//                    $imgid[]=$row['ImageID'];
//                    $imgpath[] = $row['PATH'];
//                    $imgtitle[]=$row['Title'];
//                    $imgdescription[]= $row['Description'];
//                    $str.='{"PATH":"'.$imgpath.'","Title":"'.$imgtitle.'","Description":"'.$imgdescription.'"."ImageID":"'.$imgid.'"';
//                }
//                mysqli_free_result($result);
//            }
//            $str=substr($str,0,strlen($str)-1);
//            $str.=']}';
//            echo $str;
            getResult($con,$sql);
        }
        else {
            echo '<script>alert("Textarea is empty. Please fill in.");</script>';
        }//alert

    } else if($q =='description') {
        if (!empty($_POST['description']) && $_POST['description'] != "")
        {
            $searchword = $_POST['description'];
            $sql = "select * from travels.travelimage where Description like '%$searchword%'";
//            getResult($con,$sql);
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
//function getResult($con,$sql){
//    $imgid=array();
//    $imgpath=array();
//    $imgtitle=array();
//    $imgdescription=array();
//    if ($result = mysqli_query($con, $sql)) {
//        while ($row = mysqli_fetch_assoc($result)) {
//            $imgid[]=$row['ImageID'];
//            $imgpath[] = $row['PATH'];
//            $imgtitle[]=$row['Title'];
//            $imgdescription[]= $row['Description'];
//        }
//        mysqli_free_result($result);
//    }
//    echo<<<EOF
//    <div class="mainbox" id="xxx">
//      <div class="boxtitle"><div class="titletext">RESULT</div></div>
//      <table id="tbox">
//EOF;
//    if(count($imgid)!=0) {
//        for ($i = 0; $i < count($imgid); $i++) {
//            echo <<<ABC
//        <tr>
//          <td style="width: 300px;">
//            <a href="../php/details.php?id=$imgid[$i]">
//              <img src="../../img/travel-images/normal/medium/$imgpath[$i]" alt="#">
//            </a>
//          </td>
//
//          <td>
//            <div>
//              <div style="font-size: 20px;">$imgtitle[$i]</div>
//              <p>$imgdescription[$i]</p>
//            </div>
//          </td>
//        </tr>
//ABC;
//
//        }
//    }else{
//        echo "<tr><div style='margin-top: 40px;text-align: center;font-size: 18px;'>没有匹配到搜索结果</div></tr>";
//    }
//    echo "</table></div></div>";
//}
//空表单的情况


//①第一种
$page = isset($_GET['page']) ? $_GET['page'] : 1;
//获取当前页码 没有的话 就是第一页
if (!preg_match('/^\d+$/', $page) || $page < 1) $page = 1;
//如果输入的不是数字  或者小于1 默认第一页
$pageSize = 5;//每页多少条
$count = count($imgid);
$no_of_paginations = ceil($count / $pageSize); //计算出总页数
if($page > $no_of_paginations) $page = $no_of_paginations; //如果请求页码大于总页数 默认最后一页
$start = ($page - 1) * $pageSize;  //sql查询起始位置
$query_pag_data = "SELECT id,title from travels.travelimage LIMIT $start, $pageSize";
$result_pag_data = mysqli_query($con,$query_pag_data) or die('MySql Error' . mysqli_error());
$arrList = array();        //初始化列表数组
if ($result = mysqli_query($con, $sql)) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($arrList, array("id" => $row['ImageID'],"title" => $row['Title'],"path" => $row['PATH'],"description" => $row['Description']));
        //将每条信息push到列表数组中
    }
    mysqli_free_result($result);
}
//$arrList = array();        //初始化列表数组
//while($row = mysqli_fetch_array($result_pag_data)){
//    array_push($arrList, array("id" => $row['id'],"title" => $row['title']));        //将每条信息push到列表数组中
//}

$array = array(
    "count" => $count,        //总条数
    "pageSize" => $pageSize,        //每页条数
    "pageCount" => $no_of_paginations,  //总页数
    "nowPage" => $page,//当前页码
    "list" => $arrList        //列表
);
echo json_encode ($array);        //输出json

//②第二种
//连接数据库
//接收参数，获取当前页
//$nowPage = $_GET['nowPage'];
//$pageSize = $_GET['pageSize'];
////根据当前页，分页查询
//$sql = "select id,name,p,code,l from area limit " . ($nowPage - 1) * $pageSize . "," . $pageSize;
////执行查询操作
//$rs = mysqli_query($sql);
////封装成**数组
//$arr = array();
//while ($rows = mysql_fetch_assoc($rs)) {
//    //每一行数据封装到$arr中，形成的是一个二维数组
//    $arr[] = $rows;
//}
//$arr2 = array("nowPage" => $nowPage, "areas" => $arr);
////arr2("nowPage"=>$nowPage,"areas"=>arr(row("id"=>,"name"=>，....),array("id"=>,"name"=>，....)))
////转换成json字符串
//$arrList = array();        //初始化列表数组
//if ($result = mysqli_query($con, $sql)) {
//    while ($row = mysqli_fetch_assoc($result)) {
//        array_push($arrList, array("id" => $row['ImageID'],"title" => $row['Title'],"path" => $row['PATH'],"description" => $row['Description']));
//        //将每条信息push到列表数组中
//    }
//    mysqli_free_result($result);
//}
////$arrList = array();        //初始化列表数组
////while($row = mysqli_fetch_array($result_pag_data)){
////    array_push($arrList, array("id" => $row['id'],"title" => $row['title']));        //将每条信息push到列表数组中
////}
//
//$array = array(
//    "count" => $count,        //总条数
//    "pageSize" => $pageSize,        //每页条数
//    "pageCount" => $no_of_paginations,  //总页数
//    "nowPage" => $page,//当前页码
//    "list" => $arrList        //列表
//);
//echo json_encode($arr2);

?>




