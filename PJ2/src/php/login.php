<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>FISHER-LOGIN</title>
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
            <div class="sign ">
                <form name="form0" method="post" action="../php/logincheck.php" onSubmit="return logincheck(form0)">
                    <label class="title">Username/E-mail</label>
                    <input type="text" class="kuang" name="username" placeholder="Your username/e-mail">
                    <label class="title">Password</label>
                    <input type="password" class="kuang" name="password" placeholder="Your password">
                    <p class="t4">
                        New to FISHER?
                        <a href="../php/register.php">Create an account?</a>
                    </p>
                    <a href="../php/index.php"><button class="button" type="submit">Sign in</button></a>
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

</div>
</body>

</html>

