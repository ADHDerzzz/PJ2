<?php
function loggedin(){
    return "<div class='header-top__user'>
                    <div class='user-post'>
                        <a href='###' class='link'><img src='../../img/images/myaccount.png' alt='#' style='margin-top: 20px;margin-right: 10px'>MY ACCOUNT</a>
                        <div class='user-post__hover header-hover'>
                            <a href='../php/upload.php' class='upload'>UPLOAD</a>
                            <a href='../php/favourite.php' class='favourite'>FAVOURITE</a>
                            <a href='../php/myphoto.php' class='myphoto'>MY PHOTO</a>
                            <a href='../php/logout.php' class='logout'>LOGOUT</a>
                        </div>
                    </div>
                </div>";
}

function loggedout()
{
    return "<div class='header-top__user'>
            <div class='login-box'>
              <a href='../php/login.php'>LOGIN</a>
            </div>
            </div>";
}


?>
