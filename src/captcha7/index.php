<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Captcha</title>
    <link rel="stylesheet" href="../static/css/bootstrap.min.css" />
</head>
<body>
<div id="main">
    <div class="container">
        <div class="row">
            <h1>Captcha bypass 7</h1>
        </div>
        <div class="row">
            <p class="lead">
                Flag is an integer between 7000 and 8000.<br />
            </p>
        </div>
    </div>
</div>
<div class="container">

    <div class="row">
        <form name="LoginForm" method="post">
            <div class="form-group col-md-2">
                <input type="text" class="form-control" id="flag" name="flag" placeholder="Enter flag" required>
                <?php
                $allowed_tries=1;
                if($_SESSION["tries"]>=$allowed_tries){
                    echo "<input type=\"text\" class=\"form-control\" id=\"captcha\" name=\"captcha\" placeholder=\"Captcha\" required>";
                    echo "<img src=\"../captcha.php\" class=\"form-control\"/><br>";
                }
                else{
                    $_SESSION["tries"]=1;
                }
                
                ?>
                <input type="submit" class="form-control btn btn-default" name="submit">
            </div>
        </form>
    </div>

    <?php
    $flag="7629";
    if(isset ($_POST['submit'])){
        if($_SESSION["num"]>=$allowed_tries){
            if (isset($_POST["captcha"])&&$_SESSION["code"]===(int)$_POST["captcha"] ){
                if (isset ($_POST['flag'])) {
                    $user_flag = $_POST['flag'];
                    if ($user_flag==$flag) {
                        echo "<p class=\"alert-success col-md-2\">Correct:)<br>";
                        echo "<button onclick=\"window.location.href='../captcha8/'\">Next challenge -></button></p>";
                    }
                    else {
                        echo "<p class=\"alert-danger col-md-2\">Incorrect flag.</p>";
                    }
                }
                $_SESSION["code"]=null;
            }
            else{
                echo "<p class=\"alert-danger col-md-2\" >Invalid captcha</p>";
                die();
            }
        }
        else{
            if (isset ($_POST['flag'])) {
                $user_flag = $_POST['flag'];
                if ($user_flag==$flag) {
                    echo "<p class=\"alert-success col-md-2\">Correct:)<br>";
                    echo "<button onclick=\"window.location.href='../captcha8/'\">Next challenge -></button></p>";
                }
                else{
                    echo "<p class=\"alert-danger col-md-2\">Incorrect flag.</p>";
                }
            }
            $_SESSION["num"]++;
        }
    }
    ?>
</div>
</body>
</html>
<?php
include ("../footer.php");
?>
<!--Moein Fatehi