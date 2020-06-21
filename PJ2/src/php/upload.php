<!DOCTYPE html>
<html lang="en">
<head> <meta charset="UTF-8">
    <meta name="author" content="18300120031" />
    <title>FISHER-UPLOAD</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/upload.css">
    <script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="../js/check.js"></script>
    <script src="../js/select.js"></script>
</head>

<body>
<header id="header">
    <div id="page_top">
        <div class="bg-wrap"><div class="bg"></div><div class="mask"></div></div>
        <div class="header-top">
            <div class="page-width clearfix">
                <div class="header-top__nav"><ul>
                    <li class="item"><a href="../php/index.php">HOME</a></li>
                    <li class="item"><a href="../php/browse.php">BROWSE</a></li>
                     <li class="item"><a href="../php/search.php">SEARCH</a></li></ul></div>
                <?php
                require_once("../php/headerlog.php");
                if(isset($_COOKIE['UserName'])&&$_COOKIE['UserName']!=""){
                    echo loggedin();
                }
                else{
                    echo loggedout();
                }
                ?>
            </div></div></div>



</header>
<div>
    <div class="mainbox">
        <div class="boxtitle"><div class="titletext">UPLOAD</div></div>
        <div><div style="margin-top: 30px;"></div>
            <div class="content">
                <div class="sign ">
                    <form name="form2" method="post" action="../php/uploadcheck.php" onSubmit="return uploadcheck(form2)">
                        <div id="imgbox">
                            <?php
                            if(isset($_GET['imgpath'])){
                                $path=$_GET['imgpath'];
                                echo"<img src ='../../img/travel-images/normal/medium/$path' id = 'img0' name='img0'>
                            <div style = 'margin-left: 110px;display: none;width: 100px;font-weight: 600;font-size: 16px;' id = 'xxx' name='tips'> 图片未上传</div >";
                            }
                            else {
                                echo<<<ABC
<img src = "" id = "img0" name="img0">
<div style = "margin-left: 110px;display: block;width: 100px;font-weight: 600;font-size: 16px;" id = "xxx" name="tips"> 图片未上传</div >
ABC;
                            }
                            ?>
                        </div>
                        <a  class="ui-upload">
                            <?php
                            if(isset($_GET['imgpath'])) {
                                echo "<input type = 'file' id = 'file0' name='file0' />MODIFY";
                            }else{
                                echo "<input type = 'file' id = 'file0' name='file0' />UPLOAD";
                            }
                            ?>
                        </a>
                        <div style="margin-top: 20px;">
                            <label class="title">TITLE</label>
                        </div>
                        <div style="margin-top: 20px;">
                            <input type="text" name="title" class="kuang"/>
                        </div>
                        <div style="margin-top: 40px;">
                            <label class="title">DESCRIPTION</label>
                        </div>
                        <div style="margin-top: 20px;">
                            <textarea class="kuang" name="description" style="height: 100px;overflow:hidden;" ></textarea>
                        </div>
                        <tr style="height: 80px;"><td style="width: 800px;">
                                <div style="margin-top: 20px;margin-left: 20px;">
                                    <div style="float: left;">
                                        <div style="float: left;">
                                            <select id="content" name="slcontent">
                                                <option>Select a Content</option>
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
                                            <select id="country" name="country" class="country" onchange="set_city(this,this.form.city)">
                                                <option>Select a Country</option>
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
                                                <option>Select a City</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div style="float: left;"><button class="button" type="submit" style="float: left;margin-top: 0;" name="submit">SUBMIT</button></div>

                                </div>
                            </td>
                        </tr>
                        <a href="../php/myphoto.php" style="text-align: center;">
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div style="height: 100px;"></div>


    <?php
    require_once("../php/footer.php");
    ?>

    <script>
        $("#file0").change(function(){
            var name=this.files[0].name;
            var objUrl = getObjectURL(this.files[0]) ;//获取文件信息
            if (objUrl) {
                $("#img0").attr("name",name);
                $("#img0").attr("src", objUrl);
                if(document.getElementById("xxx").style.display=="block"){
                    document.getElementById("xxx").style.display="none";
                }
            }}) ;

        function getObjectURL(file) {
            var url = null;
            if (window.createObjectURL!=undefined) {
                url = window.createObjectURL(file) ;
            } else if (window.URL!=undefined) { // mozilla(firefox)
                url = window.URL.createObjectURL(file) ;
            } else if (window.webkitURL!=undefined) { // webkit or chrome
                url = window.webkitURL.createObjectURL(file) ;
            }
            return url ;
        }
    </script>
</body>
</html>