<!DOCTYPE html>
<html lang="en">
<head> <meta charset="UTF-8">
    <meta name="author" content="18300120031" />
    <title>FISHER-BROWSE</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/browse.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../js/select.js"></script>
    <script src="../js/check.js"></script>
    <script type="text/javascript" src="http://www.w3cschool.cc/try/jeasyui/jquery.easyui.min.js"></script>
    <script>
        $(function(){
            $('#filter1').form({
                success:function(data){
                    $('#resultbox').html(data);
                }
            });
            $('#filter2').form({
                success:function(data){
                    $('#resultbox').html(data);
                }
            });
            $("#scenery").click(function () {
                $('#filter1')[0].reset();
                $.ajax({
                    url: "browseResult4.php?word=Scenery", success: function (result) {
                        $("#resultbox").html(result);
                    }
                });
            });
            $("#building").click(function () {
                $('#filter1')[0].reset();
                $.ajax({
                    url: "browseResult4.php?word=Building", success: function (result) {
                        $("#resultbox").html(result);
                    }
                });
            });
            $("#wonder").click(function () {
                $('#filter1')[0].reset();
                $.ajax({
                    url: "browseResult4.php?word=Wonder", success: function (result) {
                        $("#resultbox").html(result);
                    }
                });
            });
            $("#canada").click(function () {
                $('#filter1')[0].reset();
                $.ajax({
                    url: "browseResult2.php?word=Canada", success: function (result) {
                        $("#resultbox").html(result);
                    }
                });
            });
            $("#germany").click(function () {
                $('#filter1')[0].reset();
                $.ajax({
                    url: "browseResult2.php?word=Germany", success: function (result) {
                        $("#resultbox").html(result);
                    }
                });
            });
            $("#italy").click(function () {
                $('#filter1')[0].reset();
                $.ajax({
                    url: "browseResult2.php?word=Italy", success: function (result) {
                        $("#resultbox").html(result);
                    }
                });
            });
            $("#uk").click(function () {
                $('#filter1')[0].reset();
                $.ajax({
                    url: "browseResult2.php?word=United Kingdom", success: function (result) {
                        $("#resultbox").html(result);
                    }
                });
            });
            $("#calgary").click(function () {
                $('#filter1')[0].reset();
                $.ajax({
                    url: "browseResult3.php?word=Calgary", success: function (result) {
                        $("#resultbox").html(result);
                    }
                });
            });
            $("#firenze").click(function () {
                $('#filter1')[0].reset();
                $.ajax({
                    url: "browseResult3.php?word=Firenze", success: function (result) {
                        $("#resultbox").html(result);
                    }
                });
            });
            $("#roma").click(function () {
                $('#filter1')[0].reset();
                $.ajax({
                    url: "browseResult3.php?word=Roma", success: function (result) {
                        $("#resultbox").html(result);
                    }
                });
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
                        <li class="item"><a href="../php/browse.php" style=" background-color: rgba(255, 255, 255, .2);">BROWSE</a></li>
                        <li class="item">
                            <a href="../php/search.php">SEARCH</a>
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

<div class="main">
    <div class="left">

        <div class="mainbox">
            <div class="boxtitle"><div class="titletext">SEARCH BY TITLE</div></div>
            <div>
                <form action="browseResult1.php" method="post" id="filter1">
                    <input placeholder="You can search here..." class="input_text" name="title1"/>
                    <button type="submit" class="search_icon" />
                </form>
            </div>
        </div>
        <div class="mainbox" style="height: 137px;">
            <div class="boxtitle"><div class="titletext">HOT CONTENT</div></div>
            <table class="table_left">

                <tr><td><div id="scenery">SCENERY</div></td></tr>
                <tr><td><div id="building">BUILDING</div></td></tr>
                <tr style="border-bottom: none;"><td><div id="wonder">WONDER</div></td></tr>

            </table>

        </div>
        <div class="mainbox" style="height: 172px;">
            <div class="boxtitle"><div class="titletext">HOT COUNTRY</div></div>
            <table class="table_left">

                <tr><td><div id="canada">CANADA</div></td></tr>
                <tr><td><div id="italy">ITALY</div></td></tr>
                <tr><td><div id="germany">GERMANY</div></td></tr>
                <tr style="border-bottom: none;"><td><div id="uk">UNITED KINGDOM</div></td></tr>

            </table>

        </div>

        <div class="mainbox" style="height: 137px;">
            <div class="boxtitle"><div class="titletext">HOT CITY</div></div>
            <table class="table_left">

                <tr><td><div id="calgary">CALGARY</div></td></tr>
                <tr><td><div id="firenze">FIRENZE</div></td></tr>
                <tr style="border-bottom: none;"><td><div id="roma">ROMA</div></td></tr>

            </table>

        </div>
    </div>


    <div style="float: left;">

        <div class="mainbox" style="min-height: 755px;">
            <div class="boxtitle">
                <div class="titletext">FILTER</div>
            </div>
            <table class="table_right">
                <tr style="height: 80px;"><td style="width: 800px;">
                        <div style="margin-top: 20px;margin-left: 20px;">
                            <div style="float: left;">

                                    <form name="form4" method="post" action="../php/browseResult5.php" id="filter2" >
                                        <div style="float: left;">
                                            <select name="slcontent" id="content">
                                                <option>Filter By Content</option>
                                                <option value="Scenery">Scenery</option>
                                                <option value="City">City</option>
                                                <option value="People">People</option>
                                                <option value="Animal">Animal</option>
                                                <option value="Building">Building</option>
                                                <option value="Wonder">Wonder</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                        <div style="width:500px;float: left;">
                                        <select id="country" name="country" class="country" onchange="set_city(this,document.getElementById('city'))">
                                        <option>Filter By Country</option>
                                        <?php
                                        $conn = new mysqli('localhost','root','libra20001016zsy','travels');
                                        $sql = "SELECT Country_RegionName from geocountries_regions";
                                        $result = $conn->query($sql);
                                        while ($row = $result->fetch_row()){
                                            echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                                        }
                                        ?>
                                    </select>

                                    <select id="city" name="city">
                                        <option>Filter By City</option>
                                    </select>
                                </div>
                                    <button class="button" style="float: left;margin-top: 0;" type="submit" onClick="return browsecheck(form4)">FILTER</button>

                                </form>

                            </div>


                        </div>
                    </td>
                </tr>


                <tr style="height: 570px;border-bottom: none;">

                    <td>
                        <div class="banner-list">
                            <ul id="resultbox">
                                <?php
                                $con= new mysqli('localhost','root','libra20001016zsy','travels');
                                $sql = "select * from travels.travelimage order by rand() limit 0,8";
                                $imgid = array();
                                $imgpath = array();
                                $imgtitle = array();
                                $imgdescription = array();
                                if ($result = mysqli_query($con, $sql)) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $imgid[] = $row['ImageID'];
                                        $imgpath[] = $row['PATH'];
                                        $imgtitle[] = $row['Title'];
                                        $imgdescription[] = $row['Description'];
                                    }
                                    mysqli_free_result($result);
                                }
                                for ($i = 0; $i <8; $i++) {
                                    echo <<<EOF
                <li>
                    <a href="../php/details.php?id=$imgid[$i]">
                        <img src="../../img/travel-images/normal/medium/$imgpath[$i]" id="img.$i" alt="#">
                        <div class="info">
                            <p class="title">$imgtitle[$i]</p>
                            <p class="description">$imgdescription[$i]</p>
                        </div>
                    </a>
                </li>
EOF;
                                }
                                ?>
                            </ul>
                        </div>

                    </td>
                </tr>
                <tr style="height: 30px;border-bottom: none;border-top: none;">
                    <td>
                        <div id="page-nav">
                            <ul>
                                <li><a href="../php/browse.php">&lt</a></li>
                                <li><a href="###">1</a></li>
                                <li><a href="###">2</a></li>
                                <li><a href="###">3</a></li>
                                <li><a href="###">4</a></li>
                                <li><a href="###">5</a></li>
                                <li><a href="../php/browse.php">></a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </table>

        </div>

    </div>

</div>

<?php
require_once("../php/footer.php");
?>

</body>
</html>
