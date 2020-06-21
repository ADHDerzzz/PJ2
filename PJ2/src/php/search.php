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
        $('#filter').form({
            success:function(data){
                $('#resultbox').html(data);
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
    <form action="searchResult.php" method="post" id="filter">
        <div style="margin-top: 20px;"><input type="radio" value="title" name="choice" checked="checked">Filter by title</div>
        <div style="margin-top: 20px;"><input type="text" name="title" class="kuang"></div>
        <div style="margin-top: 20px;"><input type="radio" value="description" name="choice">Filter by description</div>
        <div style="margin-top: 20px;"><textarea type="text" name="description" class="kuang" style="height: 100px;overflow:hidden;"></textarea></div>
    <button class="button">Filter</button>
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