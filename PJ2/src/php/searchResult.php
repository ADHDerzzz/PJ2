<?php
$con= new mysqli('localhost','root','libra20001016zsy','travels');
$q = isset($_POST['choice'])? htmlspecialchars($_POST['choice']) : '';
if($q) {
    if($q =='title') {
        if (!empty($_POST['title']) && $_POST['title'] != "")
        {
            $searchword = $_POST['title'];
            $sql = "select * from travels.travelimage where Title like '%$searchword%'";
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
                getResult($con,$sql);
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
    echo<<<EOF
    <div class="mainbox" id="xxx">
      <div class="boxtitle"><div class="titletext">RESULT</div></div>
      <table id="tbox">
EOF;
    if(count($imgid)!=0) {
        for ($i = 0; $i < count($imgid); $i++) {
            echo <<<ABC
        <tr>
          <td style="width: 300px;">
            <a href="../php/details.php?id=$imgid[$i]">
              <img src="../../img/travel-images/normal/medium/$imgpath[$i]" alt="#">
            </a>
          </td>
            
          <td>
            <div>
              <div style="font-size: 20px;">$imgtitle[$i]</div>
              <p>$imgdescription[$i]</p>
            </div>
          </td>
        </tr>
ABC;

        }
    }else{
        echo "<tr><div style='margin-top: 40px;text-align: center;font-size: 18px;'>没有匹配到搜索结果</div></tr>";
    }
    echo "</table></div></div>";
}
//空表单的情况




