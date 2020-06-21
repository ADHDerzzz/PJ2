<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="18300120031" />
    <title>FISHER-SEARCH</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/search.css">
    <link rel="stylesheet" href="../css/myphoto-favourite.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="http://www.w3cschool.cc/try/jeasyui/jquery.easyui.min.js"></script>
    <script>
        $(function(){
            var results;
            $('#filter').form({
                success:function(data){
                   results = eval('(' + data.responseText + ')');
                   var count=parseInt(results.count);
                   var nowPage=parseInt(results.nowPage);
                   var pageSize=parseInt(results.pageSize);
                   var pageCount=parseInt(results.pageCount);

                   var liststr="<div class='mainbox' id='xxx'><div class='boxtitle'><div class='titletext'>RESULT</div></div><table id='tbox'>";

                   if(nowPage<pageCount) {
                       for (var x = nowPage*5; x < nowPage*5+5; x++)
                    liststr+="<tr><td style='width: 300px;'><a href='../php/details.php?id="+results.list[x].id+"'><img src='../../img/travel-images/normal/medium/"+results.list[x].path+"' alt='#'></a></td><td><div><div style='font-size: 20px;'>"+results.list.title+"</div><p>"+results.list.description+"</p></div></td></tr>";
                       document.getElementById("resultbox").innerHTML=liststr;
                   }

                }
            });
        });
    </script>
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
                            <a href="../php/index.php">HOME</a>
                        </li>
                        <li class="item"><a href="../php/browse.php">BROWSE</a></li>
                        <li class="item">
                            <a href="../php/search.php" style=" background-color: rgba(255, 255, 255, .2);">SEARCH</a>
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
</header>


<div class="mainbox" style="height:450px">
    <div class="boxtitle"><div class="titletext">SEARCH</div></div>

    <div class="content">
        <div class="sign ">
            <form action="searchX.php" method="post" id="filter">
                <div style="margin-top: 20px;"><input type="radio" value="title" name="choice" checked="checked">Filter by title</div>
                <div style="margin-top: 20px;"><input type="text" name="title" class="kuang"></div>
                <div style="margin-top: 20px;"><input type="radio" value="description" name="choice">Filter by description</div>
                <div style="margin-top: 20px;"><textarea type="text" name="description" class="kuang" style="height: 100px;overflow:hidden;"></textarea></div>
                <button class="button" id="btn">Filter</button>
            </form>
        </div>
    </div>
    </table>

</div>

<div id="resultbox">
</div>
<?php
require_once("../php/footer.php");
?>
</body>
</html>