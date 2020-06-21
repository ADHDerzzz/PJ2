<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>FISHERL-REGISTER</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/login-register.css">
    <link rel="stylesheet" href="../css/footer.css">
    <script src="../js/check.js"></script>
</head>

<body>

<div class="main">
    <div class="content-back">
        <div class="content">
            <div class="text inline-block">
                <p class="t1">TRAVEL AROUND THE WORLD</p>
                <p class="t2">
                    You can enjoy and share photos of all around the world here.
                    Copyright@2020 ADHDerzzz. All Rights Reserved.
                </p>
            </div>
            <div class="sign inline-block">
                <form name="form1" action="../php/registercheck.php" method="post" onSubmit="return registercheck(form1)">
                    <label class="title">Username</label>
                    <input type="text" class="kuang" name="username" placeholder="Pick a username">
                    <label class="title">Email</label>
                    <input type="text" class="kuang" name="email" placeholder="Your email address">
                    <label class="title">Password</label>
                    <input type="password" class="kuang" name="password" placeholder="Create a password">
                    <label class="title">Confirm Your Password</label>
                    <input type="password" class="kuang" name="repassword" placeholder="Same password">
                    <p class="t4">Please use at least eight characters.
                        <a href="../php/login.php">Already have an account?</a>
                    </p>
                    <a href="../php/login.php"><button class="button" type="submit" name="submit">Sign up for FISHER</button></a>
                </form>
            </div>
        </div>
    </div>
    <hr>

</div>

<div class="footer">
    <div class="content">
        <div class="block">
            <p id="copyright">© 2020</p>
            <img src="../../img/images/weixin.png" style="width: 80px;height: 80px;">
        </div>
        <div class="block">
            <p>Features</p>
            <ul>
                <li>
                    <a href="###">Experience share</a>
                </li>
                <li>
                    <a href="###">Worldwide</a>
                </li>
                <li>
                    <a href="###">Integrations</a>
                </li>
                <li>
                    <a href="###">Photography</a>
                </li>
            </ul>
        </div>

        <div class="block">
            <p>Community</p>
            <ul>
                <li>
                    <a href="###">Personal</a>
                </li>
                <li>
                    <a href="###">Open source</a>
                </li>
                <li>
                    <a href="###">Business</a>
                </li>
                <li>
                    <a href="###">Education</a>
                </li>

            </ul>
        </div>
        <div class="block">
            <p>Company</p>
            <ul>
                <li>
                    <a href="###">About</a>
                </li>
                <li>
                    <a href="###">Blog</a>
                </li>
                <li>
                    <a href="###">Careers</a>
                </li>
                <li>
                    <a href="###">Press</a>
                </li>
            </ul>
        </div>
        <div class="block">
            <p>Resources</p>
            <ul>
                <li>
                    <a href="###">Contact FISHER</a>
                </li>
                <li>
                    <a href="###">Community Forum</a>
                </li>
                <li>
                    <a href="###">Help</a>
                </li>
                <li>
                    <a href="###">Status</a>
                </li>

            </ul>
        </div>
    </div>
</body>

</html>

