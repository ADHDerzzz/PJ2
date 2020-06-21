
<?php

header('Content-type:text/json;charset=utf-8');

$fliterword=$_POST['fliterword'];
$searchword=$_POST['searchword'];

$data='{fliterword:"' . $fliterword . '",searchword:"' . $searchword.'"}';//组合成json格式数据

echo json_encode($data);//输出json数据

?>